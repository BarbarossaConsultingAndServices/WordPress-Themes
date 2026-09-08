<?php
/**
 * Title: About Haven Estates
 * Slug: haven-estates/about
 * Categories: haven-pages, haven-estates
 * Keywords: about, story, agency
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>OUR STORY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">A small agency with a long memory</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Haven Estates began in 2011 when broker Ana Haven sold the same corner house twice — once to a young couple, once, years later, to their daughter. We still believe homes are biographies, not inventory.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>formal-living.jpg" alt="Elegant formal living room" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">What we stand for</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p><strong>One agent, start to keys.</strong> No hand-offs between valuers, viewers and closers. Your agent knows your dog's name.</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p><strong>Numbers before romance.</strong> Every viewing comes with total monthly costs, renovation reserves and resale notes — so the heart decides with the head.</p>
<!-- /wp:paragraph --><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>living-wood.jpg" alt="Warm wooden living room" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>handshake.jpg" alt="Closing handshake at key handover" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:group {"backgroundColor":"primary-soft","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Haven Estates in numbers</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>🏠 480+ homes matched<br>⭐ 4.9 from 800+ reviews<br>⏱ 14 days median to offer<br>🔑 15 years on Keys Alley</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact/">Come by for coffee →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
