# WordPress-Themes

Modern, fast, 100% Gutenberg-editable WordPress block themes (Full Site Editing) by [Barbarossa Consulting and Services](https://github.com/BarbarossaConsultingAndServices).

Anyone can use these themes for free under GPL-2.0-or-later.

## Themes

| Theme | For | Folder | Default style |
|-------|-----|--------|---------------|
| **Nova Business** | Business / Corporate / Agency / Startup | `themes/nova-business` | White + Indigo, Inter |
| **Educalite** | School / Courses / University / Coaching | `themes/educalite` | White + Emerald + Amber |
| **Newsline** | News / Magazine / Blog | `themes/newsline` | Paper + Red + Black |
| **Ember Oak** | Restaurant / Café / Bar | `themes/ember-oak` | Cream + Ember, Fraunces |

Each theme ships as a **complete website out of the box** — activating it builds everything automatically:
- Finished pages with real copy + bundled photos (e.g. Business: Home, About, Services, Pricing, FAQ, Contact, Privacy, Imprint)
- Finished blog posts with featured images (Business/Education: 3 each, Newsline: 7 across City/Business/Culture sections)
- Navigation menu, homepage + blog page settings, media library photos
- 8–12 pre-designed full-page patterns for rebuilding any page
- Templates for every URL type: front page, blog home, single post, page, archive, search, 404
- Header / footer / comments template parts
- 6 color palettes via Style Variations (Appearance → Editor → Styles → Browse styles)
- No page builder, no jQuery, no build step — just `theme.json` + vanilla CSS

How it works: on activation (`after_switch_theme`), `inc/setup-content.php` creates any missing pages/posts/menus by slug — existing content is never overwritten, and untouched WordPress defaults (Sample Page, Hello World) are trashed. Photos live in `assets/images/` (Pexels, free to use) and are imported into the media library once.

## Install (no coding, 2 minutes)

1. Go to **Releases** on this repo → download `nova-business.zip` (or `educalite.zip`, `newsline.zip`).
2. In WordPress: Appearance → Themes → Add New → Upload Theme → choose the ZIP → Activate.
3. The full demo site (pages, posts, menu, homepage) is created automatically on activation.
4. Go to Appearance → Editor to edit everything visually.
5. To switch colors: Editor → Styles → Browse styles → pick e.g. Dark Mode / Navy / Minimal.
6. Contact/newsletter patterns need one free plugin (FluentForms or Contact Form 7 / MailPoet) — paste the shortcode where indicated.

Requires WordPress 6.6+ and PHP 7.4+.

## Repo layout

```
themes/
  nova-business/   # complete theme
  educalite/
  newsline/
docs/
  setup-no-code.md # full no-code guide
  palettes.md      # all 18 palettes preview
.github/workflows/
  zip-themes.yml   # auto-builds installable ZIPs
```

## For developers / AI contributors

Each theme has identical skeleton: `style.css`, `theme.json`, `styles/*.json`, `functions.php`, `templates/*.html`, `parts/*.html`, `patterns/*.php`. No npm. Validate `theme.json` with `python3 -m json.tool`.

License: GPL-2.0-or-later. See LICENSE.
