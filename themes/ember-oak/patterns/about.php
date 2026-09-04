<?php
/**
 * Title: Restaurant About
 * Slug: ember-oak/about
 * Categories: ember-pages, ember-oak
 * Keywords: about, story, chef, team
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>OUR STORY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">It started with an oven and a stubborn idea</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">In 2019, chef Marco Rossi ripped the gas line out of a former bakery and installed a single oak-fired oven. Friends called it madness. Guests call it the best table in the neighborhood.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>about-fire.jpg" alt="Flames in the oak-fired oven" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Fire first, everything else follows</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Oak burns hot and clean with a whisper of sweetness. It sears salmon skin to glass, blisters flatbread in ninety seconds, and turns a humble carrot into the dish people write reviews about.</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p>Around the oven grew the rest: twelve tables, a bar of natural wines, a bakery corner where Ana’s sourdough rises for 48 hours, and a farm network of eleven producers within 100 kilometers.</p>
<!-- /wp:paragraph --><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>market.jpg" alt="Fresh market vegetables" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>interior.jpg" alt="Warm dining room" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:group {"backgroundColor":"primary-soft","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">By the numbers</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>🔥 1 wood oven, 0 gas<br>🚜 11 partner farms<br>🍷 80 natural wines<br>⭐ 4.8 from 2,300+ reviews</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">The people behind the fire</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>chef-marco.jpg" alt="Chef Marco Rossi in the kitchen" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Marco Rossi — Chef &amp; founder</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Fifteen years from Naples to Noma. Believes smoke is a spice and butter is a food group.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>chef-ana.jpg" alt="Ana Petrova cooking" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Ana Petrova — Head of bakery</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Guardian of Bruno the starter. Her 48-hour sourdough has its own fan club.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>waiter.jpg" alt="Service at Ember and Oak" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Jonas Weber — Host &amp; wine</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Remembers your anniversary and your wine. Runs the monthly Loire evenings.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/reservations/">Come taste the story →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
