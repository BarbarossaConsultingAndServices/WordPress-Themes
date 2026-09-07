<?php
/**
 * Title: Studio About
 * Slug: forge-studio/about
 * Categories: forge-pages, forge-studio
 * Keywords: about, story, gym
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>OUR STORY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textColor":"contrast"} -->
<h1 class="wp-block-heading has-contrast-color has-text-color">Born in a garage. Raised by its members.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">2015: two barbells, a borrowed rack, eight friends in a Wedding garage. 2026: 1,200 m², 900 members, 14 coaches — and the same rule as day one: nobody trains alone unless they want to.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>about-ring.jpg" alt="Boxing ring at Forge Studio" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2,"textColor":"contrast"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color">What we believe</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p><strong>Strength is for everyone.</strong> Our youngest member is 16, our oldest 78. Programs scale from first push-up to 200 kg deadlift — same room, same respect.</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p><strong>Coaching beats equipment.</strong> We buy fewer machines and more coach hours than any gym in the city. A €30,000 rig never fixed anyone’s squat; a good cue does it in a minute.</p>
<!-- /wp:paragraph --><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>grit-plates.jpg" alt="Loaded barbell on the platform" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>bench.jpg" alt="Member pressing on the bench" style="border-radius:12px"/></figure>
<!-- /wp:image --><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:12px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3,"textColor":"contrast"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color">The floor</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">🏋️ 8 lifting platforms + racks<br>🥊 Boxing room with 10 bags<br>🧘 120 m² mobility studio<br>🧖 Sauna + cold shower<br>🚿 Big clean changing rooms</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/join/">Train with us →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
