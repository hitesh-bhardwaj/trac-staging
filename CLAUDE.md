# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

```bash
# Development (Vite dev server with HMR)
npm run dev

# Production build
npm run build

# Watch mode for builds
npm run watch
```

For local development, create a `.vite-dev` file in theme root to enable Vite dev server mode in WordPress.

## Architecture Overview

### Build System
- **Vite** for bundling JS/CSS with ES modules
- **Tailwind CSS** with desktop-first breakpoints (max-width queries)
- Entry points: `src/js/main.js` and `src/css/main.css`
- Output: `dist/` folder with hashed filenames and manifest

### Technology Stack
- **GSAP** + ScrollTrigger for scroll-based animations
- **Three.js** + three-globe for 3D globe visualization
- **Lenis** smooth scroll (loaded via mu-plugin at `mu-plugins/lenis-smooth-scroll.php`)
- **ACF Pro** for flexible content management

### Key Integration: Lenis + GSAP
The theme syncs Lenis smooth scroll with GSAP ScrollTrigger in `main.js`:
```javascript
lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => lenis.raf(time * 1000));
gsap.ticker.lagSmoothing(0);
```
Lenis is initialized by the mu-plugin and exposed as `window.lenis`. The theme listens for `lenis:ready` event if not immediately available.

### File Structure
```
src/
├── js/
│   ├── main.js         # Entry point, initializes all modules
│   ├── animations.js   # GSAP ScrollTrigger animations
│   └── globe.js        # Three.js globe component (Aceternity style)
├── css/
│   └── main.css        # Tailwind + CSS custom properties
└── data/
    └── globe.json      # GeoJSON country data for globe
```

### WordPress Integration
- `functions.php` handles Vite manifest parsing for production builds
- ACF Flexible Content renders page sections via `trac_render_sections()`
- Section templates live in `template-parts/sections/`

## Design System

### Typography (vw-based, 1920px reference)
CSS custom properties in `main.css` define fluid typography:
- `--text-hero`: 5vw (96px at 1920px)
- `--text-h2`: 2.604vw (50px at 1920px)
- `--text-body`: 1.146vw (22px at 1920px)

### Brand Colors
```
Primary:   #10417f (blue)
Secondary: #E85D24 (orange accent)
```
Defined in both `tailwind.config.js` (utilities) and `main.css` (CSS variables).

### Tailwind Breakpoints (Desktop-First)
```javascript
screens: {
  'lg': { max: '1024px' },  // Tablet landscape
  'md': { max: '768px' },   // Tablet portrait
  'sm': { max: '540px' },   // Mobile
}
```
Use `md:` prefix to target smaller screens (e.g., `md:text-xl` applies below 768px).

## Globe Component (`globe.js`)

Interactive 3D globe using three-globe library:
- Uses `hexPolygonUseDots(true)` for dotted land texture
- African cities marked with orange (`#E85D24`)
- Global cities marked with brand blue (`#10417f`)
- Arc connections with cyan/indigo colors
- Configuration constants: `GLOBE_CONFIG`, `ARC_DATA`, `POINTS_DATA`

## Animation System (`animations.js`)

Data attributes for declarative animations:
- `data-animate="fade-up|fade-left|scale-up"` - Auto-triggers on scroll
- `data-delay="0.2"` - Animation delay in seconds
- `data-parallax` - Enables parallax effect
- `.stagger-children` - Staggers child element animations

Custom event `trac:loaded` fires after page load for hero animations.
