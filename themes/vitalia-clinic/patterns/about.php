<?php
/**
 * Title: About the Clinic
 * Slug: vitalia-clinic/about
 * Categories: vitalia-pages, vitalia-clinic
 * Keywords: about, story, clinic
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>OUR STORY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">A neighborhood clinic that remembers you</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Founded in 2008 by Dr. Anna Vitalia with two rooms and one belief — medicine starts with listening. Today: 14 doctors, general practice, dental and lab under one roof, and still the same promise.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>building.jpg" alt="Vitalia Clinic building" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">What makes us different</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p><strong>One doctor who knows you.</strong> Every patient has a fixed GP — no repeating your history to strangers, ever.</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p><strong>Everything in-house.</strong> Blood work, ECG, X-ray and dental in the same building — results within 24 hours, explained in plain words.</p>
<!-- /wp:paragraph --><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>hands-care.jpg" alt="Doctor holding patient hands" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>team-group.jpg" alt="Vitalia Clinic team" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:group {"backgroundColor":"primary-soft","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Vitalia in numbers</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>👥 12,000+ registered patients<br>🩺 14 doctors, 3 departments<br>📅 Same-day slots daily<br>⭐ 4.9 from 900+ reviews</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/booking/">Book a tour →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
