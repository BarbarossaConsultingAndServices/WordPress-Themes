<?php
/**
 * Newsline — complete demo news site setup.
 *
 * On theme activation/switch, builds the full news website automatically:
 * section categories, finished articles with photos, pages, menus and
 * homepage settings. Idempotent: existing content is kept.
 *
 * @package Newsline
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function newsline_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function newsline_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_newsline_file',
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
	update_post_meta( $attachment_id, '_newsline_file', $filename );

	return (int) $attachment_id;
}

function newsline_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? newsline_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? newsline_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = newsline_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function newsline_ensure_category( $name ) {
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

function newsline_build_demo_site() {
	// 1. Section categories (match the header navigation).
	$cat_city     = newsline_ensure_category( 'City' );
	$cat_business = newsline_ensure_category( 'Business' );
	$cat_culture  = newsline_ensure_category( 'Culture' );

	// 2. Pages.
	$pages = array(
		'home'           => array( 'Home', 'front-page', 'hero-city.jpg' ),
		'about'          => array( 'Masthead', 'about', 'newsroom.jpg' ),
		'newsletter'     => array( 'Newsletter', 'newsletter', null ),
		'contact'        => array( 'Send a tip', 'contact', null ),
		'blog'           => array( 'Latest', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = newsline_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	// 3. Finished demo articles across all three sections.
	$posts = array(
		array(
			'title' => 'City approves 40 km of new protected bike lanes',
			'name'  => 'bike-lanes-approved',
			'photo' => 'commute.jpg',
			'cats'  => array( $cat_city ),
			'body'  => '<!-- wp:paragraph --><p>After a four-hour debate and a 7–4 vote, the council approved the largest cycling investment in the city’s history: 40 kilometers of protected lanes, to be built over three years.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Where they go first</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Construction starts in spring on the riverside corridor and the station avenue — the two stretches with the most commuter accidents. Shop owners along the route, initially skeptical, won a compromise: loading zones every 150 meters.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What it costs</h2><!-- /wp:heading --><!-- wp:paragraph --><p>€18 million, two-thirds from the federal mobility fund. The transport department promises the first 12 kilometers before winter. We will be counting.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Rates hold steady: what it means for your savings',
			'name'  => 'rates-hold-savings',
			'photo' => 'markets.jpg',
			'cats'  => array( $cat_business ),
			'body'  => '<!-- wp:paragraph --><p>No surprise from the central bank — but the statement’s tone shifted, and markets noticed. Here is what unchanged rates actually mean for savers, borrowers and renters.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Savers: lock in now</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Fixed-term offers near 3% will not survive the first cut. If your emergency fund sits at 0.5%, this week is the moment to move it.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Borrowers: wait, but prepare</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Mortgage rates follow with a lag of two to three months. Anyone refinancing next year should collect documents now and watch the December meeting.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Harbor startup raises €5M to replace delivery vans with cargo bikes',
			'name'  => 'cargo-bike-funding',
			'photo' => 'bridge.jpg',
			'cats'  => array( $cat_business ),
			'body'  => '<!-- wp:paragraph --><p>Founded in a harbor warehouse three years ago, VeloHafen just closed a €5 million round to expand its cargo-bike logistics network to four more cities.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The model</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Micro-depots at the city edge, electric cargo bikes for the last mile. The company claims 90% lower emissions per parcel than diesel vans — audited figures, published yearly.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What’s next</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Sixty new riders by spring, and a pilot with the municipal waste service. “The city moves at bike speed now,” the founder told us. “We just got there first.”</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'The 80-seat theater putting our street on the cultural map',
			'name'  => 'small-theater-big-stage',
			'photo' => 'street.jpg',
			'cats'  => array( $cat_culture ),
			'body'  => '<!-- wp:paragraph --><p>Between a laundromat and a late-night kiosk, the Kellerbühne stages premieres that sell out in hours. This weekend it won the city’s independent theater prize — with a play performed entirely in the dark.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">How it works</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Eighty seats, pay-what-you-can Thursdays, and a ensemble of nine who also sweep the floor. “Small rooms force honesty,” the director says. “You cannot hide behind spectacle down here.”</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">See it</h2><!-- /wp:heading --><!-- wp:paragraph --><p>The winning production runs until the end of the month. Thursday tickets are name-your-price; everything else is €18. Book early — the kiosk next door now sells out of popcorn too.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Three exhibitions actually worth the queue this month',
			'name'  => 'exhibitions-worth-queue',
			'photo' => 'toronto.jpg',
			'cats'  => array( $cat_culture ),
			'body'  => '<!-- wp:paragraph --><p>Our culture desk visited eleven openings so you don’t have to. Three are worth your Saturday.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. “Concrete Poetry” at the North Hall</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Brutalist photography paired with the poems it inspired. Go on Sunday morning — empty rooms, better light.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. The harbor archive opens its drawers</h2><!-- /wp:heading --><!-- wp:paragraph --><p>A century of shipping logs, love letters and smugglers’ maps. Free entry, tiny rooms, big stories.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3. Light installations in the old depot</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Twelve artists, one cavernous hall, zero daylight. Dress warmly and charge your phone — you will take photos.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Storm season test: grid holds, ferries cancelled, trees 0 — chimneys 2',
			'name'  => 'storm-season-recap',
			'photo' => 'coast.jpg',
			'cats'  => array( $cat_city ),
			'body'  => '<!-- wp:paragraph --><p>The first autumn storm swept through overnight with gusts up to 110 km/h. The tally at dawn: power stable, ferries tied up until noon, and two chimneys that will need masons.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What worked</h2><!-- /wp:heading --><!-- wp:paragraph --><p>The new underground cables in the northern districts passed their first real test — zero outages where last year 4,000 homes went dark. The flood gates closed on schedule.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What to watch today</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Fallen branches on cycle paths, delayed regional trains until at least 10:00, and flying roof tiles in the old town — the fire brigade asks residents to secure balcony furniture before the evening gusts.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Your steps are sold: the quiet market for fitness data',
			'name'  => 'fitness-data-market',
			'photo' => 'techdesk.jpg',
			'cats'  => array( $cat_business ),
			'body'  => '<!-- wp:paragraph --><p>That free step-counter app has 40 million users and one product: aggregated movement profiles, sold to insurers and retailers. We read the terms so you don’t have to.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What exactly is shared</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Location histories, sleep patterns and heart-rate zones — “anonymized”, though researchers keep showing how easily such profiles are re-identified with two or three data points.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">How to opt out</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Buried four menus deep: Profile → Privacy → “Research partnerships”. Toggle it off, then delete the stored history in the same menu. It takes ninety seconds; we timed it.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = newsline_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'blog', 'about', 'newsletter', 'contact' ) as $slug ) {
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
add_action( 'after_switch_theme', 'newsline_build_demo_site' );
