# Team Setup — Local Dev Environment

Everyone needs the same three things running: **WordPress + DB** (via Local), **the theme code** (via git), and **the Vite dev server** (for live CSS/JS). Do these once, then it's a two-command morning routine.

---

## 1. One-time environment setup

### Install
- [Local by Flywheel](https://localwp.com/) (free)
- Node.js 18+ (this repo was built on Node 24 — anything 18+ works)
- Git, with access to `https://github.com/hitesh-bhardwaj/trac-staging`

### Get WordPress + the database running
Don't build WordPress from scratch — import the whole site in one shot:

1. Hitesh exports the site from the Local app: right-click **trac-staging** → **Export site** → produces a `.zip` (DB + uploads + WP config, all in one). Shared via [wherever you're distributing it — Drive/Dropbox, not git].
2. In your own Local app: **+ Add Site** → **Import** → pick the `.zip`. Local recreates the exact same PHP/MySQL versions and imports the DB and uploads automatically.
3. Confirm it loads at `http://trac-staging.local` (or whatever domain Local assigns you) with content and images showing.

This gets you WordPress core, plugins, DB content, and media. The **theme code inside it is a snapshot from export time — replace it with git next**, don't trust it as current.

### Get the current theme code
```bash
cd "path/to/your/Local Sites/trac-staging/app/public/wp-content/themes"
rm -rf trac-staging          # remove the snapshot that came in the zip
git clone https://github.com/hitesh-bhardwaj/trac-staging.git
cd trac-staging
npm install
```

### Enable live dev mode (one-time, per machine)
```bash
touch .vite-dev
```
This file is gitignored on purpose — it's a per-machine switch, not something to commit. Without it, WordPress falls back to loading whatever's in `dist/` (last production build), not live Vite.

---

## 2. Every morning

```bash
cd wp-content/themes/trac-staging
git pull
npm run dev
```
Leave that terminal running. Open `http://trac-staging.local` in the browser.

- **Edit a `.php` template** → save → refresh the browser. (WordPress reads PHP directly; nothing to build.)
- **Edit Tailwind classes / `src/css/main.css` / `src/js/*.js`** → save → updates in the browser automatically, no refresh needed.

If you ever see an unstyled, plain-HTML page (black-and-white, no fonts) — it means `npm run dev` isn't running or crashed. Restart it; that's the only thing that screen means.

---

## 3. Before you push / hand off / switch branches

```bash
npm run build
```
This compiles the real production bundle into `dist/`. Run it and make sure it **exits without errors** before you commit and push — it catches broken imports/syntax that dev mode's HMR can silently tolerate. `dist/` itself is gitignored, so this isn't something you commit; it's a local sanity check.

Then:
```bash
git add .
git commit -m "..."
git pull --rebase
git push
```

If you're about to `git checkout` a different branch, run `npm run build` first only if you want your local browser preview to reflect the branch you're leaving — dev mode via Vite doesn't care, it always serves live source.

---

## Gotchas specific to this repo

- **DB conflicts**: there's no git for the database. Only one person edits DB *content* (pages, ACF field values, CPT entries — FAQs/testimonials/jobs) at a time. Layout/code work is unaffected — that's all git.
- **ACF field group changes ARE in git.** They live as JSON in `acf-json/` and sync automatically both ways — you don't need to re-create fields per machine, `git pull` handles it.
- **`dist/` is gitignored.** Fine for local dev (Vite serves live), but means whoever deploys to staging/production needs to run `npm run build` there too — it won't magically appear from a `git pull`.
