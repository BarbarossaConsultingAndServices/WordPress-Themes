<?php
/**
 * Nova Business — complete demo site setup.
 *
 * On theme activation/switch, this builds the full website automatically:
 * pages with finished copy + photos, blog posts, navigation menus,
 * homepage settings and featured images. Safe to run repeatedly:
 * existing pages (matched by slug) are never overwritten.
 *
 * @package Nova_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a theme pattern file to block markup (used as page content).
 *
 * @param string $slug Pattern file slug without .php.
 * @return string
 */
function nova_business_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

/**
 * Import a bundled theme photo into the media library (once per file).
 *
 * @param string $filename File in assets/images/.
 * @param string $title    Attachment title.
 * @return int Attachment ID, 0 on failure.
 */
function nova_business_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_nova_business_file',
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
	update_post_meta( $attachment_id, '_nova_business_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a page ID by slug, creating it from a pattern if missing.
 *
 * @param string      $slug    Page slug.
 * @param string      $title   Page title.
 * @param string|null $pattern Pattern slug for content, null for empty.
 * @param string|null $photo   Bundled photo for featured image.
 * @return int Page ID.
 */
function nova_business_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return (int) $existing->ID;
	}

	$content = $pattern ? nova_business_pattern_content( $pattern ) : '';
	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $content,
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $photo ) {
		$att_id = nova_business_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function nova_business_build_demo_site() {
	// 1. Pages (slug => title, pattern, featured photo).
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-home.jpg' ),
		'about'          => array( 'About us', 'about', 'about-office.jpg' ),
		'services'       => array( 'Services', 'services', 'service-build.jpg' ),
		'pricing'        => array( 'Pricing', 'pricing', null ),
		'faq'            => array( 'FAQ', 'faq', null ),
		'contact'        => array( 'Contact', 'contact', null ),
		'blog'           => array( 'Blog', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = nova_business_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	// 2. Homepage + posts page (only if the site has none set yet).
	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	// 3. Categories + sample posts with finished articles.
	$cat_guides = wp_create_category( 'Guides' );
	$cat_news   = wp_create_category( 'Studio news' );

	$posts = array(
		array(
			'title'    => 'How we launch a business website in 3 weeks',
			'name'     => 'launch-in-3-weeks',
			'photo'    => 'post-launch.jpg',
			'cats'     => array( $cat_guides ),
			'body'     => '<!-- wp:heading --><h2 class="wp-block-heading">Week 1 — strategy and copy</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Every project starts with a 90-minute workshop: who are your customers, what should they do on the site, and what proof do they need? From that we write the sitemap and the first copy draft. No design starts before the message is clear.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Week 2 — design and build</h2><!-- /wp:heading --><!-- wp:paragraph --><p>We design directly in Gutenberg blocks, so what you approve is literally the finished site — no Figma-to-code surprises. You review a staging link and leave comments on real pages.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Week 3 — SEO, speed and launch</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Final week is metadata, speed tuning, contact-form tests and a 45-minute handover call where we show your team how to edit everything themselves. Then we press launch together.</p><!-- /wp:paragraph -->',
		),
		array(
			'title'    => 'Why our sites load in under a second',
			'name'     => 'under-a-second',
			'photo'    => 'post-speed.jpg',
			'cats'     => array( $cat_guides ),
			'body'     => '<!-- wp:paragraph --><p>Speed is a feature: half of mobile visitors leave if a page takes longer than three seconds. Our themes stay fast with three rules.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. No page builder</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Everything is native Gutenberg blocks styled by theme.json. No shortcode soup, no extra CSS frameworks, no jQuery.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. System fonts first</h2><!-- /wp:heading --><!-- wp:paragraph --><p>We use Inter with system fallbacks and font-display swap, so text renders instantly even on slow connections.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3. Right-sized images</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Photos are compressed, served in modern sizes and lazy-loaded below the fold. The result: green Core Web Vitals out of the box.</p><!-- /wp:paragraph -->',
		),
		array(
			'title'    => '5 questions clients ask before signing (honest answers)',
			'name'     => 'questions-before-signing',
			'photo'    => 'post-clients.jpg',
			'cats'     => array( $cat_news ),
			'body'     => '<!-- wp:paragraph --><p>After 200+ launches, the same five questions come up in every first call. Here are our answers, in writing.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. Can we edit the site ourselves?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Yes — that is the whole point of building with Gutenberg. If you can use a word processor, you can edit your site.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. What happens if something breaks?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Care-plan customers get fixes within 24 hours. Everyone else can book support hours as needed.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3. Do we own the site?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>100%. Domain, hosting, theme and content are yours. No lock-in, no ransom notes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">4. How much does it really cost?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Fixed quotes only — see our pricing page. Changes you request mid-project are quoted before we build them.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">5. How do we start?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>One email or the contact form. We reply within 24 hours with three meeting slots.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = nova_business_import_photo( $p['photo'], $p['title'] );
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

	// 4. Primary navigation menu (created once, pages linked by ID).
	if ( ! wp_get_nav_menu_object( 'Primary' ) ) {
		$menu_id = wp_create_nav_menu( 'Primary' );
		if ( $menu_id ) {
			$items = array( 'home', 'about', 'services', 'pricing', 'blog', 'contact' );
			foreach ( $items as $slug ) {
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

	// 5. Remove untouched WordPress defaults so the site looks finished.
	$sample = get_page_by_path( 'sample-page' );
	if ( $sample && false !== strpos( $sample->post_content, 'This is an example page' ) ) {
		wp_trash_post( $sample->ID );
	}
	$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
	if ( $hello && false !== strpos( $hello->post_content, 'Welcome to WordPress' ) ) {
		wp_trash_post( $hello->ID );
	}
}
add_action( 'after_switch_theme', 'nova_business_build_demo_site' );
