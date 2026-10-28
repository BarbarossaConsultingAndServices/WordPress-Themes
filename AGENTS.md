# WordPress-Themes — agent instructions

Read `docs/handover/claude-handover-2026-10.md` before changing anything. This
is a **public** repository of 13 GPL WordPress block themes.

## Non-negotiables

- **GPL-2.0-or-later.** Every theme and bundled asset must stay compatible.
- **No build step.** Themes are plain PHP/HTML/CSS/JSON; no npm, bundler or
  compiled assets.
- **Never overwrite existing content on activation.** `inc/setup-content.php`
  creates only missing slugs; preserve that rule.
- Validate every `theme.json` and `styles/*.json` before committing; a malformed
  file breaks both the editor and the release workflow.
- **Public repo:** no secrets, no client data, no licence-restricted images.
  Pexels photos must be credited as required.
- The owner is non-technical: installation is the no-code ZIP flow; never ask
  them to edit PHP.

## Workflow

1. Branch from `main` (`feat/…`, `fix/…`, `docs/…`).
2. Validate JSON; install/test the ZIP on a current WordPress if the change is
   visual or behavioural.
3. Commit as `BarbarossaConsultingAndServices <noreply@github.com>` (the repo
   has no local email; set it per command or in `.git/config`).
4. Push and give the owner a GitHub PR link; the owner merges in the browser.
5. Release by pushing a `v*` tag; the workflow builds and attaches all 13 ZIPs.

## Useful context

- No-code install guide: `docs/setup-no-code.md`.
- Palettes: `docs/palettes.md` (stale for themes after the first three; the
  per-theme `styles/*.json` are authoritative).
- Release workflow: `.github/workflows/zip-themes.yml`.
- Cross-project handover: `../plans/HANDOVER-2026-10.md`.
