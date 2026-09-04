<?php
/**
 * Title: Booking Page
 * Slug: juniper-house/booking
 * Categories: juniper-pages, juniper-house
 * Keywords: booking, reservation, availability
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>BOOKING</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Book direct, sleep better</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Best rate guaranteed on this page, breakfast always included, free cancellation till 7 days before. No prepayment for standard rooms.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Request your dates</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Arrival, departure, room type, guests, and anything we should know (dog? anniversary? 5:00 hiking start?). We confirm personally within a few hours, 8:00–21:00.</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Install the free FluentForms or Contact Form 7 plugin and paste your booking form shortcode here, e.g.:</p>
<!-- /wp:paragraph --><!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --><!-- wp:paragraph -->
<p>Prefer a voice? <a href="tel:+15550102030"><strong>+1 (555) 010-2030</strong></a> — Lena or Tom pick up themselves.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>arrival.jpg" alt="Opening the door to your room" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">The fine print, in large print</h2>
<!-- /wp:heading --><!-- wp:list -->
<ul><!-- wp:list-item -->
<li><strong>Check-in</strong> 15:00–21:00 · <strong>check-out</strong> till 11:00 (suite till 13:00)</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Cancel free</strong> till 7 days before; later 80% of first night</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Breakfast, sauna, wifi, rowboat</strong> — always included</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Dogs</strong> €15/night · <strong>kids under 6</strong> free</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>7+ nights</strong> −20% automatically</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
