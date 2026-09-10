<?php
/**
 * Vitalia Clinic — complete demo medical-clinic site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Vitalia_Clinic
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vitalia_clinic_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function vitalia_clinic_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_vitalia_clinic_file',
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
	update_post_meta( $attachment_id, '_vitalia_clinic_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function vitalia_clinic_ensure_category( $name ) {
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

function vitalia_clinic_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? vitalia_clinic_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? vitalia_clinic_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = vitalia_clinic_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function vitalia_clinic_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-doctor.jpg' ),
		'services'       => array( 'Treatments & services', 'services', 'consultation.jpg' ),
		'doctors'        => array( 'Our doctors', 'doctors', 'team-group.jpg' ),
		'pricing'        => array( 'Prices & insurance', 'pricing', 'reception.jpg' ),
		'booking'        => array( 'Book a visit', 'booking', 'reception.jpg' ),
		'about'          => array( 'About', 'about', 'building.jpg' ),
		'faq'            => array( 'FAQ', 'faq', null ),
		'gallery'        => array( 'Clinic tour', 'gallery', 'corridor.jpg' ),
		'blog'           => array( 'Health journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = vitalia_clinic_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_guides = vitalia_clinic_ensure_category( 'Health guides' );
	$cat_news   = vitalia_clinic_ensure_category( 'Clinic news' );

	$posts = array(
		array(
			'title' => 'Flu season: your vaccination guide',
			'name'  => 'flu-season-vaccination-guide',
			'photo' => 'vaccine.jpg',
			'cats'  => array( $cat_guides ),
			'body'  => '<!-- wp:paragraph --><p>Flu season is here — and the best protection takes ten minutes. Here is when to get vaccinated, who needs it most, and what to expect.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Who should get the flu shot?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Everyone over 6 months, especially seniors, pregnant patients, children, and anyone with asthma, diabetes or heart conditions. Walk in Tue &amp; Thu afternoons, no appointment needed.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What to expect</h2><!-- /wp:heading --><!-- wp:paragraph --><p>A quick consultation, the shot itself, and a digital certificate — from €25. Mild arm soreness for a day is normal; protection builds within two weeks.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Back pain: when to see a doctor (and when to move)',
			'name'  => 'back-pain-when-to-see-doctor',
			'photo' => 'consultation.jpg',
			'cats'  => array( $cat_guides ),
			'body'  => '<!-- wp:paragraph --><p>Eight in ten adults get back pain — most cases heal with movement, not bed rest. Here is how to tell harmless ache from red flags.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Keep moving, gently</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Short walks, heat, and staying at work if you can beat strict rest. Painkillers help you stay mobile — ask us for the right dose.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">See us promptly if…</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Numbness, bladder issues, fever with back pain, or pain after a fall need same-day care. Call +1 (555) 019-3344 — we keep daily acute slots free.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Child fever: a calm parent checklist',
			'name'  => 'child-fever-checklist',
			'photo' => 'checkup.jpg',
			'cats'  => array( $cat_guides ),
			'body'  => '<!-- wp:paragraph --><p>Fever in children is scary — and usually harmless. Dr. Nair’s checklist for staying calm and knowing when to call us.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The 3-step check</h2><!-- /wp:heading --><!-- wp:paragraph --><p>1. How is your child behaving — playing and drinking, or limp and drowsy? 2. Measure twice, note the numbers. 3. Fluids, light clothes, rest — not ice baths.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Call us if…</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Under 3 months with fever, over 39°C lasting 3+ days, rash with fever, or a child that worries you — trust your gut. Children under 6 get priority same-day slots every morning.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'How often do you really need a dental checkup?',
			'name'  => 'how-often-dental-checkup',
			'photo' => 'dental-chair.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Twice a year? Once? Dr. Lind explains what the evidence says — and why the right interval depends on your teeth, not the calendar.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">The honest answer</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Healthy teeth with no gum disease: every 12 months is fine. Fillings, crowns, gum issues or smoking: every 6 months. We set your personal recall — no nagging, just reminders.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What a checkup includes</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Exam, X-ray plan if needed, and professional cleaning advice — checkup €39, cleaning €79. Evening slots available for working patients.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = vitalia_clinic_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'services', 'doctors', 'pricing', 'about', 'blog', 'booking' ) as $slug ) {
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
add_action( 'after_switch_theme', 'vitalia_clinic_build_demo_site' );
