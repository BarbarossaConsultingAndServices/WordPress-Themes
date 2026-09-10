<?php
/**
 * Title: Clinic Services
 * Slug: vitalia-clinic/services
 * Categories: vitalia-pages, vitalia-clinic
 * Keywords: services, treatments, cardiology, dental, lab
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>TREATMENTS &amp; SERVICES</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Services &amp; treatments</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Honest prices, no surprises. Insured patients pay nothing extra for covered care — self-payers get a written quote before anything happens.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>checkup.jpg" alt="General practice checkup" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">🩺 General practice · from €29</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Checkups, sick visits, chronic-care plans and referrals — with same-day slots every weekday.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>cardio.jpg" alt="Cardiology examination" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">❤️ Cardiology · from €49</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>ECG, 24h blood-pressure monitoring and heart-risk screening with a personal prevention plan.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>dental-chair.jpg" alt="Modern dental treatment room" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">🦷 Dental · from €39</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Checkups, professional cleaning, fillings and crowns — gentle, with evening appointments.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>lab.jpg" alt="Laboratory analysis" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">🧪 Laboratory · from €19</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>In-house blood work and health screens — results within 24 hours, explained in plain words.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>vaccine.jpg" alt="Vaccination" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">💉 Vaccination · from €25</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Flu, travel and booster shots with a digital certificate — walk in Tue &amp; Thu afternoons.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>telehealth.jpg" alt="Video consultation" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">💻 Telehealth · from €24</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Video visits, repeat prescriptions and follow-ups — same doctors, from your sofa.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/booking/">Book a visit →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
