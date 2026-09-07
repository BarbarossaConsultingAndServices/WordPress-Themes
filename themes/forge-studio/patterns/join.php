<?php
/**
 * Title: Join Page
 * Slug: forge-studio/join
 * Categories: forge-pages, forge-studio
 * Keywords: join, signup, contact, trial
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>JOIN FORGE</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center","textColor":"contrast"} -->
<h1 class="wp-block-heading has-text-align-center has-contrast-color has-text-color">First week €9. Then you’ll stay.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Full access for 7 days + one intro PT session. No card required, no sales call afterwards.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"55%"} -->
<div class="wp-block-column" style="flex-basis:55%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:12px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2,"fontSize":"x-large","textColor":"contrast"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-x-large-font-size">Claim your trial week</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Name, email, when you want to start — we reply within hours (9:00–20:00) with your personal entry code.</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Install the free FluentForms or Contact Form 7 plugin and paste your form shortcode here, e.g.:</p>
<!-- /wp:paragraph --><!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>move-squat.jpg" alt="Member squatting with a barbell" style="border-radius:12px"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"x-large","textColor":"contrast"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-x-large-font-size">Or just walk in</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>📍 Eisenstraße 44, 10115 Berlin<br>📞 +1 (555) 010-2030<br>🕖 Staffed daily 9:00–20:00</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p>Free intro workout every Saturday 10:00 — tour, movement check, first sweat. Gym clothes enough.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
