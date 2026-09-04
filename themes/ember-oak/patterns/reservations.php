<?php
/**
 * Title: Reservations
 * Slug: ember-oak/reservations
 * Categories: ember-pages, ember-oak
 * Keywords: reservations, booking, table, hours
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>RESERVATIONS</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Your table is waiting</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Dinner Tue–Sun · Lunch Tue–Fri · Brunch Sat–Sun 10:00–14:00 (walk-in only).<br>Groups of 7+: call us — the round table seats 12.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Book in 30 seconds</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Date, time, party size, phone number — we confirm by SMS within the hour (during opening times).</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Install the free FluentForms, Contact Form 7 or a booking plugin (e.g. Five-Star Reservations) and paste the shortcode here, e.g.:</p>
<!-- /wp:paragraph --><!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --><!-- wp:paragraph -->
<p>In a hurry? Call <a href="tel:+15550102030"><strong>+1 (555) 010-2030</strong></a> — if we don’t pick up, we’re plating; leave a message.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>cafe.jpg" alt="Cozy café corner by the window" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Good to know</h2>
<!-- /wp:heading --><!-- wp:list -->
<ul><!-- wp:list-item -->
<li><strong>Late?</strong> Tables are held 15 minutes — a quick call saves them.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Kids?</strong> Very welcome till 19:00; high chairs ready.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Dogs?</strong> On the terrace anytime, inside at lunch.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Wheelchair?</strong> Step-free entrance + accessible restroom.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Private dining?</strong> The cellar room seats 14 — ask for events.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"backgroundColor":"contrast","textColor":"base","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-contrast-background-color has-base-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%"><!-- wp:heading {"level":3,"textColor":"base"} -->
<h3 class="wp-block-heading has-base-color has-text-color">📍 Find us</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Marktstraße 8, 10115 Berlin — 3 min from U8 Bernauer Straße, parking garage around the corner on Gartenstraße.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"contrast","width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="/menu/">Hungry? See menu</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
