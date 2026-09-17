<?php
/**
 * Atlas Travel — complete demo travel-agency site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Atlas_Travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function atlas_travel_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function atlas_travel_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_atlas_travel_file',
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
	update_post_meta( $attachment_id, '_atlas_travel_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function atlas_travel_ensure_category( $name ) {
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

function atlas_travel_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? atlas_travel_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? atlas_travel_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = atlas_travel_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function atlas_travel_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-bali.jpg' ),
		'destinations'   => array( 'Destinations', 'destinations', 'santorini.jpg' ),
		'tours'          => array( 'Guided tours', 'tours', 'backpacker.jpg' ),
		'deals'          => array( 'Late deals', 'deals', 'plane-wing.jpg' ),
		'about'          => array( 'About', 'about', 'rome.jpg' ),
		'contact'        => array( 'Plan my trip', 'contact', 'venice.jpg' ),
		'faq'            => array( 'FAQ', 'faq', null ),
		'gallery'        => array( 'Postcards', 'gallery', 'kelingking.jpg' ),
		'blog'           => array( 'Travel journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = atlas_travel_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_tips = atlas_travel_ensure_category( 'Travel tips' );
	$cat_dest = atlas_travel_ensure_category( 'Destinations' );

	$posts = array(
		array(
			'title' => 'The carry-on packing list our guides swear by',
			'name'  => 'carry-on-packing-list',
			'photo' => 'plane-wing.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>Twelve years, 40+ routes, thousands of airports: this is the exact carry-on list our guides pack for every trip — 7 kg, zero checked bags, zero stress.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The 3-bag system</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Packing cube one: 3 tops, 2 bottoms, 1 warm layer — all mix-and-match. Cube two: chargers, meds, documents. Personal item: water, snacks, passport, book. Everything else is negotiable.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What not to pack</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Towels, hairdryers, “just in case” shoes, full-size toiletries. Our hotels have all of it, and laundry stops are built into every trip over 8 days.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Travel insurance explained in 5 minutes',
			'name'  => 'travel-insurance-explained',
			'photo' => 'paris.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>Required on all our tours — but what do you actually need? Medical, evacuation, cancellation: here is the plain-English breakdown.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The three covers that matter</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Medical (min €50,000), emergency evacuation, and trip cancellation. Annual multi-trip policies beat single-trip ones from your second journey per year.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The fine print to check</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Altitude limits for hiking tours, scooter exclusions, pre-existing conditions. Our confirmation email lists the minimum levels and two providers travelers like.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Best time to visit Bali (month by month)',
			'name'  => 'best-time-to-visit-bali',
			'photo' => 'beach-sunrise.jpg',
			'cats'  => array( $cat_dest ),
			'body'  => '<!-- wp:paragraph --><p>Dry season hype, wet season secrets: when to go for surf, diving, or empty temples — plus our favorite shoulder weeks with lower prices.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">April–October: dry and busy</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Best diving visibility, Uluwatu surf, Nusa Penida day trips. Book 3+ months ahead for July–August — or pick May and October for the same weather with half the crowds.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">November–March: green and quiet</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Short afternoon showers, lush Ubud jungle, temple sunrises all to yourself. Our late deals cluster here — same 12-day route, up to 25% less.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Japan rail pass guide: is it still worth it?',
			'name'  => 'japan-rail-pass-guide',
			'photo' => 'fuji.jpg',
			'cats'  => array( $cat_dest ),
			'body'  => '<!-- wp:paragraph --><p>Prices rose, rules changed — so we did the math on Kyoto–Tokyo–Osaka routes to tell you exactly when the pass pays off and when regional tickets win.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">When the 7-day pass wins</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Two or more long shinkansen legs in a week (e.g. Tokyo–Kyoto return plus Nara or Hiroshima) — the pass breaks even on day five and covers local JR lines on top.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">When to skip it</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Single-base stays or slow travel: regional passes and IC cards are cheaper. Every Atlas Japan trip ships with a pre-loaded IC card and a route sheet — no ticket-machine panic.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = atlas_travel_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'destinations', 'tours', 'deals', 'about', 'blog', 'contact' ) as $slug ) {
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
add_action( 'after_switch_theme', 'atlas_travel_build_demo_site' );
