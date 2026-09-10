<?php
/**
 * Title: Donate Page
 * Slug: kindred-foundation/donate
 * Categories: kindred-pages, kindred-foundation
 * Keywords: donate, give, donation, support
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>GIVE TODAY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Donate</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">€10 buys 25 warm meals. €50 stocks a classroom for a week. Pick an amount — every gift is receipted and reported.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>coins.jpg" alt="Coins and notes collected for donations" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/donate/">€10 · 25 meals</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/donate/">€25 · school week</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/donate/">€50 · family parcel</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/donate/">€100 · clinic day</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:group {"backgroundColor":"primary-soft","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Full transparency, always</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>92% of your gift reaches programs, 5% keeps the lights on, 3% finds the next donor. Audited yearly, published every March. Donations are tax-deductible — your receipt arrives by email instantly.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
