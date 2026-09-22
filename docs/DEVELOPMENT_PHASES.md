# Hontech Development Phases

Working log for the homepage prototype. It complements `docs/IMPLEMENTATION_PLAN.md` (the long-term Next.js/Supabase roadmap);
this file tracks what has actually been built, in order, and what comes next.

## Workflow

- One branch per phase: `phase/<n>-<slug>`. Each phase branches from the previous one and is merged into `main` through a pull request.
- Commit style: `feat:`, `fix:`, `docs:`, `chore:` (as already used in this repo).
- A phase is done when it meets the "Definition of done" in `IMPLEMENTATION_PLAN.md` section 7 (mobile, keyboard, no console errors).
- Prototype scope: front-end only. Anything needing a backend is marked `TODO: wire to backend`.

## Phases

| # | Phase | Branch | Status |
|---|---|---|---|
| 0 | Phase log and workflow | `phase/0-development-phases` | Done |
| 1 | Clean UI theme and mega-menu navigation | `phase/1-ui-clean-theme` | Done, needs visual QA |
| 2 | Content: Latest News, Book Now (contact only) | `phase/2-news-and-book-now` | Done, placeholder data |
| 3 | FAQ built from the FAQ poster set | `phase/3-faq-posters` | Done |
| 4 | QA and cleanup | `phase/4-qa-cleanup` | Next |
| 5 | Data-driven News and announcements | `phase/5-announcements` | Planned (plan Phase 4) |
| 6 | Shell, accessibility and compliance | `phase/6-shell-a11y` | Planned (plan Phases 2, 3, 5) |
| 7 | Stack decision and migration | n/a | Blocked on D1/D2 in the plan |

### Phase 1: Clean UI theme and mega-menu navigation
Toyota PH-inspired look, applied as an override stylesheet so `style.css` is untouched (delete the `<link>` in `includes/header.php` to revert).
- `theme-clean.css`: white full-width header with thick red active rule, dark photo hero with large uppercase heading, flat white cards on light grey, square uppercase buttons, focus outlines.
- `includes/navbar.php`: two mega-menu dropdowns (Discover Hontech, Care & Services) with a feature card, plus News and Contact links; becomes an accordion on mobile.

### Phase 2: Content
- `includes/news.php`: Latest News grid with category chips (static array, `TODO: wire to backend`).
- `includes/book.php`: replaces the estimator and booking form. Shows phone numbers and social pages only.
- Removed from the page (files kept for now): `includes/estimator.php`, `includes/modal_booking.php`.

### Phase 3: FAQ
- `includes/faq.php`: 18 questions transcribed from the FAQ posters, category filter, poster thumbnails with lightbox.
- `images/faq/`: 900px web copies of the posters. Originals in `images/FQA images/` are git-ignored (large).

### Phase 4: QA and cleanup (next)
- [ ] Check every section at 375, 768 and 1280 px; fix text that assumed the old dark backgrounds.
- [ ] Confirm the two phone numbers and the Facebook URL with the client (poster "Service history" shows a different Facebook URL).
- [ ] Remove dead code: estimator/booking blocks in `js/main.js`, `includes/estimator.php`, `includes/modal_booking.php`, stale `index.html`.
- [ ] Decide what to do with `api/book_appointment.php` and the booking admin (backend, see plan C5).
- [ ] Lighthouse accessibility >= 95.

### Phase 5: Data-driven News and announcements (plan Phase 4)
Replace the static news array with a real announcements source (admin CMS, draft/schedule/publish). Depends on the stack decision.

### Phase 6: Shell, accessibility and compliance (plan Phases 2, 3, 5)
Skip link, dark mode, back-to-top, 404, print stylesheet, cookie banner, privacy policy, SEO (FAQPage JSON-LD fits the new FAQ).
