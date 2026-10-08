# Agency WordPress Theme Scaffold

[![License: GPL v2+](https://img.shields.io/badge/License-GPL%20v2%2B-blue.svg)](http://www.gnu.org/licenses/gpl-2.0.html)
[![PHP: 7.4+](https://img.shields.io/badge/PHP-7.4%2B-777BB4.svg?logo=php)](https://www.php.net)
[![Build: Gulp 5](https://img.shields.io/badge/Build-Gulp%205-cf4647.svg?logo=gulp)](https://gulpjs.com)
[![CSS: SASS / BEM](https://img.shields.io/badge/CSS-BEM%20%2F%20SCSS-cc6699.svg?logo=sass)](https://sass-lang.com)

A high-performance custom WordPress theme scaffold engineered specifically for agency workflows, converting **Figma / Adobe XD design mockups into pixel-perfect code**.

---

## 🎯 Architecture Principles

1. **Zero jQuery Reliance**: 100% vanilla JavaScript (ES6+), modern `fetch()` API with `AbortController` request cancellation and DOM APIs.
2. **Strict BEM Naming Conventions**: Clean, isolated SCSS namespaces (`.c-card__title`, `.l-grid--3-col`, `.u-visually-hidden`) preventing stylesheet naming collisions.
3. **Automated Gulp Asset Pipeline**: Dart SASS compilation, PostCSS Autoprefixer, clean-css minification, sourcemaps, and terser JS optimization.
4. **WordPress Best Practices**:
   - Secure AJAX handlers using `check_ajax_referer` and nonce validation.
   - PSR-4 autoloading via Composer for backend service classes.
   - Native template part modularity (`template-parts/components/`).
   - Strict input sanitization (`sanitize_text_field`) and output escaping (`esc_html`, `esc_url`).

---

## 📁 Repository Structure

```
wp-agency-theme-scaffold/
├── assets/                  # Compiled production CSS & JS bundles
├── includes/                # OOP PHP backend classes (PSR-4)
│   ├── class-theme-setup.php
│   └── class-ajax-filter.php
├── page-templates/          # Custom Page Templates (e.g. Landing Page)
├── src/
│   ├── js/                  # Source ES6 vanilla JS modules
│   │   └── main.js
│   └── scss/                # SASS modular hierarchy (BEM)
│       ├── base/
│       ├── components/
│       ├── layout/
│       └── utilities/
├── template-parts/          # Reusable component templates
│   └── components/
├── functions.php            # Theme bootstrap & lifecycle coordinator
├── style.css                # WordPress theme header declaration
├── gulpfile.js              # Gulp task runner config
├── package.json             # NPM dependencies & build scripts
└── composer.json            # Composer PSR-4 config
```

---

## 🚀 Quick Start

### 1. Install Dependencies
```bash
npm install
composer install
```

### 2. Run Build Pipeline
```bash
npm run dev     # Watches SCSS & JS with live rebuild
npm run build   # Produces minified production assets
```

---

## 🔒 Security & Performance
- All dynamic database queries run through `WP_Query` with bound sanitization.
- REST and AJAX endpoints enforce nonce verification.
- Images use modern responsive `sizes` attributes with `loading="lazy"`.

---

## 📄 License
GPLv2 or later © [Nadim Tuhin](https://github.com/nadimtuhin)
