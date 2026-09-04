# Setup without coding (5 minutes)

You need: WordPress 6.6+, admin access. No FTP/terminal required if you install via ZIP.

## 1. Install a theme
1. GitHub repo → Releases → download e.g. `nova-business.zip`.
2. WP Admin → Appearance → Themes → Add New → Upload Theme → choose ZIP → Install → Activate.

## 2. The full website builds itself
On activation the theme automatically creates all pages (with finished copy + photos), blog posts, the navigation menu and homepage settings. Nothing to import, nothing to configure. Existing content is never overwritten.

## 3. Change colors / fonts (no code)
Appearance → Editor → Styles → Browse styles → click a variation → Save.
Each theme ships 6 palettes. You can further tweak colors/typography in the same panel.

## 4. Contact form
Core Gutenberg has no form. Recommended free plugin: FluentForms or Contact Form 7.
Our Contact pattern has a placeholder block where you paste the form shortcode.

## 5. Rebuilding / extra pages (optional)
Every design also exists as a Pattern: Pages → Add New → `+` → Patterns tab → e.g. "Business Home". A manual demo import (`themes/<name>/inc/demo-content/demo.wxr` via Tools → Import) remains available as fallback.
