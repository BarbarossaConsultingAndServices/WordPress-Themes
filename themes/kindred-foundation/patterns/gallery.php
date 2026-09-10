<?php
/**
 * Title: Field Moments Gallery
 * Slug: kindred-foundation/gallery
 * Categories: kindred-pages, kindred-foundation
 * Keywords: gallery, photos, field, moments
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>FIELD MOMENTS</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Field moments</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Real work, real people — every photo taken by a volunteer or staff member last year.</p>
<!-- /wp:paragraph -->

<!-- wp:gallery {"columns":4,"linkTo":"none","align":"wide"} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-4"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>food-drive.jpg" alt="Food parcels being distributed"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>classroom-smiles.jpg" alt="Smiling children in a classroom"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>tree-planting.jpg" alt="Volunteers planting a young tree"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>beach-cleanup.jpg" alt="Beach cleanup crew with collected waste"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>elderly-visit.jpg" alt="Friendly home visit with a senior"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>hands-stack.jpg" alt="Many hands stacked in teamwork"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>library.jpg" alt="Children reading in the partner library"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>charity-sign.jpg" alt="Hand-painted charity event sign"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->
