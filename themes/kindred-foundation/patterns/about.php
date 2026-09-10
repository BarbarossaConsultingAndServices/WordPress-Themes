<?php
/**
 * Title: About Foundation
 * Slug: kindred-foundation/about
 * Categories: kindred-pages, kindred-foundation
 * Keywords: about, story, team, foundation
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>OUR STORY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Neighbors helping neighbors since 2012</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">It began with one soup pot on a cold December evening. Founder Mara Lind fed twelve neighbors — today Kindred Foundation serves 48,200 meals a year with 340 volunteers and 28 staff.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>kids-group.jpg" alt="Group of happy children at a foundation program" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">What makes us different</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>We stay small on purpose: one city, deep roots, every partner known by name. No sprawling overhead — just food, classrooms and care, delivered by people who live on the same streets.</p>
<!-- /wp:paragraph --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Meet the team</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p><strong>Mara Lind</strong> — founder, still ladles soup every Friday. <strong>Jonas Reber</strong> — programs lead, ex-teacher. <strong>Priya Nair</strong> — volunteer coordinator, knows all 340 by name. Plus 28 staff and a board of five, all unpaid.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><strong>48,200</strong><br>meals served last year</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><strong>120</strong><br>partner schools</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><strong>92%</strong><br>of gifts to programs</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/donate/">Support our work →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
