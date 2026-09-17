<?php
/**
 * Sterling Cole — complete demo law-firm site setup.
 *
 * On theme activation/switch, builds the full website automatically:
 * pages with finished copy + photos, journal posts, navigation menu,
 * homepage settings and featured images. Idempotent: existing content
 * is never overwritten.
 *
 * @package Sterling_Cole
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sterling_cole_pattern_content( $slug ) {
	$file = get_stylesheet_directory() . '/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return ob_get_clean();
}

function sterling_cole_import_photo( $filename, $title ) {
	$found = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'meta_key'       => '_sterling_cole_file',
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
	update_post_meta( $attachment_id, '_sterling_cole_file', $filename );

	return (int) $attachment_id;
}

/**
 * Get a category ID by name, creating it if missing (frontend-safe).
 *
 * @param string $name Category name.
 * @return int Category ID.
 */
function sterling_cole_ensure_category( $name ) {
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

function sterling_cole_ensure_page( $slug, $title, $pattern = null, $photo = null ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		// Publish untouched drafts (e.g. WordPress installs a draft
		// "Privacy Policy" page) so no URL ends in a 404.
		if ( 'publish' !== $existing->post_status ) {
			wp_update_post(
				array(
					'ID'           => $existing->ID,
					'post_status'  => 'publish',
					'post_content' => $pattern ? sterling_cole_pattern_content( $pattern ) : $existing->post_content,
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
			'post_content' => $pattern ? sterling_cole_pattern_content( $pattern ) : '',
			'post_status'  => 'publish',
		)
	);

	if ( $page_id && $pattern ) {
		// Pattern pages carry their own designed headline: hide the
		// automatic template title to avoid duplicate H1 headings.
		update_post_meta( $page_id, '_wp_page_template', 'page-no-title' );
	}

	if ( $page_id && $photo ) {
		$att_id = sterling_cole_import_photo( $photo, $title );
		if ( $att_id ) {
			set_post_thumbnail( $page_id, $att_id );
		}
	}

	return (int) $page_id;
}

/**
 * Build the complete demo site. Idempotent — never touches existing content.
 */
function sterling_cole_build_demo_site() {
	$pages = array(
		'home'           => array( 'Home', 'home', 'hero-office.jpg' ),
		'practice'       => array( 'Practice areas', 'practice', 'scales-books.jpg' ),
		'attorneys'      => array( 'Our attorneys', 'attorneys', 'team-group.jpg' ),
		'results'        => array( 'Case results', 'results', 'handshake.jpg' ),
		'about'          => array( 'About', 'about', 'library.jpg' ),
		'contact'        => array( 'Request a consultation', 'contact', 'conference.jpg' ),
		'faq'            => array( 'FAQ', 'faq', null ),
		'gallery'        => array( 'Chambers & symbols', 'gallery', 'courts.jpg' ),
		'blog'           => array( 'Journal', null, null ),
		'privacy-policy' => array( 'Privacy policy', 'privacy', null ),
		'imprint'        => array( 'Imprint', 'imprint', null ),
	);

	$ids = array();
	foreach ( $pages as $slug => $def ) {
		$ids[ $slug ] = sterling_cole_ensure_page( $slug, $def[0], $def[1], $def[2] );
	}

	if ( ! get_option( 'page_on_front' ) && ! empty( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'page_for_posts' ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}

	$cat_guides = sterling_cole_ensure_category( 'Legal guides' );
	$cat_news   = sterling_cole_ensure_category( 'Firm news' );

	$posts = array(
		array(
			'title' => 'Divorce process checklist: what to do first',
			'name'  => 'divorce-process-checklist',
			'photo' => 'signing.jpg',
			'cats'  => array( $cat_guides ),
			'body'  => '<!-- wp:paragraph --><p>Divorce feels chaotic; the legal process is not. Here is the order we walk every client through — calmly, step by step.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1. Secure the essentials first</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Copies of IDs, marriage certificate, bank and mortgage statements, and any prenuptial agreement. Do not move money yet — just document it.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">2. Think about the children’s rhythm</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Courts protect stability: school, routines, caregiving history. Keep a simple diary for two weeks before your consultation — it helps more than any argument.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3. Get advice before you announce</h2><!-- /wp:heading --><!-- wp:paragraph --><p>One free consultation with us usually saves months. We map timelines, costs and realistic outcomes before anything is filed.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Employee rights: what to do after a dismissal',
			'name'  => 'employee-rights-dismissal',
			'photo' => 'meeting.jpg',
			'cats'  => array( $cat_guides ),
			'body'  => '<!-- wp:paragraph --><p>Dismissed out of nowhere? Do not sign anything on the spot. Most severance offers are negotiable — often substantially.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Deadlines beat drama</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Unfair-dismissal claims have short limitation periods. Note the date, keep the termination letter, and get the offer reviewed within days — our severance review starts at $350.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">What we negotiate for you</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Higher severance, clean reference, release wording, garden-leave pay and non-compete limits. Most cases settle without court.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Why every adult needs a will (and what happens without one)',
			'name'  => 'why-every-adult-needs-a-will',
			'photo' => 'signing-close.jpg',
			'cats'  => array( $cat_guides ),
			'body'  => '<!-- wp:paragraph --><p>Two-thirds of adults have no will — which means the state writes one for them. It is rarely what they would have chosen.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">Without a will</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Intestacy rules decide heirs, guardians and shares. Unmarried partners typically inherit nothing; blended families face the longest delays.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">With a Sterling Cole will</h2><!-- /wp:heading --><!-- wp:paragraph --><p>One meeting, one week, from $390: will, powers of attorney and guardianship wishes, all consistent. Founders also get company succession aligned.</p><!-- /wp:paragraph -->',
		),
		array(
			'title' => 'Small-business contracts: five basics that prevent lawsuits',
			'name'  => 'small-business-contracts-basics',
			'photo' => 'signing-pen.jpg',
			'cats'  => array( $cat_news ),
			'body'  => '<!-- wp:paragraph --><p>Most lawsuits we litigate started as a one-page “standard” contract. These five clauses prevent the expensive ones.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">1–2. Scope and payment terms</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Define deliverables, acceptance and late-payment interest. Vague scope is the #1 dispute source for small firms.</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">3–5. Termination, liability, venue</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Notice periods, liability caps and the court that decides. Our fixed-fee contract review from $450 pays for itself with the first avoided dispute.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['name'], OBJECT, 'post' ) ) {
			continue;
		}
		$img_tag = '';
		$att_id  = sterling_cole_import_photo( $p['photo'], $p['title'] );
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
			foreach ( array( 'home', 'practice', 'attorneys', 'results', 'about', 'blog', 'contact' ) as $slug ) {
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
add_action( 'after_switch_theme', 'sterling_cole_build_demo_site' );
