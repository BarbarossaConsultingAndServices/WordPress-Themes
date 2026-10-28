# WordPress-Themes — handover dossier (Claude Code → OpenCode, October 2026)

> Generated 2026-10-28 by OpenCode from this repository and the Claude Code
> archive. This repository is **public**; the Claude session history is the
> main `~/.claude/projects/-home-juli-git/` lineage.

## 1. What this project is

A public collection of **13 modern WordPress block themes** (Full Site Editing)
by Barbarossa Consulting and Services, released free under
**GPL-2.0-or-later**. Each theme installs as a ZIP and builds a complete demo
site on activation: pages with real copy and bundled photos, blog posts,
navigation, homepage/blog settings, patterns and templates.

The repository is also the release pipeline: a version tag makes GitHub Actions
validate every `theme.json`, build 13 ZIPs and attach them to a GitHub Release.

## 2. The themes

| Theme | For |
|---|---|
| Nova Business | Business / corporate / agency / startup |
| Educalite | School / courses / university / coaching |
| Newsline | News / magazine / blog |
| Ember Oak | Restaurant / café / bar |
| Juniper House | Boutique hotel / B&B |
| Forge Studio | Fitness studio / gym |
| Wag Stay | Pet boarding & daycare |
| Haven Estates | Real estate agency |
| Vitalia Clinic | Medical clinic |
| Evermore Weddings | Wedding planner & venue |
| Kindred Foundation | Charity & nonprofit |
| Sterling Cole | Law firm |
| Atlas Travel | Travel agency |

Each ships with **6 colour palettes** (Style Variations), 8–12 full-page
patterns, templates for every URL type, header/footer/comments parts, and
vanilla CSS — no page builder, no jQuery, no build step.

## 3. Architecture snapshot (verified)

- `themes/<slug>/` — one complete theme: `style.css`, `theme.json`,
  `styles/*.json`, `functions.php`, `templates/*.html`, `parts/*.html`,
  `patterns/*.php`, `inc/`.
- On activation (`after_switch_theme`), `inc/setup-content.php` creates any
  missing pages/posts/menus **by slug**; existing content is never overwritten,
  and untouched WordPress defaults (Sample Page, Hello World) are trashed.
  Photos in `assets/images/` (Pexels, free to use) are imported once.
- `docs/setup-no-code.md` — the owner's 5-minute install guide.
- `docs/palettes.md` — all 18 palettes for the first three themes (the file is
  older than the 13-theme set; the per-theme `styles/*.json` are authoritative).
- `.github/workflows/zip-themes.yml` — on a `v*` tag or manual dispatch:
  validate every `theme.json` and `styles/*.json`, zip all 13 themes into
  `dist/`, upload the artifact, create a GitHub Release with the ZIPs.
- No npm, no bundler. Requires WordPress 6.6+ and PHP 7.4+.

## 4. Current state

- Public repo: `BarbarossaConsultingAndServices/WordPress-Themes`.
- **24 commits**, 3 Sep → 17 Sep 2026; latest release **v1.11.0**
  (17 Sep 2026) with all 13 ZIPs attached.
- Clean working tree. 706 tracked files; the repo is large (~74 MB `.git`)
  because every theme carries its own bundled images.
- All 13 `theme.json` files and their style variations validate.
- The release workflow was updated on 17 Sep to use the `gh` CLI instead of the
  deprecated release action (Node 24 runners).

## 5. Open issues / next actions

1. **No active development since 17 September 2026.** That is not a bug; the
   set is complete. New themes are additive.
2. **`docs/palettes.md` is stale** — it documents only the first three themes.
   Either extend it or point readers to the per-theme `styles/*.json`.
3. **WordPress compatibility** — re-test the themes on the current WordPress
   release before claiming compatibility in the README; the last full test was
   September 2026.
4. **Screenshots** — the README has no per-theme screenshots; the demo sites
   are the reference. Adding them would improve the public repo.
5. **Commit identity** — the local repo has no `user.email`; commits use
   `BarbarossaConsultingAndServices <noreply@github.com>`. Keep that convention
   (or set it explicitly per command) so the public history stays consistent.

## 6. How to work on a theme

```bash
# validate a theme.json and its style variations
python3 -m json.tool themes/<slug>/theme.json > /dev/null
for f in themes/<slug>/styles/*.json; do python3 -m json.tool "$f" > /dev/null; done
```

Install/test without coding: download the ZIP from the latest GitHub Release →
WordPress → Appearance → Themes → Add New → Upload Theme → Activate. The demo
site builds itself. Edit visually in Appearance → Editor.

**Release:** commit the change, create and push a tag (`v1.12.0`), and the
workflow builds/attaches all 13 ZIPs. Do not hand-zip and upload unless the
workflow is broken.

**Commit identity:** `BarbarossaConsultingAndServices <noreply@github.com>`.
The repo has no local email, so use
`git -c user.email=noreply@github.com -c user.name=BarbarossaConsultingAndServices commit …`
or set the repo config once.

## 7. Hard constraints

- **GPL-2.0-or-later.** Every theme and bundled code must stay compatible with
  that licence. Do not add non-GPL assets.
- **No build step.** Themes must work as plain PHP/HTML/CSS/JSON; no npm,
  bundler or compiled assets.
- **Never overwrite existing content on activation.** The setup code only
  creates missing slugs; preserve that rule.
- **Validate `theme.json`** before every commit; a malformed file breaks the
  release workflow and the WordPress editor.
- **Public repo:** no secrets, no client data, no licence-restricted images.
  Pexels photos are credited in each theme's readme/credits as required.
- The owner is non-technical: the install path is the no-code ZIP flow; never
  ask them to edit PHP.

## 8. Confidence

High for the theme set, release process and repository state. WordPress
compatibility and live demo behaviour can only be confirmed by installing the
current ZIPs on a current WordPress site.
