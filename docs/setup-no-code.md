# Setup without coding (5 minutes)

You need: WordPress 6.6+, admin access. No FTP/terminal required if you install via ZIP.

## 1. Install a theme
1. GitHub repo → Releases → download e.g. `nova-business.zip`.
2. WP Admin → Appearance → Themes → Add New → Upload Theme → choose ZIP → Install → Activate.

## 2. Make it a full website
1. Pages → Add New → click `+` → Patterns tab → select theme patterns:
   - Business: Home, About, Services, Pricing, Contact…
   - Education: Home, Courses, Instructors, Events…
   - News: Front Page Grid, About, Contact…
2. Publish each page.
3. Appearance → Editor → Navigation → set menu: Home / About / Services / Blog / Contact.
4. Settings → Reading → Homepage: select your Home page, Posts page: Blog.

## 3. Change colors / fonts (no code)
Appearance → Editor → Styles → Browse styles → click a variation → Save.
Each theme ships 6 palettes. You can further tweak colors/typography in the same panel.

## 4. Contact form
Core Gutenberg has no form. Recommended free plugin: FluentForms or Contact Form 7.
Our Contact pattern has a placeholder block where you paste the form shortcode.

## 5. Demo content (optional)
Each theme has `themes/<name>/inc/demo-content/setup.md` + `demo.wxr`.
Tools → Import → WordPress → upload `demo.wxr` → assign author → check “Download attachments”.
