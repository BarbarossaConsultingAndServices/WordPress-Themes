<?php
/**
 * Title: Restaurant Home
 * Slug: ember-oak/home
 * Categories: ember-pages, ember-oak
 * Keywords: home, hero, restaurant
 * Block Types: core/post-content
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:cover {"url":"<?php echo $uri; ?>hero-dining.jpg","dimRatio":40,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":78,"minHeightUnit":"vh","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:78vh"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Candle-lit dining room at Ember and Oak" src="<?php echo $uri; ?>hero-dining.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"small"} -->
<p class="has-text-align-center has-base-color has-text-color has-small-font-size"><strong>🔥 WOOD-FIRED KITCHEN · BERLIN</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base"} -->
<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color">Fire-kissed food, served with love</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"large"} -->
<p class="has-text-align-center has-base-color has-text-color has-large-font-size">Seasonal dishes from oak fire &amp; local farms. Dinner Tue–Sun from 12:00.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/reservations/">Reserve a table</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"base"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" href="/menu/">See the menu</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","backgroundColor":"contrast","textColor":"base","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-base-color has-background" style="padding-top:1rem;padding-bottom:1rem"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">⭐ 4.8 · 2,300+ reviews</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">🕯️ Tue–Sun · Kitchen till 21:30</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size">🌱 90% regional · Daily vegetarian</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><strong>SIGNATURE DISHES</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">What guests cross town for</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"},"shadow":"var:preset|shadow|card"}} -->
<figure class="wp-block-image size-large has-custom-border" style="box-shadow:var(--wp--preset--shadow--card)"><img src="<?php echo $uri; ?>dish-salmon.jpg" alt="Ember-roasted salmon" style="border-radius:16px;aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Ember salmon · €26</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Oak-fired, miso glaze, charred lemon. Our most photographed plate.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"},"shadow":"var:preset|shadow|card"}} -->
<figure class="wp-block-image size-large has-custom-border" style="box-shadow:var(--wp--preset--shadow--card)"><img src="<?php echo $uri; ?>dish-ramen.jpg" alt="Midnight ramen bowl" style="border-radius:16px;aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Midnight ramen · €18</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>18-hour broth, smoked egg, chili oil. Only 20 bowls a night.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","style":{"border":{"radius":"16px"},"shadow":"var:preset|shadow|card"}} -->
<figure class="wp-block-image size-large has-custom-border" style="box-shadow:var(--wp--preset--shadow--card)"><img src="<?php echo $uri; ?>dish-cake.jpg" alt="Burnt honey cake" style="border-radius:16px;aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Burnt honey cake · €9</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>Twelve layers, oak-smoked ice cream. Save room — trust us.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/menu/">Full menu with prices →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"primary-soft","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-soft-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"},"shadow":"var:preset|shadow|lift"}} -->
<figure class="wp-block-image size-large has-custom-border" style="border-radius:16px;box-shadow:var(--wp--preset--shadow--lift)"><img src="<?php echo $uri; ?>about-fire.jpg" alt="Chef grilling over open oak fire" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>OUR STORY</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">One oven, no gas, endless flavor</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Everything we serve touches oak fire or it doesn’t make the menu. Chef Marco Rossi built Ember &amp; Oak around a single wood oven — and a farm network within 100 km.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/about/">Meet the team →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Guests say it best</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:paragraph -->
<p>★★★★★<br>“The duck alone is worth the trip. Cozy room, honest prices, the kind of place you tell friends about.”</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Lena K.</strong> — regular since 2022</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:paragraph -->
<p>★★★★★<br>“Booked for 12 people, including two vegans and a celiac. Everyone ate like kings. Flawless service.”</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Tomas R.</strong> — birthday dinner</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"surface","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:paragraph -->
<p>★★★★★<br>“Ramen night is my religion now. Twenty bowls only — get there early.”</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Ayşe D.</strong> — ramen night devotee</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"contrast","textColor":"base","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-base-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","level":2,"textColor":"base"} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color">Hungry? Tonight still has tables.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Reserve in 30 seconds — or just walk in, the bar seats are always first-come.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/reservations/">Reserve a table →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
