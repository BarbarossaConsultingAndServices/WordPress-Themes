<?php
/**
 * Title: Business About
 * Slug: nova-business/about
 * Categories: nova-pages, nova-business
 * Keywords: about, team, mission
 */
$uri = esc_url( get_stylesheet_directory_uri() ) . '/assets/images/';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><strong>ABOUT US</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">A small senior team, obsessed with your results</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Since 2016 we help small and mid-sized companies look enterprise-grade online — without enterprise budgets or agency drama.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image alignwide size-large has-custom-border"><img src="<?php echo $uri; ?>about-office.jpg" alt="The Nova Business team at work in the studio" style="border-radius:16px"/></figure>
<!-- /wp:image -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Our story</h2>
<!-- /wp:heading --><!-- wp:paragraph -->
<p>We started as three freelancers sharing one office in Berlin. Ten years and 200+ launches later we are twelve designers, developers and copywriters — still senior-only, still no outsourcing, still one contact person per project.</p>
<!-- /wp:paragraph --><!-- wp:paragraph -->
<p>What never changed: you own 100% of your website. No lock-in, no monthly ransom for your own content, no black-box page builder. Just clean WordPress blocks your staff can edit.</p>
<!-- /wp:paragraph --><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">How we work</h2>
<!-- /wp:heading --><!-- wp:list -->
<ul><!-- wp:list-item -->
<li><strong>Week 1:</strong> workshop, positioning, sitemap and copy draft.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Week 2–3:</strong> design and build directly in Gutenberg — you review a staging link, not PDFs.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Week 4:</strong> SEO, speed tuning, handover training, launch.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"backgroundColor":"primary-soft","style":{"border":{"radius":"16px"},"spacing":{"padding":{"top":"1.5rem","left":"1.5rem","right":"1.5rem","bottom":"1.5rem"}}}} -->
<div class="wp-block-group has-primary-soft-background-color has-background" style="border-radius:16px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Our values</h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p><strong>Clarity</strong> over jargon — you always know what happens next and what it costs.<br><strong>Speed</strong> over bloat — every site loads in under a second.<br><strong>Ownership</strong> — your domain, your content, your theme. Period.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo $uri; ?>about-building.jpg" alt="Modern office buildings at dusk" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Meet the team</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo $uri; ?>team-anna.jpg" alt="Portrait of Anna Berger" style="border-radius:16px;aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Anna Berger — Strategy</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">10 years helping SMEs find their message. Runs your kickoff workshop.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo $uri; ?>team-jonas.jpg" alt="Portrait of Jonas Weber" style="border-radius:16px;aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Jonas Weber — Design</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Gutenberg-first designer. Makes complex offers look simple.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo $uri; ?>team-maria.jpg" alt="Portrait of Maria Rossi" style="border-radius:16px;aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">Maria Rossi — Development</h3>
<!-- /wp:heading --><!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Block themes, performance budgets, accessibility. Keeps us honest.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact/">Work with us →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
