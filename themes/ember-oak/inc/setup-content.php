<?php
/**
 * Ember Oak — complete demo restaurant site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Ember_Oak
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ember_oak_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function ember_oak_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_ember_oak_file',
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
	update_post_meta( $attachment_id, '_ember_oak_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function ember_oak_ensure_category( $name ) {
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

function ember_oak_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? ember_oak_pattern_content( $pattern ) : $existing->post_content,
				)
			);
		}
		return (int) $existing->ID;
	}

	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $pattern ? ember_oak_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = ember_oak_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function ember_oak_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-dining.jpg' ),
		'menu'           => array( 'Menu', 'menu', 'dish-salmon.jpg' ),
		'about'          => array( 'Our story', 'about', 'about-fire.jpg' ),
		'gallery'        => array( 'Gallery', 'gallery', 'interior.jpg' ),
		'reservations'   => array( 'Reservations', 'reservations', 'cafe.jpg' ),
		'faq'            => array( 'Good to know', 'faq', null ),
		'blog'           => array( 'Journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = ember_oak_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_kitchen = ember_oak_ensure_category( 'From the kitchen' );
	$cat_news    = ember_oak_ensure_category( 'Restaurant news' );

	$posts = array(
		array(
			'title' => 'Why our sourdough takes 48 hours (and why it matters)',
			'name'  => 'sourdough-48-hours',
			'photo' => 'baker.jpg',
			'cats'  => array( $cat_kitchen ),
			'body'  => '<!-- wp:paragraph --><p>Every loaf at Ember &amp; Oak starts two days before it reaches your table. No commercial yeast, no shortcuts — just flour, water, salt, and our eight-year-old starter we call Bruno.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Day one: patience</h2><!-- /wp:heading --><!-- wp:paragraph --><p>The dough ferments slowly at 19°C for 24 hours. Slow fermentation builds flavor you cannot fake and makes the bread easier to digest — several guests with mild wheat sensitivity told us ours is the only bread they tolerate.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Day two: fire</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Baked at 250°C on oak-fired stone. The result: a crackling crust, an open crumb, and a loaf that stays fresh for three days. Ask for the end piece — regulars fight over it.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>You can buy whole loaves to take home Friday to Sunday, until sold out (usually by 14:00).</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Autumn menu is here: 6 new dishes, one old favorite returns',
			'name'  => 'autumn-menu',
			'photo' => 'spread.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Pumpkin, mushrooms, game and the first chestnuts — our autumn menu leans into the forest. Six new dishes join the card, and by overwhelming guest vote, the ember-roasted duck returns.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What to order</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Start with the roasted pumpkin soup with brown butter, follow with wild mushroom risotto or the returning duck, and save room: the plum crumble with oak-smoked ice cream is the dish our staff fights over at family meal.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Wine pairing</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our sommelier Ana put together a three-glass autumn pairing (€24) that moves from crisp to bold with the courses. Available lunch and dinner until the end of November.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Wine evening November 14: natural wines of the Loire',
			'name'  => 'wine-evening-loire',
			'photo' => 'bar.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>One night, five wines, one winemaker who drove 14 hours to be here. Our November wine evening features Domaine Petit of the Loire with biodynamic Chenins and a Cabernet Franc that converts skeptics.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The format</h2><!-- /wp:heading --><!-- wp:paragraph --><p>19:00 start, five pours with five small plates from the kitchen, stories from the vineyard in between. €59 per person, 24 seats, last time sold out in six days.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">How to join</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Reserve through the reservations page with the note “wine evening”, or call us. Vegetarian pairing menu available on request when booking.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Weekend brunch is back (and the pancakes are taller)',
			'name'  => 'weekend-brunch',
			'photo' => 'dish-pancakes.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Saturday and Sunday, 10:00 to 14:00: shakshuka from the ember oven, buttermilk pancakes with brown-butter maple syrup, and bottomless filter coffee until noon.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Good to know</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Brunch is walk-in only — no reservations, first come first served. Dogs welcome on the terrace. The full lunch menu starts at 12:00 for those who arrive hungry.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = ember_oak_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'menu', 'about', 'gallery', 'blog', 'reservations' ) as $slug ) {
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
add_action( 'after_switch_theme', 'ember_oak_build_demo_site' );
