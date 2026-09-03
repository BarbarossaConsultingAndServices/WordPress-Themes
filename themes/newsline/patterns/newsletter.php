<?php
/**
 * Title: Newsletter Signup
 * Slug: newsline/newsletter
 * Categories: news-pages, news-sections, newsline
 * Keywords: newsletter, subscribe
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"primary-soft","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-soft-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Get the briefing. 5 minutes, every morning.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Free · No spam · Unsubscribe anytime. Paste your newsletter shortcode below (Mailchimp, Brevo, ConvertKit all work).</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode {"align":"center"} -->
[newsletter_form]
<!-- /wp:shortcode -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">Or email tips@newsline.example</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
