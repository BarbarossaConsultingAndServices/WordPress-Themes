<?php
/**
 * Title: Booking Page
 * Slug: wag-stay/booking
 * Categories: wag-pages, wag-stay
 * Keywords: booking, reservation, contact
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>BOOKING</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Book their happiest days</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Tell us your dates — we reply within hours (7:00–19:00) with availability and a personal plan. New guests: first daycare day free.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Request dates</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Pet’s name, species, dates, service — plus quirks we should know (medication, fears, favorite toy).</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Install the free FluentForms or Contact Form 7 plugin and paste your form shortcode here, e.g.:</p>
<!-- /wp:paragraph --><!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --><!-- wp:paragraph -->
<p>In a hurry? <a href="tel:+15550102030"><strong>+1 (555) 010-2030</strong></a> — a human answers 7:00–19:00.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>white-pup.jpg" alt="White puppy waiting for pickup" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Before the first stay</h2>
<!-- /wp:heading --><!-- wp:list {"ordered":true} -->
<ol><!-- wp:list-item -->
<li><strong>Vaccinations</strong> — proof required (vet next door does them from €35).</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Trial day</strong> — free daycare day so we learn each other.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Pack</strong> — food for the stay + one smelly-from-home blanket.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Drop-off &amp; pickup</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Mon–Sat 7:00–19:00, boarding pickup till 20:00. Sundays boarding-only 9:00–12:00. Parking right outside.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
