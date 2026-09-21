---
name: hontech
description: Hontech Auto Center website work (UI features, ads/announcements, Supabase/Vercel, design). Prototype phase; keep output small.
---

# Hontech (prototype phase: be lean)

Token rules:
- Do the smallest change that works. No unrequested refactors, docs, tests, or summaries.
- Never search or read `node_modules/`, `.git/`, `images/`, `*.min.*`, or lockfiles. Use Grep with a path/glob, and Read with offset/limit on big files (`style.css`, `index.html`).
- Ignore `index.html` (stale) and `hontech-auto-center_prototype/` unless asked.
- Replies: short. Show changed files, not full contents.
- Do not spawn subagents unless asked.

Load a reference ONLY when the task needs it:
- UI feature acceptance criteria: docs/reference/ui-features.md
- Design tokens/Mimo patterns: docs/reference/design-system.md
- Ads/announcements domain: docs/reference/advertising-system.md
- Supabase/auth/Vercel/security: docs/reference/backend-deploy.md
- Teaching mode (user is learning): docs/reference/learning-path.md
- Roadmap/phase status: docs/IMPLEMENTATION_PLAN.md (read the relevant section only)

Standing facts: Vercel can't run PHP (stack decision pending, plan Phase 0). Build one feature per change; match existing style; use CSS variables from `:root` in style.css.
