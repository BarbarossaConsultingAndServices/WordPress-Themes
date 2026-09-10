<?php
/**
 * Title: Clinic Doctors
 * Slug: vitalia-clinic/doctors
 * Categories: vitalia-pages, vitalia-clinic
 * Keywords: doctors, team, physicians
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>OUR TEAM</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Our doctors</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">One fixed doctor per patient — no repeating your story to strangers. Fourteen clinicians, three departments, one team.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>doctor-female.jpg" alt="Dr. Elena Marsh" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size">Dr. Elena Marsh — General practice</h2>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Mon–Fri 8:00–16:00 · prevention, family medicine, chronic care. 15 years, 4,000 regular patients.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>doctor-male.jpg" alt="Dr. Tomas Reid" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size">Dr. Tomas Reid — Cardiology</h2>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Tue–Sat 9:00–17:00 · heart screening, ECG, hypertension. Former university hospital senior.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>doctor-portrait.jpg" alt="Dr. Priya Nair" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size">Dr. Priya Nair — Pediatrics &amp; family</h2>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Mon–Thu 8:00–15:00 · children, vaccinations, worried parents. Speaks EN, DE, HI.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>dentist-smile.jpg" alt="Dr. Jonas Lind" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size">Dr. Jonas Lind — Dentistry</h2>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Mon–Fri + every 2nd Sat · gentle dentistry, hygiene, anxious patients welcome.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/booking/">Book with your doctor →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
