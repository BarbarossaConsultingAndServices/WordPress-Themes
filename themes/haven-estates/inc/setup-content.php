<?php
/**
 * Haven Estates — complete demo real-estate site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Haven_Estates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function haven_estates_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function haven_estates_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_haven_estates_file',
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
	update_post_meta( $attachment_id, '_haven_estates_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function haven_estates_ensure_category( $name ) {
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

function haven_estates_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? haven_estates_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? haven_estates_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = haven_estates_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function haven_estates_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-estate.jpg' ),
		'listings'       => array( 'Listings', 'listings', 'modern-villas.jpg' ),
		'sell'           => array( 'Sell with us', 'sell', 'keys-model.jpg' ),
		'agents'         => array( 'Our agents', 'agents', 'handshake.jpg' ),
		'about'          => array( 'About', 'about', 'formal-living.jpg' ),
		'contact'        => array( 'Book a viewing', 'contact', 'apartment-living.jpg' ),
		'faq'            => array( 'FAQ', 'faq', null ),
		'gallery'        => array( 'Interiors', 'gallery', 'living-wood.jpg' ),
		'blog'           => array( 'Journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = haven_estates_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_buying = haven_estates_ensure_category( 'Buying guides' );
	$cat_market = haven_estates_ensure_category( 'Market notes' );

	$posts = array(
		array(
			'title' => '2026 buyer’s guide: fixed-rate made easy',
			'name'  => '2026-buyers-guide-fixed-rate',
			'photo' => 'suburban-dusk.jpg',
			'cats'  => array( $cat_buying ),
			'body'  => '<!-- wp:paragraph --><p>Fixed or variable? 10-year or 20? Here is the plain-math version we hand every first-time buyer before the first viewing.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The 30-second rule</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you will stay 7+ years, fix long and sleep well. Short stays or expected raises favor flexibility. We model both on one page — bring any offer, we decode it free.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What banks actually check</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Permanent income, 10–20% equity, clean Schufa-style record. Pre-approval takes 48 hours and wins bidding ties more often than an extra €5k.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Sell above asking: staging that pays',
			'name'  => 'sell-above-asking-staging',
			'photo' => 'living-wood.jpg',
			'cats'  => array( $cat_market ),
			'body'  => '<!-- wp:paragraph --><p>Our sellers average 6% above asking. The secret is not marble — it is five sub-$500 fixes plus daylight photography.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The five fixes</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Declutter surfaces, swap harsh bulbs for 2700K, paint the hallway, fix dripping taps, mow and stage the entrance. Cost: one weekend. Return: thousands.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Photos stop thumbs</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Wide daylight shots, one lifestyle detail per room, honest floor plans. Our listings get 3x the saves — and 30 viewings from a single weekend push.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Townhouse vs. apartment: the total-cost math',
			'name'  => 'townhouse-vs-apartment-costs',
			'photo' => 'rowhouses.jpg',
			'cats'  => array( $cat_buying ),
			'body'  => '<!-- wp:paragraph --><p>Same price tag, different monthly truth. HOA fees, heating, reserves: here is how we compare a rowhouse with an apartment side by side.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Look beyond the price</h2><!-- /wp:heading --><!-- wp:paragraph --><p>A €540k rowhouse with low HOA can cost less monthly than a €480k apartment with €450 fees. We build a 10-year sheet for every shortlist — free with viewings.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Resale matters</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Garden and roof terrace hold value in every cycle. North-facing one-beds without lift do not. Ask us for the street-level data before you bid.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'The viewing checklist: 12 questions to ask',
			'name'  => 'viewing-checklist-questions',
			'photo' => 'handshake.jpg',
			'cats'  => array( $cat_buying ),
			'body'  => '<!-- wp:paragraph --><p>Print this before Saturday tours. The twelve questions that reveal damp, noise, costs and neighbor truth — asked with a smile, answered on the spot.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Building &amp; costs</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Heating age? HOA reserves? Last special assessment? Water pressure and phone signal — test both live. Rush-hour noise: visit once at 8 AM if you love it.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Paperwork</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Land registry excerpt, energy certificate, minutes of the last owners’ meeting. We fetch all three before any offer — so your bid rests on facts.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = haven_estates_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'listings', 'sell', 'agents', 'about', 'blog', 'contact' ) as $slug ) {
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
add_action( 'after_switch_theme', 'haven_estates_build_demo_site' );
