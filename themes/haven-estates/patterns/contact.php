<?php
/**
 * Title: Book a Viewing
 * Slug: haven-estates/contact
 * Categories: haven-pages, haven-estates
 * Keywords: contact, viewing, booking, appointment
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>CONTACT</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Book a viewing</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Tell us which homes caught your eye — we reply within hours (9:00–19:00) with viewing times and cost sheets.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Request times</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Home, preferred days, party size — plus must-haves (garden, lift, parking).</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Install the free FluentForms or Contact Form 7 plugin and paste your form shortcode here, e.g.:</p>
<!-- /wp:paragraph --><!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --><!-- wp:paragraph -->
<p>In a hurry? <a href="tel:+15550148890"><strong>+1 (555) 014-8890</strong></a> — a human answers 9:00–19:00.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>apartment-living.jpg" alt="Bright apartment living room" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Visit us</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>📍 Keys Alley 12, 10115 Berlin<br>📞 +1 (555) 014-8890<br>📧 hello@haven-estates.example</p>
<!-- /wp:paragraph --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Office hours</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Mon–Sat 9:00–19:00. Viewings daily by appointment, evenings included. Parking right outside.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
