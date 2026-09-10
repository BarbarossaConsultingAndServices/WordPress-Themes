<?php
/**
 * Title: Clinic Booking
 * Slug: vitalia-clinic/booking
 * Categories: vitalia-pages, vitalia-clinic
 * Keywords: booking, appointment, contact
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>APPOINTMENTS</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Book a visit</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Online in under a minute — or call us. Same-day slots every weekday, confirmation by SMS.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Request an appointment</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Your name, phone, department and preferred time — plus symptoms or wishes we should know.</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Install the free FluentForms or Contact Form 7 plugin and paste your form shortcode here, e.g.:</p>
<!-- /wp:paragraph --><!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --><!-- wp:paragraph -->
<p>In a hurry? <a href="tel:+15550193344"><strong>+1 (555) 019-3344</strong></a> — reception answers Mon–Fri 8:00–18:00, Sat 9:00–13:00.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>reception.jpg" alt="Friendly clinic reception" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">How it works</h2>
<!-- /wp:heading --><!-- wp:list {"ordered":true} -->
<ol><!-- wp:list-item -->
<li><strong>Request</strong> — form or phone, under a minute.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Confirm</strong> — SMS with time and doctor name.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Visit</strong> — card + 10 minutes early, we do the rest.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Good to know</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Bring your insurance card and medication list. Cancellations free till 24h before. Emergency? Skip the form — call <a href="tel:+15550193344">+1 (555) 019-3344</a>, 24/7.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
