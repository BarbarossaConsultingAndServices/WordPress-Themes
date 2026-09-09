<?php
/**
 * Forge Studio — complete demo gym site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Forge_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function forge_studio_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function forge_studio_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_forge_studio_file',
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
	update_post_meta( $attachment_id, '_forge_studio_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function forge_studio_ensure_category( $name ) {
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

function forge_studio_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? forge_studio_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? forge_studio_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = forge_studio_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function forge_studio_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-forge.jpg' ),
		'classes'        => array( 'Classes', 'classes', 'class-hiit.jpg' ),
		'trainers'       => array( 'Trainers', 'trainers', 'pt-session.jpg' ),
		'membership'     => array( 'Membership', 'membership', 'grit-barbell.jpg' ),
		'about'          => array( 'Our story', 'about', 'about-ring.jpg' ),
		'faq'            => array( 'Good to know', 'faq', null ),
		'join'           => array( 'Join now', 'join', 'bench.jpg' ),
		'blog'           => array( 'Journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = forge_studio_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_tips = forge_studio_ensure_category( 'Training tips' );
	$cat_news = forge_studio_ensure_category( 'Studio news' );

	$posts = array(
		array(
			'title' => 'Your first 4 weeks: the beginner plan that actually works',
			'name'  => 'beginner-plan-4-weeks',
			'photo' => 'pt-session.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>New here? Don’t start with six days a week and a 5 AM alarm. This is the exact 4-week plan our trainers give every beginner — 3 sessions a week, full body, done in an hour.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Weeks 1–2: learn the five lifts</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Squat, hinge, push, pull, carry. Light weights, perfect form, a trainer checking every set. Soreness is normal; pain is not — tell us immediately.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Weeks 3–4: add load, add a class</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Weights go up 2.5 kg per session, and you add one coached class — HIIT for conditioning or yoga for mobility. By week five you’ll wonder why the bar ever scared you.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Free intro session for all new members every Saturday 10:00. Just show up in gym clothes.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Sunrise swim club launches May 2 (yes, the lake is cold)',
			'name'  => 'swim-club-launch',
			'photo' => 'class-swim.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Every Tuesday and Thursday, 6:30 sharp at the north pier: 20 minutes in the lake, then coffee from Tom’s thermos. Wetsuits lendable, excuses not accepted.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Why cold water</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Mood, sleep, and the smug feeling that lasts till lunch. Start with two minutes; nobody stays in longer at first, whatever they claim.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">How to join</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Free for members, €5 for guests. Sign the sheet at reception so we know who to fish out. Towels provided, bravery required.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Boxing fundamentals: 6-week course starts October 6',
			'name'  => 'boxing-fundamentals',
			'photo' => 'wraps.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Stance, jab, cross, hook — and footwork that makes it all work. Coach Devon’s legendary beginner course returns: six weeks, max 12 people, wraps included.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Who it’s for</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Absolute beginners. No sparring, no black eyes, just bags, pads and the best cardio of your life. Women-only and mixed groups available.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Price</h2><!-- /wp:heading --><!-- wp:paragraph --><p>€89 for members, €129 for guests including all six sessions and loan gloves. It sells out every time — reception takes names from Monday.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Summer 10K: from couch to finish line in 10 weeks',
			'name'  => 'summer-10k-challenge',
			'photo' => 'beach-run.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>Our run club takes complete beginners to a 10K finish line every summer. This year’s race: July 18. Here’s how the ten weeks work.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The method: 3 runs a week</h2><!-- /wp:heading --><!-- wp:paragraph --><p>One easy run, one intervals session (Tuesdays 18:30, coached), one long slow Sunday run that grows by 1 km a week. Miss a session? Life happens — just don’t miss two in a row.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The deal</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Free for members. Finishers get the legendary finish-line breakfast and a shirt that actually fits. Last year 41 started, 39 finished. Be number 40.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = forge_studio_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'classes', 'trainers', 'membership', 'blog', 'join' ) as $slug ) {
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
add_action( 'after_switch_theme', 'forge_studio_build_demo_site' );
