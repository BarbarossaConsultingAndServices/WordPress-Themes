<?php
/**
 * Educalite — complete demo site setup.
 *
 * On theme activation/switch, builds the full school website automatically:
 * pages with finished copy + photos, sample posts, menus, homepage
 * settings and featured images. Idempotent: existing content is kept.
 *
 * @package Educalite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function educalite_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function educalite_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_educalite_file',
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
	update_post_meta( $attachment_id, '_educalite_file', $filename );

	return (int) $attachment_id;
}

function educalite_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return (int) $existing->ID;
	}

	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $pattern ? educalite_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $photo ) {
		$att_id = educalite_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

function educalite_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-campus.jpg' ),
		'courses'        => array( 'Courses', 'courses', 'course-wordpress.jpg' ),
		'about'          => array( 'About our school', 'about', 'about-school.jpg' ),
		'instructors'    => array( 'Instructors', 'instructors', null ),
		'events'         => array( 'Events', 'events', 'events-day.jpg' ),
		'pricing'        => array( 'Tuition', 'pricing', null ),
		'faq'            => array( 'Admissions FAQ', 'faq', null ),
		'contact'        => array( 'Enroll', 'contact', null ),
		'blog'           => array( 'Blog', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = educalite_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_tips = wp_create_category( 'Study tips' );
	$cat_news = wp_create_category( 'School news' );

	$posts = array(
		array(
			'title' => 'How to finish an online course (instead of quitting week 3)',
			'name'  => 'finish-online-course',
			'photo' => 'post-study.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>92% of our students finish their courses. Online averages are below 15%. The difference is not talent — it is structure. Here is ours.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. Study in cohorts, not alone</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Every Educalite course starts on a fixed date with a group of max 24 students. You see the same names in every live Q&amp;A, and nobody wants to be the one who falls behind.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. Ship something every week</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Theory without output evaporates. Each week ends with a small project — a page, a design, a proposal — reviewed by a real instructor, not an autograder.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3. Book the live sessions first</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Put all six live Q&amp;A dates in your calendar on day one. Students who attend at least four finish 97% of the time.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Online vs. classroom: an honest comparison',
			'name'  => 'online-vs-classroom',
			'photo' => 'post-online.jpg',
			'cats'  => array( $cat_tips ),
			'body'  => '<!-- wp:paragraph --><p>We run both formats with identical curricula, so we can compare fairly. Short answer: the format matters less than your schedule.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Choose classroom if…</h2><!-- /wp:heading --><!-- wp:paragraph --><p>You live nearby, focus better around people, and want the campus community — study groups, open days, graduation in person.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Choose online if…</h2><!-- /wp:heading --><!-- wp:paragraph --><p>You work full-time, live far away, or rewatch lessons at 2× speed. Online students get the same certificate, the same instructors, the same career support.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">You can switch once</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Life changes. Every enrollment includes one free format switch within the first three weeks.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'From course project to first client: Mara’s story',
			'name'  => 'student-success-story',
			'photo' => 'post-career.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Mara joined the Freelance Bootcamp with zero clients. Eight weeks later she had three paying ones — including the bakery around her corner, whose website was her course project.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The project that became a portfolio</h2><!-- /wp:heading --><!-- wp:paragraph --><p>“I built the bakery site as homework. My instructor said: this is good enough to sell. So I walked in with my laptop and sold it.”</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What the career module added</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Pricing calculators, proposal templates and two mock sales calls. “The mock calls were uncomfortable and worth everything,” Mara says.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Her advice to new students: pick a real local business for your course project from day one. Graduate with a portfolio <em>and</em> a reference.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = educalite_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'courses', 'instructors', 'events', 'blog', 'contact' ) as $slug ) {
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
add_action( 'after_switch_theme', 'educalite_build_demo_site' );
