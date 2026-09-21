
# Hontech UI Feature Checklist

Build ONE feature per change. Each must pass its acceptance criteria, keyboard test, and dark-mode check. Build order = dependency order.

| # | Feature | Acceptance criteria |
|---|---|---|
| 1 | Skip-to-content link | First focusable element; visible on focus; targets `<main id="main">` |
| 2 | Dark mode toggle | Tokens-based; default = system; choice in localStorage (try/catch); set `data-theme` in inline head script to avoid flash; `aria-pressed` |
| 3 | Sticky header | `position: sticky`; shadow after scroll; does not cover anchor targets (`scroll-margin-top`) |
| 4 | Mobile menu | Button `aria-expanded`/`aria-controls`; Esc closes; focus trap; body scroll lock; closes on link click |
| 5 | Hover/focus states | Audit every `button`, `a.btn`; shared `.btn` base |
| 6 | Scroll progress bar | `transform: scaleX`, rAF/passive listener, `aria-hidden` |
| 7 | Back-to-top | Appears after ~400px; smooth scroll unless reduced-motion; focus moves to top |
| 8 | Loading animations | Skeletons/spinners for async data; reduced-motion safe; no layout shift |
| 9 | Expandable FAQ | Native `<details>`/`<summary>` or ARIA accordion; only content is crawlable; add FAQPage JSON-LD |
| 10 | Floating contact button | Doesn't overlap back-to-top/cookie banner; links to tel:/booking; labelled |
| 11 | Cookie banner | Accept/Decline equally prominent; stores consent; analytics/UTM cookies only after consent |
| 12 | Password visibility toggle | Button type=button, `aria-label` updates, keeps caret/focus |
| 13 | Confirmation modal | Native `<dialog>`; names the destructive action; Cancel is default focus; Esc works |
| 14 | Newsletter + success state | Validated email, honeypot, rate limit, inline success/error via `aria-live`, double opt-in later |
| 15 | Full-site search | Start client-side index (JSON built at build time); later Postgres full-text via Supabase |
| 16 | 404 page | Branded, search box, top links, booking CTA; correct 404 status |
| 17 | Print stylesheet | Hide nav/floating UI; show URLs; black on white; avoid page breaks in cards |
| 18 | UTM on outbound links | Only external hrefs; add `utm_source=hontech&utm_medium=website&utm_campaign=<page>`; add `rel="noopener"`; skip mailto/tel |
| 19 | Copy-to-clipboard | `navigator.clipboard` with fallback; "Copied" live-region feedback |
| 20 | Last updated | Stored as `updated_at` in DB; rendered in `<time datetime>` |

Global: no feature may break without JavaScript where avoidable (progressive enhancement).
