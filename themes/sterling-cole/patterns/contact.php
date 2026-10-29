<?php
/**
 * Title: Request a Consultation
 * Slug: sterling-cole/contact
 * Categories: sterling-pages, sterling-cole
 * Keywords: contact, consultation, form
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>CONTACT</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textAlign":"center"} -->
<h1 class="wp-block-heading has-text-align-center">Request a consultation</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><em>Everything you share is covered by attorney-client privilege — even before you engage us. Initial consultation free.</em></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2,"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">Call or write</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Phone: <a href="tel:+15550429917">+1 (555) 042-9917</a><br>Email: <a href="mailto:hello@sterling-cole.example">hello@sterling-cole.example</a><br>Hours: Mon–Fri 9:00–18:00<br>Address: 14 Counsel Row, Suite 900, New York, NY 10005</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p>Urgent matter? Call — same-day callbacks for time-critical cases.</p>
<!-- /wp:paragraph --><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>conference.jpg" alt="Consultation room" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":2,"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size">Send your matter</h2>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Two minutes. We reply within one business day.</p>
<!-- /wp:paragraph --><?php if ( shortcode_exists( 'fluentform' ) ) : ?>
<!-- wp:shortcode -->
[fluentform id="1"]
<!-- /wp:shortcode -->
<?php endif; ?></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
