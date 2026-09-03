<?php
/**
 * Title: About School
 * Slug: educalite/about
 * Categories: edu-pages, educalite
 * Keywords: about, school, history
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>ABOUT OUR SCHOOL</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">A school built for outcomes, not lectures</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Founded in 2018 with one evening class of 14 students. Today: 25,000 graduates, a 92% completion rate, and hiring partners in 12 countries.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>about-school.jpg" alt="Teacher at the blackboard during a lesson" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Why we teach differently</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Most online courses are video libraries with a quiz at the end. Ours are closer to an apprenticeship: small cohorts with fixed start dates, weekly projects reviewed by instructors, and live Q&amp;A where no question stays unanswered.</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p>It is more work for us — and the reason 92% of our students finish, versus under 15% industry-wide.</p>
<!-- /wp:paragraph --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Milestones</h2>
<!-- /wp:heading --><!-- wp:list -->
<ul><!-- wp:list-item -->
<li><strong>2018</strong> — first evening class, 14 students, one borrowed projector.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>2020</strong> — online campus launches; 5,000th graduate.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>2023</strong> — certified continuing-education provider; certificates become QR-verifiable.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>2026</strong> — 25,000 graduates, 40 instructors, 120+ courses.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>about-library.jpg" alt="Student studying in the campus library" style="border-radius:16px"/></figure>
<!-- /wp:image --><!-- wp:group {"backgroundColor":"primary-soft","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Accreditation</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Certified continuing-education provider. Every certificate carries a QR code employers can verify in seconds.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/courses/">Find your course →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
