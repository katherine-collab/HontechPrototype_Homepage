# Hontech Advertising System: Implementation Plan

Design reference: https://mimo.org/courses/full-stack-development
Skills: `.claude/skills/hontech-*` (design-system, ui-features, advertising-system, backend-deploy, learning-path)

## 1. Current state (observed)

| Area | Finding | Risk |
|---|---|---|
| Stack | Vanilla PHP + MySQL (XAMPP), plus a React/Vite/Tailwind prototype folder | **Vercel cannot run PHP**; two competing codebases |
| `index.html` (66KB) | Stale duplicate of `index.php` + includes | Drift, confusion |
| `admin.php`, `api/*.php` | No auth/session code found | **Anyone can view/modify bookings** |
| `api/book_appointment.php` | `Access-Control-Allow-Origin: *` | Cross-site abuse |
| `config.php` | root/no password, auto-creates DB, JSON fallback | Dev-only; not production safe |
| `style.css` | 2,856 lines, single file | Hard to maintain; dark mode/print hard to add |
| `data/*.json` | Customer data stored as files | Privacy (DPA 2012), must not be committed |
| Tests / CI / docs | None | No safety net for "enterprise" growth |

## 2. What is missing (my perspective)

Beyond your list:
1. **Admin CMS + roles** (admin/editor/viewer) for announcements. This is the core of an ad system.
2. **Authentication + RLS** before any admin feature.
3. **Content workflow**: draft, schedule, publish, expire, archive, plus audit log and soft delete.
4. **Analytics**: impressions, clicks, conversions per campaign (UTM is only half of this).
5. **SEO**: metadata, Open Graph, sitemap, robots, JSON-LD (LocalBusiness, FAQPage), canonical URLs.
6. **Accessibility** as a standard (WCAG AA), not per feature.
7. **Image pipeline**: resize/WebP, alt text required, lazy loading (Vercel image optimization).
8. **Privacy/legal**: privacy policy, terms, Data Privacy Act consent, cookie categories.
9. **Email**: transactional booking confirmations; newsletter provider (Resend/Brevo).
10. **Error monitoring + uptime**: Sentry, Vercel Analytics.
11. **Backups + migrations** for the database.
12. **CI**: lint, typecheck, tests, Lighthouse on every PR.
13. **Spam protection** on public forms (honeypot, Turnstile, rate limiting).
14. **i18n readiness** (English/Filipino), optional.
15. **Documentation**: README, ARCHITECTURE, CONTRIBUTING, ADRs (decision records).

## 3. Phase 0: decisions and cleanup (do FIRST, before any feature)

- [ ] **D1. Stack decision (ADR-001).** Recommended: **Next.js (App Router, TS) + Tailwind + Supabase**, migrating from the existing React prototype. Alternatives: keep PHP and host on a PHP host (drops Vercel), or static frontend on Vercel + PHP API elsewhere (two deployments, more ops). Get the client's hosting expectation confirmed.
- [ ] **D2.** Confirm the client is fine with a tech change if the design stays identical (design is the approved part).
- [ ] C1. Freeze the PHP site as `legacy/` (or a git tag `legacy-php-v1`); delete stale `index.html`.
- [ ] C2. Ensure `data/`, `.env*` (except `.env.example`) are git-ignored; purge any customer JSON from history if committed.
- [ ] C3. Commit or discard the current uncommitted work (admin.php, navbar, footer, style.css, logo) so the baseline is clean.
- [ ] C4. Add README, `docs/ARCHITECTURE.md`, `docs/adr/`.
- [ ] C5. Short-term patch if the PHP demo stays online: require login on admin.php and update_status, remove CORS `*`.

## 4. Phase 1: foundation (the "enterprise" base)

