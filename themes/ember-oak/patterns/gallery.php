<?php
/**
 * Title: Restaurant Gallery
 * Slug: ember-oak/gallery
 * Categories: ember-pages, ember-oak
 * Keywords: gallery, photos, interior
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>GALLERY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Fire, food &amp; candlelight</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Shot on ordinary evenings — no food styling, no filters. This is what dinner looks like.</p>
<!-- /wp:paragraph -->

<!-- wp:gallery {"columns":3,"linkTo":"none","align":"wide"} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>hero-dining.jpg" alt="Candle-lit dining room"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>about-fire.jpg" alt="Open oak fire"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>dish-salmon.jpg" alt="Ember salmon"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>interior.jpg" alt="Dining room"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>bar.jpg" alt="Bar at night"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>spread.jpg" alt="Sharing table"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>dish-ramen.jpg" alt="Midnight ramen"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>cafe.jpg" alt="Café corner"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>dish-cake.jpg" alt="Honey cake"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Tag <strong>#emberandoak</strong> — we repost our favorite guest photo every Sunday.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
