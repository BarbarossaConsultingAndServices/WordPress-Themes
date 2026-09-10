<?php
/**
 * Title: Booking Page
 * Slug: evermore-weddings/booking
 * Categories: evermore-pages, evermore-weddings
 * Keywords: booking, date, contact, availability
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>BOOKING</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Check your date</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Tell us your date and guest count — we reply within one business day with availability and a tailored quote. Tours every Saturday 10:00–16:00.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">Request your date</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Preferred date, backup date, guest count and vibe — garden, chapel, ballroom or “surprise us”.</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Install the free FluentForms or Contact Form 7 plugin and paste your form shortcode here, e.g.:</p>
<!-- /wp:paragraph --><!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --><!-- wp:paragraph -->
<p>Prefer to talk? <a href="tel:+15550274410"><strong>+1 (555) 027-4410</strong></a> — Mon–Fri 9:00–18:00.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>reception-table.jpg" alt="Reception table ready for guests" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">How booking works</h2>
<!-- /wp:heading --><!-- wp:list {"ordered":true} -->
<ol><!-- wp:list-item -->
<li><strong>Check</strong> — we hold your date free for 7 days.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Tour</strong> — Saturdays 10:00–16:00, champagne included.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Reserve</strong> — 25% deposit, rest 30 days before.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Good to know</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Tours Sat 10:00–16:00 · office Mon–Fri 9:00–18:00 · 2026–2027 now booking. Parking on site, backup rain plan always ready.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