Target structure (Next.js):
```
src/
  app/                # routes: (marketing), (admin), api, not-found.tsx
  components/ui/      # Button, Modal, Accordion, Input (design system)
  components/layout/  # Header, Footer, MobileMenu, SkipLink
  features/           # announcements, bookings, estimator, search, newsletter
  lib/                # supabase clients, utils, analytics, utm
  styles/             # tokens.css, base.css, print.css
supabase/migrations/  # SQL migrations
tests/                # unit + e2e (Playwright)
docs/                 # plan, ARCHITECTURE, adr/
.github/workflows/    # CI
```
- [ ] Tooling: TypeScript strict, ESLint, Prettier, Husky pre-commit
- [ ] Design tokens (light/dark) + shared UI primitives with all states
- [ ] Env handling (`.env.example`, zod-validated env)
- [ ] Supabase project(s), first migration (bookings, contact, announcements), RLS
- [ ] Auth: Google OAuth + roles, protected `(admin)` routes
- [ ] Vercel: project linked, preview per PR, env vars per environment
- [ ] CI: lint + typecheck + test + build

## 5. Phase 2 to 5: feature order (your list, sequenced by dependency)

**Phase 2: Shell & accessibility**: skip link, sticky header, mobile menu, dark mode, hover/focus states, scroll progress, back-to-top, 404, print stylesheet.

**Phase 3: Interaction**: expandable FAQ, confirmation modals, password toggle (needs login form), loading animations, copy-to-clipboard (needs code snippets: only if the blog/docs need them), floating contact button.

**Phase 4: Data-driven ad system**: announcements CRUD + workflow, "last updated", banners/placements, full-site search (client-side first, then Postgres FTS), newsletter with success state.

**Phase 5: Growth & compliance**: cookie banner (gates analytics), UTM on outbound links, campaign analytics dashboard, SEO, privacy policy.

Each feature follows `hontech-ui-features` acceptance criteria and ships as its own PR.

## 6. Learning paths (learn, then build)

Loop per topic (see `hontech-learning-path`): explain, demo, exercise, build, check.

| Track | Topics | Unlocks | Time* |
|---|---|---|---|
| A. Web fundamentals | Semantic HTML, CSS variables, flex/grid, responsive | Design system, dark mode, print CSS | 1 wk |
| B. Accessibility | Keyboard nav, focus, ARIA basics, `<dialog>`, `prefers-*` | Skip link, mobile menu, modal, FAQ | 3 to 4 days |
| C. JavaScript essentials | DOM, events, IntersectionObserver, localStorage, fetch, async | Scroll bar, back-to-top, search, clipboard | 1 to 2 wks |
| D. Git & GitHub workflow | Branches, PRs, commit style | Every phase | 2 days |
| E. TypeScript + React | Components, props, state, hooks | Next.js migration | 2 wks |
| F. Next.js | App Router, server vs client components, routes, metadata | Whole app | 1 to 2 wks |
| G. SQL & Postgres | Tables, keys, joins, indexes, migrations | Announcements schema | 1 wk |
| H. Supabase | Client, RLS policies, Auth, Storage | Backend + admin | 1 to 2 wks |
| I. Security basics | OWASP top 10, validation, secrets, CORS, CSRF, rate limiting | Launch readiness | 3 to 4 days |
| J. Vercel & CI/CD | Environments, previews, env vars, GitHub Actions | Deploy | 3 days |
| K. Analytics & SEO | UTM, events, sitemap, JSON-LD, consent | Phase 5 | 3 to 4 days |
| L. Testing | Vitest, Playwright, Lighthouse | Confidence at scale | 1 wk |

*rough estimates for part-time study; tracks A to D can run in parallel with Phase 0 and 1.

Suggested order: D, then A+B, then C (during Phase 2), E+F (start of Phase 1), G+H+I (before Phase 4), J (Phase 1 end), K (Phase 5), L (ongoing).

## 7. Definition of done (every feature)
Works on mobile, keyboard-only, light and dark; no console errors; Lighthouse a11y >= 95; RLS-tested if data-related; docs/ADR updated; reviewed PR.

## 8. Next step
Answer D1/D2 (stack and hosting). Everything in Phase 1 depends on that choice.
