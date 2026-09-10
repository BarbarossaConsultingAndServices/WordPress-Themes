<?php
/**
 * Title: Volunteer Page
 * Slug: kindred-foundation/volunteer
 * Categories: kindred-pages, kindred-foundation
 * Keywords: volunteer, help, join, roles
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>JOIN US</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Volunteer with us</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">340 neighbors already give two hours a week. Pick a role, get trained in one afternoon, start changing your street.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>food-sorting.jpg" alt="Volunteers sorting food donations" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">🍲 Food hero</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Sort, pack and hand out parcels at the weekly food bank. Saturdays 9–12, all ages welcome.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">📚 Study buddy</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Tutor one child, one hour a week, at a partner school near you. Training and materials included.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">🚐 Relief driver</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Drive the van for deliveries, pickups and emergency runs. License B required, good mood provided.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Sign up in 60 seconds</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Tell us your role and availability — the volunteer team replies within two days.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
