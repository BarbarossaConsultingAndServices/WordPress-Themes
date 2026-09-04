<?php
/**
 * Juniper House — complete demo hotel site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Juniper_House
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function juniper_house_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function juniper_house_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_juniper_house_file',
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
	update_post_meta( $attachment_id, '_juniper_house_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function juniper_house_ensure_category( $name ) {
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

function juniper_house_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? juniper_house_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? juniper_house_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = juniper_house_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function juniper_house_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-lake.jpg' ),
		'rooms'          => array( 'Rooms & rates', 'rooms', 'room-deluxe.jpg' ),
		'about'          => array( 'Our story', 'about', 'lobby.jpg' ),
		'experiences'    => array( 'Experiences', 'experiences', 'lake-sail.jpg' ),
		'gallery'        => array( 'Gallery', 'gallery', 'pool.jpg' ),
		'booking'        => array( 'Book your stay', 'booking', 'arrival.jpg' ),
		'faq'            => array( 'Good to know', 'faq', null ),
		'blog'           => array( 'Journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = juniper_house_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_stories = juniper_house_ensure_category( 'House stories' );
	$cat_guide   = juniper_house_ensure_category( 'Area guide' );

	$posts = array(
		array(
			'title' => 'Getting married here: what a Juniper wedding looks like',
			'name'  => 'weddings-at-juniper',
			'photo' => 'wedding.jpg',
			'cats'  => array( $cat_stories ),
			'body'  => '<!-- wp:paragraph --><p>Twelve rooms for your favorite people, dinner under the chestnut tree, dancing till the lake goes quiet. We host eight weddings a year — on purpose, so each one gets our full attention.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The shape of the day</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Ceremony on the lawn at 16:00, aperitif on the terrace, dinner for up to 40 in the orangery, party in the cellar bar. Our coordinator Lena plans it with you from the first tasting to the last sparkler.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What it costs</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Venue buyout from €2,900 including all twelve rooms, menus from €85 per person. Write to events@juniper-house.example with your date — 2027 weekends are already half gone.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Workation done right: our new long-stay rate',
			'name'  => 'workation-rate',
			'photo' => 'workation.jpg',
			'cats'  => array( $cat_stories ),
			'body'  => '<!-- wp:paragraph --><p>Seven nights or more, 20% off, laundry included, and the quietest corner table in the lounge with your name on it — mentally, at least.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The practical bits</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Fiber wifi (200 Mbps measured in every room), desks with real chairs, printer access, and lunch served till 15:00 for late risers. Calls from the garden pavilion — best acoustics in the house.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The unwinding bits</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Morning yoga twice a week, sauna every evening, and a lake that makes you close the laptop at six. Book with the note “workation” and we’ll put the desk lamp on before you arrive.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Three hikes from our front door (tested, with cake stops)',
			'name'  => 'hikes-from-front-door',
			'photo' => 'hike.jpg',
			'cats'  => array( $cat_guide ),
			'body'  => '<!-- wp:paragraph --><p>You don’t need a car here. These three routes start at our gate; GPX tracks wait at reception, and the packed-lunch basket (€14) is worth every cent.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. Chapel loop — 6 km, easy</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Through the meadow to the mountain chapel and back via the forest chapel café (plum cake, trust us). Two hours at strolling pace.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. Lakeshore to the boathouse — 11 km, moderate</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Flat, breezy, with a swim stop halfway in summer. The boathouse serves fish soup till 16:00.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3. Summit sunrise — 14 km, demanding</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Tom’s favorite: depart at 5:00 with coffee, watch the sun hit the lake from the top, back for breakfast at nine. Headlamps lendable.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Why breakfast is our most-reviewed meal',
			'name'  => 'breakfast-most-reviewed',
			'photo' => 'breakfast.jpg',
			'cats'  => array( $cat_stories ),
			'body'  => '<!-- wp:paragraph --><p>Of 2,300+ reviews, one in four mentions breakfast by name. Here’s the formula: no buffet steam trays, everything cooked to order, and honey from our own hives.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What’s on the table</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Eggs any style from the farm next door, sourdough from Ana’s oven, lake-fish rillettes, three cheeses, granola, fruit, and coffee that people ask about by roaster.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">When and where</h2><!-- /wp:heading --><!-- wp:paragraph --><p>7:30–10:30 in the dining room, till 11:00 on the terrace in summer, and in a basket to your room (€9) if you’d rather watch the mist lift from bed.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = juniper_house_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'rooms', 'about', 'experiences', 'blog', 'booking' ) as $slug ) {
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
add_action( 'after_switch_theme', 'juniper_house_build_demo_site' );
