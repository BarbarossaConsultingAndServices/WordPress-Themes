<?php
/**
 * Title: News Front Page
 * Slug: newsline/front-page
 * Categories: news-pages, newsline
 * Keywords: front page, hero, grid
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:2rem;padding-bottom:2rem"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0.8rem","bottom":"0.8rem","left":"1rem","right":"1rem"}},"border":{"radius":"8px"}},"backgroundColor":"primary","textColor":"base","layout":{"type":"flex","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide has-primary-background-color has-base-color has-background" style="border-radius:8px;padding-top:0.8rem;padding-right:1rem;padding-bottom:0.8rem;padding-left:1rem"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>● LIVE</strong> — Morning briefing is out</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="/blog/" style="color:#fff;text-decoration:underline">All stories →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":20,"query":{"perPage":4,"postType":"post","order":"desc","orderBy":"date","sticky":"include"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"1rem","left":"1rem","right":"1rem","bottom":"1rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:12px;padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /--><!-- wp:post-terms {"term":"category","style":{"typography":{"fontWeight":"700"}},"textColor":"primary","fontSize":"small"} /--><!-- wp:post-title {"isLink":true,"level":3} /--><!-- wp:post-excerpt {"moreText":"Continue reading"} /--><!-- wp:post-date {"fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"65%"} -->
<div class="wp-block-column" style="flex-basis:65%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Latest stories</h2>
<!-- /wp:heading --><!-- wp:query {"queryId":21,"query":{"perPage":6,"postType":"post","order":"desc","orderBy":"date","offset":"4"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"35%"} -->
<div class="wp-block-column" style="flex-basis:35%"><!-- wp:post-featured-image {"isLink":true} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"65%"} -->
<div class="wp-block-column" style="flex-basis:65%"><!-- wp:post-title {"isLink":true,"level":4} /--><!-- wp:post-excerpt {"excerptLength":20} /--><!-- wp:post-date {"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"35%"} -->
<div class="wp-block-column" style="flex-basis:35%"><!-- wp:group {"backgroundColor":"contrast","textColor":"base","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-contrast-background-color has-base-color has-background" style="border-radius:12px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3,"textColor":"base"} -->
<h3 class="wp-block-heading has-base-color has-text-color">📬 The 5-min briefing</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Join 12,000 readers. Free every morning.</p>
<!-- /wp:paragraph --><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="/newsletter/">Subscribe free</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Trending</h3>
<!-- /wp:heading --><!-- wp:list {"ordered":true} -->
<ol><!-- wp:list-item -->
<li><a href="/blog/">City approves new bike lanes</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/blog/">Interest rates: what changes</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/blog/">10 books editors loved</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/blog/">Local startup raises €5M</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
