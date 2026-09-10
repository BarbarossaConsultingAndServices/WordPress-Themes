<?php
/**
 * Title: Clinic Tour Gallery
 * Slug: vitalia-clinic/gallery
 * Categories: vitalia-pages, vitalia-clinic
 * Keywords: gallery, tour, photos, clinic
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>CLINIC TOUR</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Clinic tour</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Bright rooms, quiet corridors, real people — take a look before your first visit.</p>
<!-- /wp:paragraph -->

<!-- wp:gallery {"columns":3,"linkTo":"none","align":"wide"} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>reception.jpg" alt="Clinic reception"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>corridor.jpg" alt="Bright clinic corridor"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>consultation.jpg" alt="Doctor consultation"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>surgery-room.jpg" alt="Treatment room"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>lab.jpg" alt="In-house laboratory"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>dental-chair.jpg" alt="Dental treatment room"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>ward.jpg" alt="Quiet recovery ward"/></figure>
<!-- /wp:image -->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $uri; ?>team-group.jpg" alt="Vitalia Clinic team"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Like what you see? <a href="/booking/"><strong>Book a visit</strong></a> — tours every Friday at 15:00, no appointment needed.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
