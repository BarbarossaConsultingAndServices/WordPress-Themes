# WordPress-Themes

Modern, fast, 100% Gutenberg-editable WordPress block themes (Full Site Editing) by [Barbarossa Consulting and Services](https://github.com/BarbarossaConsultingAndServices).

Anyone can use these themes for free under GPL-2.0-or-later.

## Themes

| Theme | For | Folder | Default style |
|-------|-----|--------|---------------|
| **Nova Business** | Business / Corporate / Agency / Startup | `themes/nova-business` | White + Indigo, Inter |
| **Educalite** | School / Courses / University / Coaching | `themes/educalite` | White + Emerald + Amber |
| **Newsline** | News / Magazine / Blog | `themes/newsline` | Paper + Red + Black |

Each theme is a **complete multi-page website**:
- 8–10 pre-designed full-page patterns (Home, About, Services/Courses/Sections, Pricing, Team/Instructors, Blog, Contact, FAQ, 404)
- Templates for every URL type: front page, blog home, single post, page, archive, search, 404
- Header / footer / comments template parts
- 6 color palettes via Style Variations (Appearance → Editor → Styles → Browse styles)
- No page builder, no jQuery, no build step — just `theme.json` + vanilla CSS

## Install (no coding, 2 minutes)

1. Go to **Releases** on this repo → download `nova-business.zip` (or `educalite.zip`, `newsline.zip`).
2. In WordPress: Appearance → Themes → Add New → Upload Theme → choose the ZIP → Activate.
3. Go to Appearance → Editor to edit everything visually.
4. To switch colors: Editor → Styles → Browse styles → pick e.g. Dark Mode / Navy / Minimal.
5. To build pages: Pages → Add New → + → Patterns → choose e.g. "Business Home" / "Contact" → Publish.
6. Optional demo content: see `themes/<name>/inc/demo-content/setup.md`.

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
