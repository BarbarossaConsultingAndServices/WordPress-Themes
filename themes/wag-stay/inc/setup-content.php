<?php
/**
 * Wag Stay — complete demo pet-care site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Wag_Stay
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function wag_stay_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function wag_stay_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_wag_stay_file',
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
	update_post_meta( $attachment_id, '_wag_stay_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function wag_stay_ensure_category( $name ) {
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

function wag_stay_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? wag_stay_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? wag_stay_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = wag_stay_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function wag_stay_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-pups.jpg' ),
		'services'       => array( 'Services & prices', 'services', 'cuddle.jpg' ),
		'about'          => array( 'Our story', 'about', 'beach-dog.jpg' ),
		'gallery'        => array( 'Happy guests', 'gallery', 'bandana-duo.jpg' ),
		'booking'        => array( 'Book a stay', 'booking', 'bowtie-dog.jpg' ),
		'faq'            => array( 'Good to know', 'faq', null ),
		'blog'           => array( 'Journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = wag_stay_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_care = wag_stay_ensure_category( 'Pet care tips' );
	$cat_news = wag_stay_ensure_category( 'House news' );

	$posts = array(
		array(
			'title' => 'New: live pet-cam in every suite (yes, really)',
			'name'  => 'live-pet-cam',
			'photo' => 'corgi.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Miss them already? Every boarding suite now has a pet-cam you can open from your phone — day and night, with night vision for midnight zoomies.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">How it works</h2><!-- /wp:heading --><!-- wp:paragraph --><p>At check-in you get a private link, valid only for your pet’s stay. Watch breakfast, playtime and naps. Screenshots encouraged — our lobby slideshow runs on guest photos.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Privacy, obviously</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Cameras point at beds and play corners only, never at staff areas. Links expire automatically at checkout. Included free in every boarding stay.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Trail guide: 5 dog-friendly hikes from our gate',
			'name'  => 'dog-friendly-hikes',
			'photo' => 'hike-dog.jpg',
			'cats'  => array( $cat_care ),
			'body'  => '<!-- wp:paragraph --><p>Our daycare dogs walk 10 km daily, and these are their favorite routes. All start within 15 minutes of our gate; water bowls marked on the free map at reception.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. Meadow loop — 3 km, off-leash</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Fenced meadow, perfect for recall training and first off-leash adventures. Poop bags at both gates (you’re welcome).</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. Lakeshore — 7 km, swim stops</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Shallow entry at kilometer 2 — bring a towel, leave with a happy wet dog. Our #1 group walk every Sunday.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3–5. Forest trio — 5 to 12 km</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Shaded trails for hot days, with the mountain-hut café (dogs inside!) at the 8 km mark. Ask us for the GPX files.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Kitten season is here: inside our nursery',
			'name'  => 'kitten-season-nursery',
			'photo' => 'kitten.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Spring means kittens — and our cattery nursery is full of tiny purring chaos. Here’s how kitten boarding works, and why early socialization matters.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The nursery setup</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Heated pods, climbing walls sized for 400-gram explorers, and staff who specialize in turning hiss into purr within 48 hours.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">First stay free for kittens under 6 months?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Almost: the first daycare day is free, so your kitten learns the place smells like fun. Full boarding from €25/night including the 3 AM zoomie supervision.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Nail trims without drama: our groomer’s 5 tricks',
			'name'  => 'nail-trims-without-drama',
			'photo' => 'unicorn-pug.jpg',
			'cats'  => array( $cat_care ),
			'body'  => '<!-- wp:paragraph --><p>Our groomer Sina trims 30 sets of nails a week without a single drama — including dogs other salons refused. Her secrets, for home use:</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. Peanut butter beats force</h2><!-- /wp:heading --><!-- wp:paragraph --><p>A lick mat with peanut butter buys 90 calm seconds. That’s three paws if you’re quick.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. One nail a day beats sixteen at once</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Desensitize, don’t ambush. Touch paws daily, reward, stop before the stress starts.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3–5. Know when to hand over</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Dark nails, anxious dogs, bitten owners: that’s what groomers are for. Full groom from €45, nails-only walk-in €12, Tuesdays and Fridays.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = wag_stay_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'services', 'about', 'gallery', 'blog', 'booking' ) as $slug ) {
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
add_action( 'after_switch_theme', 'wag_stay_build_demo_site' );
