<?php
/**
 * Title: Clinic Home
 * Slug: vitalia-clinic/home
 * Categories: vitalia-pages, vitalia-clinic
 * Keywords: home, hero, clinic, doctors
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:cover {"url":"<?php echo $uri; ?>hero-doctor.jpg","dimRatio":35,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":78,"minHeightUnit":"vh","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:78vh"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-35 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Doctor smiling in a bright clinic" src="<?php echo $uri; ?>hero-doctor.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"small"} -->
<p class="has-text-align-center has-base-color has-text-color has-small-font-size"><strong>GENERAL PRACTICE · DENTAL · LAB</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base"} -->
<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color">Care that knows your name</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"large"} -->
<p class="has-text-align-center has-base-color has-text-color has-large-font-size">Same-day appointments, honest prices, doctors who listen. Your neighborhood clinic for everything from checkups to dental.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/services/">Our services</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"base"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="/booking/">Book a visit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","backgroundColor":"primary","textColor":"base","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-base-color has-background" style="padding-top:1rem;padding-bottom:1rem"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size"><strong>👥 12,000+ PATIENTS</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size"><strong>⭐ 4.9 · 900+ REVIEWS</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size"><strong>📅 SAME-DAY APPOINTMENTS</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>DEPARTMENTS</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Three doors, one team</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.25rem","left":"1.25rem","right":"1.25rem","bottom":"1.25rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>cardio.jpg" alt="Cardiology examination" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Cardiology · from €49</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Heart checkups, ECG, blood-pressure plans — prevention first, referrals when it matters.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.25rem","left":"1.25rem","right":"1.25rem","bottom":"1.25rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>dental-chair.jpg" alt="Modern dental chair" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Dental · from €39</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Gentle checkups, hygiene and fillings — with evening slots for working patients.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.25rem","left":"1.25rem","right":"1.25rem","bottom":"1.25rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:12px;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem"><!-- wp:image {"aspectRatio":"16/10","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>lab.jpg" alt="In-house laboratory" style="border-radius:12px;aspect-ratio:16/10;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Lab · results in 24h</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>In-house blood work, vaccinations and health screens — results by next day.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/services/">All treatments &amp; prices →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"primary-soft","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-soft-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>MEET THE DOCTORS</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Familiar faces, every visit</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>doctor-female.jpg" alt="Dr. Elena Marsh" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Dr. Elena Marsh — General practice</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Mon–Fri · prevention, chronic care, family medicine.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>doctor-male.jpg" alt="Dr. Tomas Reid" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Dr. Tomas Reid — Cardiology</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Tue–Sat · heart health, ECG, blood-pressure care.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/doctors/">Meet all doctors →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Patients say it</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:paragraph -->
<p>★★★★★<br>“Called at 8:05 with a fever, seen at 10:30. Dr. Marsh actually listened — first time in years.”</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Anna K.</strong> — patient since 2021</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:paragraph -->
<p>★★★★★<br>“Dental without fear. They explained every step, the price matched the quote to the euro.”</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Markus T.</strong> — dental patient</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:paragraph -->
<p>★★★★★<br>“Lab results the next morning, prescription by noon. My whole family switched here.”</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Familie Brandt</strong> — family practice</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"secondary","textColor":"base","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-base-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":2,"textColor":"base"} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color">Feeling unwell? Don’t wait.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Same-day slots every weekday — call or book online in under a minute.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="/booking/">Book a visit →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
