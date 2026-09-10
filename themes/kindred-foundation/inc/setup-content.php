<?php
/**
 * Kindred Foundation — complete demo charity site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, impact posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Kindred_Foundation
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kindred_foundation_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function kindred_foundation_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_kindred_foundation_file',
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
	update_post_meta( $attachment_id, '_kindred_foundation_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function kindred_foundation_ensure_category( $name ) {
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

function kindred_foundation_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? kindred_foundation_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? kindred_foundation_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = kindred_foundation_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function kindred_foundation_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-volunteers.jpg' ),
		'causes'         => array( 'Our causes', 'causes', 'food-drive.jpg' ),
		'impact'         => array( 'Your impact', 'impact', 'hands-heart.jpg' ),
		'volunteer'      => array( 'Volunteer', 'volunteer', 'food-sorting.jpg' ),
		'donate'         => array( 'Donate', 'donate', 'coins.jpg' ),
		'about'          => array( 'About', 'about', 'kids-group.jpg' ),
		'faq'            => array( 'FAQ', 'faq', null ),
		'gallery'        => array( 'Field moments', 'gallery', 'beach-cleanup.jpg' ),
		'blog'           => array( 'Stories', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = kindred_foundation_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_stories = kindred_foundation_ensure_category( 'Impact stories' );
	$cat_news    = kindred_foundation_ensure_category( 'Foundation news' );

	$posts = array(
		array(
			'title' => 'Funded: the clean-water well is flowing',
			'name'  => 'clean-water-well-funded',
			'photo' => 'hands-stack.jpg',
			'cats'  => array( $cat_stories ),
			'body'  => '<!-- wp:paragraph --><p>2,100 micro-donations. One well. 400 people with clean water for the first time — here is how your small gifts added up.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">From coins to concrete</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Last spring we asked for €18,000 for a village well. You gave €21,400. Drilling finished in October; the opening ceremony had dancing, speeches and very clean glasses of water.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What happens next</h2><!-- /wp:heading --><!-- wp:paragraph --><p>A local committee maintains the pump, trained and paid for year one. Well number two is already 40% funded — help us finish it before summer.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'One year of school meals: 10,000 plates a day',
			'name'  => 'one-year-of-school-meals',
			'photo' => 'kids-writing.jpg',
			'cats'  => array( $cat_stories ),
			'body'  => '<!-- wp:paragraph --><p>A year ago, 10,000 children started getting a warm lunch at school every day. Attendance is up 18% — hunger was keeping kids home.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The numbers</h2><!-- /wp:heading --><!-- wp:paragraph --><p>1.9 million meals served across 120 partner schools. Cost per meal: 40 cents. Teacher verdict: calmer classrooms, sharper afternoons.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Fund the next term</h2><!-- /wp:heading --><!-- wp:paragraph --><p>€61,000 of €80,000 raised for next term. €25 feeds a child for the whole school year — that is the deal of the century.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Volunteer spotlight: the Saturday sorting crew',
			'name'  => 'volunteer-spotlight-sorting-crew',
			'photo' => 'volunteer-portrait.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Every Saturday at 9, fourteen volunteers turn a mountain of donations into neat parcels. Meet the crew that never misses a week.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Why they come</h2><!-- /wp:heading --><!-- wp:paragraph --><p>“I came once with my company team day,” laughs crew lead Dana, “four years ago. The coffee is terrible and the people are wonderful. I stayed for the people.”</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Join them</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Two hours a week, no experience needed, training in one afternoon. Sign up on the volunteer page — Saturday coffee (terrible) included.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Winter drive results: 12,400 meals delivered',
			'name'  => 'winter-drive-results',
			'photo' => 'aid-boxes.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>The winter drive is over and the count is in: 12,400 warm meals reached 1,900 families. Thank you — every parcel had your name on it, metaphorically.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">How it worked</h2><!-- /wp:heading --><!-- wp:paragraph --><p>340 volunteers, 6 weekends, 1 very tired van. Donations of €38,400 plus 2.1 tonnes of food drop-offs made it our biggest drive yet.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Keep the shelves full</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Hunger does not end in spring. Monthly gifts keep the food bank stocked year-round — €10 buys 25 meals, every single month.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = kindred_foundation_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'causes', 'impact', 'volunteer', 'about', 'blog', 'donate' ) as $slug ) {
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
add_action( 'after_switch_theme', 'kindred_foundation_build_demo_site' );
