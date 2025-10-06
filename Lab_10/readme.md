
# Lab Task 10 – Web Design and Development (WDD)

This folder contains **Lab 10**, where the assignment was to convert an existing static site into a set of reusable PHP templates. The original site design and assets were provided; the task focused on breaking the site into modular PHP includes (header, footer, navigation and shared components) and wiring the pages to use those templates.

---

## 📝 Task Overview

Rather than building new pages from scratch, this lab's goal was to create server-side templates so the provided site could be managed more efficiently. The deliverable is a working set of PHP pages that include common elements from a central `Includes/` directory, reducing duplication and simplifying updates.

### Key Concepts Covered:

- Converting duplicated HTML into reusable PHP includes (header, footer, navigation)
- Organizing shared assets and paths so pages can include common templates
- Retaining the original site markup and styling while using PHP for composition
- Basic PHP include/require usage and file organization for templating

---

## 🔗 Live Preview

To preview the pages, run a local PHP server from the `Lab_10` folder and open the desired `.php` file in a browser (for example, `index.php`). The assets and includes are set up so each page renders the original site layout while pulling shared blocks from `Includes/`.

---

## 🛠️ Technologies Used

- **PHP** — Server-side includes and simple templating (header/footer/includes)
- **HTML5** — Existing page markup preserved
- **CSS3** — Styles in `style.css` (original project CSS)
- **JavaScript** — Page behavior in `script.js` (kept from the original site)
- **Static assets** — Images and media under `assets/`

---

## 📁 Folder Structure

```
Lab_10/
├── index.php
├── book_a_free_consultation.php
├── Carreer_at_cliffside.php
├── cliffside_blogs.php
├── cybersecurity-in-retail-business.php
├── cybersecurity-services.php
├── our_Success_stories.php
├── OurWork.php
├── script.js
├── style.css
├── Includes/           # Reusable PHP templates (header, footer, nav, common components)
└── assets/             # Images and media used by the site
```

---

## ✅ Task Requirements

- Convert the provided site's repeated HTML into reusable PHP templates (use `include`/`require`)
- Keep page structure and styling identical to the original design
- Place shared templates inside the `Includes/` directory and reference them from each PHP page
- Ensure asset paths work correctly from all pages

---

## ✨ Outcome

The outcome is a set of PHP-based templates that compose the original site's pages using shared includes. This structure makes content maintenance easier: updates to navigation, header, or footer only need to be made in one place (`Includes/`) and will apply across all pages.
