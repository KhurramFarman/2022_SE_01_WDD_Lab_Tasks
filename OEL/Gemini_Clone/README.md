# Gemini Clone (React + Vite)

This folder contains a cloned frontend of the Gemini UI implemented with React and Vite. The project is a lightweight clone for learning and experimenting with the Gemini-style interface, using Vite for fast dev server and HMR, and React for component composition.

---

## 🔗 Live Preview

You can view the lab task live using the link below (powered by RawGitHack):

👉 [**View OEL**](https://gemini-clone-mauve-psi.vercel.app)

---

## Project overview

Key points:

- Built with React (JSX) and Vite for development and bundling.
- Simple component structure under `src/components/` (Sidebar, Main, etc.).
- Assets are stored under `src/assets/` and `public/` for static files.
- Basic ESLint setup and a small set of dev scripts are included.

---

## Getting started

Prerequisites:

- Node.js (v18+ recommended)
- npm or yarn

Installation:

```bash
# from the Gemini_Clone folder
npm install
```

Development server (with HMR):

```bash
npm run dev
```

Build for production:

```bash
npm run build
```

Preview production build locally:

```bash
npm run preview
```

Linting:

```bash
npm run lint
```

---

## Project structure

```
Gemini_Clone/
├── index.html
├── package.json
├── public/             # static files served at root
├── src/
│   ├── main.jsx
│   ├── App.jsx
│   ├── index.css
│   ├── App.css
│   ├── assets/         # images and small helpers
│   └── components/     # React components (Main, Sidebar, ...)
└── README.md
```

---

## Notes

- This is a learning/clone project — it does not include Google's private APIs or any hidden keys. If you plan to integrate real generative AI services, add credentials using an environment file (the repo already includes a `.env` placeholder) and follow the provider's SDK docs.
- The project uses modern React and Vite defaults; adapt the `package.json` scripts if you prefer yarn or pnpm.

If you'd like, I can:

- Add a short troubleshooting section for common errors (Node version, port already in use)
- Wire a tiny README script to run the dev server from PowerShell if you want exact commands for Windows
