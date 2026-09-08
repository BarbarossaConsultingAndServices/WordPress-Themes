<?php
/**
 * Title: Meet Your Agents
 * Slug: haven-estates/agents
 * Categories: haven-pages, haven-estates
 * Keywords: agents, team, realtors
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>OUR AGENTS</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Meet your agents</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Two specialists, zero hand-offs. The person who values your home shows it — and answers on weekends.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>agent-male.jpg" alt="Portrait of agent Daniel Reyes" style="border-radius:16px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Daniel Reyes — Buyer specialist</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>240+ families housed. Loves first-time buyers, total-cost math and talking clients out of bad deals. Licensed since 2014.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>agent-female.jpg" alt="Portrait of agent Sofia Marin" style="border-radius:12px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Sofia Marin — Seller specialist</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Staging + pricing that averages 6% above asking. Free valuation in 48 hours, photography included. Licensed since 2012.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"backgroundColor":"primary-soft","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"2rem","left":"2rem","right":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-group has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">How we work</h2>
<!-- /wp:heading --><!-- wp:list {"ordered":true} -->
<ol><!-- wp:list-item -->
<li><strong>First call, 20 minutes</strong> — budget, streets, timeline. Honest yes or no on fit.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Shortlist + viewings</strong> — max 5 homes per tour, full cost sheets each.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Offer to keys</strong> — negotiation, inspection, notary. One agent throughout.</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact/">Book a viewing →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
