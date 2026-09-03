<?php
/**
 * Title: News Front Page
 * Slug: newsline/front-page
 * Categories: news-pages, newsline
 * Keywords: front page, hero, grid
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:1.5rem;padding-bottom:1rem"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0.8rem","bottom":"0.8rem","left":"1rem","right":"1rem"}},"border":{"radius":"8px"}},"backgroundColor":"primary","textColor":"base","layout":{"type":"flex","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide has-primary-background-color has-base-color has-background" style="border-radius:8px;padding-top:0.8rem;padding-right:1rem;padding-bottom:0.8rem;padding-left:1rem"><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>● MORNING BRIEFING OUT</strong> — 7 stories in 5 minutes</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="/blog/" style="color:inherit;text-decoration:underline">All stories →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>hero-city.jpg" alt="City skyline at dusk" style="border-radius:12px"/></figure>
<!-- /wp:image --><!-- wp:post-terms {"term":"category","textColor":"primary","fontSize":"small"} /--><!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size"><a href="/blog/">City approves 40 km of new protected bike lanes</a></h1>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>The largest cycling investment in city history passed 7–4 after a four-hour debate. Construction starts in spring — we mapped every kilometer.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"1.25rem","left":"1.25rem","right":"1.25rem","bottom":"1.25rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:12px;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"8px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>markets.jpg" alt="Stock market board" style="border-radius:8px;aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size"><a href="/blog/">Rates hold steady: what it means for your savings</a></h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Fixed-term offers near 3% will not survive the first cut. Move your emergency fund this week.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"1.25rem","left":"1.25rem","right":"1.25rem","bottom":"1.25rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:12px;padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.25rem;padding-left:1.25rem"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"8px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>street.jpg" alt="Busy city street" style="border-radius:8px;aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size"><a href="/blog/">The 80-seat theater putting our street on the map</a></h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Sold-out premieres between a laundromat and a kiosk — and now the city theater prize.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"65%"} -->
<div class="wp-block-column" style="flex-basis:65%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Latest stories</h2>
<!-- /wp:heading --><!-- wp:query {"queryId":21,"query":{"perPage":5,"postType":"post","order":"desc","orderBy":"date","offset":"0"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"35%"} -->
<div class="wp-block-column" style="flex-basis:35%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"65%"} -->
<div class="wp-block-column" style="flex-basis:65%"><!-- wp:post-terms {"term":"category","textColor":"primary","fontSize":"small"} /--><!-- wp:post-title {"isLink":true,"level":4} /--><!-- wp:post-excerpt {"excerptLength":22} /--><!-- wp:post-date {"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/blog/">All stories →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"35%"} -->
<div class="wp-block-column" style="flex-basis:35%"><!-- wp:group {"backgroundColor":"contrast","textColor":"base","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-contrast-background-color has-base-color has-background" style="border-radius:12px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3,"textColor":"base"} -->
<h3 class="wp-block-heading has-base-color has-text-color">📬 The 5-minute briefing</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Join 12,000 readers. Every morning at 7:00, free, no spam.</p>
<!-- /wp:paragraph --><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="/newsletter/">Subscribe free</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Trending now</h3>
<!-- /wp:heading --><!-- wp:list {"ordered":true} -->
<ol><!-- wp:list-item -->
<li><a href="/blog/">City approves 40 km of new bike lanes</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/blog/">Rates hold: what it means for savings</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/blog/">Your steps are sold: fitness data market</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/blog/">Storm recap: grid holds, ferries cancelled</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/blog/">Three exhibitions worth the queue</a></li>
<!-- /wp:list-item --></ol>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Sections</h3>
<!-- /wp:heading --><!-- wp:list -->
<ul><!-- wp:list-item -->
<li><a href="/category/city/">City</a> — council, transport, weather</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/category/business/">Business</a> — money, startups, tech</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="/category/culture/">Culture</a> — stage, exhibitions, books</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
