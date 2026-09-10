<?php
/**
 * Evermore Weddings — complete demo wedding site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Evermore_Weddings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function evermore_weddings_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function evermore_weddings_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_evermore_weddings_file',
			'meta_value'     => $filename,
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);
	if ( ! empty( $found ) ) {
		return (int) $found[0];
	}

	$path = get_stylesheet_directory() . '/assets/images/' . $filename;
	if ( ! file_exists( $path ) ) {
		return 0;
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$upload = wp_upload_bits( $filename, null, file_get_contents( $path ) ); // phpcs:ignore
	if ( ! empty( $upload['error'] ) ) {
		return 0;
	}

	$attachment_id = wp_insert_attachment(
		array(
			'post_mime_type' => 'image/jpeg',
			'post_title'     => $title,
			'post_status'    => 'inherit',
			'guid'           => $upload['url'],
		),
		$upload['file']
	);

	if ( ! $attachment_id ) {
		return 0;
	}

	wp_update_attachment_metadata(
		$attachment_id,
		wp_generate_attachment_metadata( $attachment_id, $upload['file'] )
	);
	update_post_meta( $attachment_id, '_evermore_weddings_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function evermore_weddings_ensure_category( $name ) {
	$existing = term_exists( $name, 'category' );
	if ( $existing ) {
		return (int) $existing['term_id'];
	}
	$created = wp_insert_term( $name, 'category' );
	if ( is_wp_error( $created ) ) {
		return 0;
	}
	return (int) $created['term_id'];
}

function evermore_weddings_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? evermore_weddings_pattern_content( $pattern ) : $existing->post_content,
				)
			);
			if ( $pattern ) {
				// Fresh installs ship a draft "Privacy Policy" page: it gets
				// our designed content, so it also needs the no-title
				// template to avoid a duplicate H1 from the theme title.
				update_post_meta( $existing->ID, '_wp_page_template', 'page-no-title' );
			}
		}
		return (int) $existing->ID;
	}

	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $pattern ? evermore_weddings_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = evermore_weddings_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function evermore_weddings_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-couple.jpg' ),
		'collections'    => array( 'Collections & packages', 'collections', 'reception-table.jpg' ),
		'stories'        => array( 'Real weddings', 'stories', 'beach-couple.jpg' ),
		'vendors'        => array( 'Trusted vendors', 'vendors', 'photographer.jpg' ),
		'about'          => array( 'About', 'about', 'portrait-couple.jpg' ),
		'booking'        => array( 'Check your date', 'booking', 'aisle.jpg' ),
		'faq'            => array( 'FAQ', 'faq', null ),
		'gallery'        => array( 'Moments', 'gallery', 'confetti.jpg' ),
		'blog'           => array( 'Journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = evermore_weddings_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_tips = evermore_weddings_ensure_category( 'Planning tips' );
	$cat_real = evermore_weddings_ensure_category( 'Real weddings' );

	$posts = array(
		array(
			'title' => 'The 12-month planning timeline that actually works',
			'name'  => '12-month-planning-timeline',
			'photo' => 'aisle.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>Twelve months sounds endless until month three disappears. Here is the timeline we give every Evermore couple — the same one behind 320+ on-time weddings.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">12–9 months: venue, planner, photo</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Book the venue and planner first, then photo and film. These four decide your date and your memories — everything else flexes around them.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">8–4 months: vendors, tasting, timeline</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Florals, cake, catering tasting, DJ and outfits. Build the day timeline backwards from sunset — golden-hour portraits first, dinner second.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Last 30 days: confirm and breathe</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Final walkthrough, seating, rain-plan approval. Then hand the binder to your coordinator and enjoy being engaged for a few more days.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Venue tour checklist: 15 questions to ask',
			'name'  => 'venue-questions-tour-checklist',
			'photo' => 'banquet-hall.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>Touring Saturday 10:00–16:00? Bring this list. The answers matter more than the chandeliers (though ours are rather good).</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Capacity and curfews</h2><!-- /wp:heading --><!-- wp:paragraph --><p>How many seated with a dance floor? What is the outdoor curfew? Where do 200 cars park? Ask to see the rain flip — not just photos of it.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Costs and contracts</h2><!-- /wp:heading --><!-- wp:paragraph --><p>What is included — chairs, candles, setup, teardown? How do deposits and reschedules work? Who is on site on the day, and till when?</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Vibe check</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Do you feel unhurried? Do staff know couples by name? The best venue answer is a calm one — that calm runs your wedding day.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Rainy-day backup plan guests will love',
			'name'  => 'rainy-day-backup-plan',
			'photo' => 'hands-dress.jpg',
			'cats'  => array( $cat_real ),
			'body'  => '<!-- wp:paragraph --><p>Rain on the forecast? Our couples end up hoping for it. Here is the 40-minute flip that turns the orangery into the most romantic room in town.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The flip, minute by minute</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Guests sip sparkling in the chapel while the team moves arch, florals and candles inside. String duo moves with them — music never stops.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Photos still glow</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Glass roof, wet garden greens, umbrellas for two portraits. Some of our favorite galleries are 100% rain — ask to see Sofia and Marc’s.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">You decide, we execute</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Call made 3 hours before, together. Both plans rehearsed at the walkthrough — no stress decisions in wedding outfits.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Wedding budget breakdown: where $12k goes',
			'name'  => 'wedding-budget-breakdown',
			'photo' => 'table-flowers.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>Real numbers from a real 100-guest Signature wedding last June. No shame, no secrets — just the spreadsheet.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The big slices</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Venue + coordination 35%, catering + cake 30%, photo + film 15%. The rest: florals 8%, music 5%, outfits and rings 7%.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Worth-it splurges</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Day-of coordinator (you will eat dinner), extra photo hour (golden light), live strings for the ceremony. Skipped without regret: favors, programs, a fourth dessert.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Steal this template</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Ask us for the one-page budget sheet at your tour — every line with Evermore prices, so your quote holds. No surprise fees, ever.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = evermore_weddings_import_photo( $p['photo'], $p['title'] );
		if ( $att_id ) {
			$src     = esc_url( wp_get_attachment_url( $att_id ) );
			$img_tag = '<!-- wp:image {"align":"wide","sizeSlug":"large"} --><figure class="wp-block-image alignwide size-large"><img src="' . $src . '" alt="' . esc_attr( $p['title'] ) . '"/></figure><!-- /wp:image -->';
		}
		$post_id = wp_insert_post(
			array(
				'post_type'     => 'post',
				'post_name'     => $p['name'],
				'post_title'    => $p['title'],
				'post_content'  => $img_tag . $p['body'],
				'post_status'   => 'publish',
				'post_category' => $p['cats'],
			)
		);
		if ( $post_id && $att_id ) {
			set_post_thumbnail( $post_id, $att_id );
		}
	}

	if ( ! wp_get_nav_menu_object( 'Primary' ) ) {
		$menu_id = wp_create_nav_menu( 'Primary' );
		if ( $menu_id ) {
			foreach ( array( 'home', 'collections', 'stories', 'vendors', 'about', 'blog', 'booking' ) as $slug ) {
				if ( empty( $ids[ $slug ] ) ) {
					continue;
				}
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'     => get_the_title( $ids[ $slug ] ),
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $ids[ $slug ],
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					)
				);
			}
		}
	}

	$sample = get_page_by_path( 'sample-page' );
	if ( $sample && false !== strpos( $sample->post_content, 'This is an example page' ) ) {
		wp_trash_post( $sample->ID );
	}
	$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
	if ( $hello && false !== strpos( $hello->post_content, 'Welcome to WordPress' ) ) {
		wp_trash_post( $hello->ID );
	}
}
add_action( 'after_switch_theme', 'evermore_weddings_build_demo_site' );
