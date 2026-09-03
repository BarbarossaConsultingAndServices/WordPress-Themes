<?php
/**
 * Title: Masthead About
 * Slug: newsline/about
 * Categories: news-pages, newsline
 * Keywords: about, masthead, team
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>MASTHEAD</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Independent. Reader-funded. Since 2020.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Newsline is a newsroom of 8 journalists covering city, business and culture — without clickbait, without tracking ads, without a paywall on essentials.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>newsroom.jpg" alt="The Newsline newsroom during morning conference" style="border-radius:12px"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Our principles</h2>
<!-- /wp:heading --><!-- wp:list -->
<ul><!-- wp:list-item -->
<li><strong>Facts first.</strong> Two sources or it doesn’t run. Corrections are published visibly, never silently.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>No paywall on essentials.</strong> Weather warnings, council decisions and emergency news are free forever.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>No tracking ads.</strong> We are funded by 4,200 members and clearly labeled sponsorships.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">How we’re funded</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>68% memberships, 22% sponsorships, 10% events. Our annual transparency report lists every euro over €1,000.</p>
<!-- /wp:paragraph --><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/newsletter/">Become a member →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">The newsroom</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>reporter-anna.jpg" alt="Portrait of Anna Feld" style="border-radius:50%;aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"textAlign":"center","fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size">Anna Feld</h3>
<!-- /wp:heading --><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">Editor-in-chief · City &amp; investigations<br>anna@newsline.example</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>reporter-ben.jpg" alt="Portrait of Ben Kaya" style="border-radius:50%;aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"textAlign":"center","fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size">Ben Kaya</h3>
<!-- /wp:heading --><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">Business desk · Money &amp; startups<br>ben@newsline.example</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>reporter-cara.jpg" alt="Portrait of Cara Lind" style="border-radius:50%;aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"textAlign":"center","fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size">Cara Lind</h3>
<!-- /wp:heading --><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">Culture desk · Stage &amp; books<br>cara@newsline.example</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">…plus five reporters, two photographers and one very tired office dog. <a href="/contact/">Send us a tip →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
