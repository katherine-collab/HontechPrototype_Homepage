
# Hontech Design System (Mimo-inspired)

Reference for inspiration: https://mimo.org/courses/full-stack-development
Client already approves the current look. **Extend, never replace.**

## Mimo patterns to borrow
- Vertical story: value proposition -> numbered path -> outcomes -> proof -> FAQ, with a repeated primary CTA at each natural break.
- Numbered, clickable step cards (title + one-line description) -> use for services, announcements, milestones.
- Icon + short text feature cards.
- Minimal palette, strong heading hierarchy, generous whitespace.
- Progress/achievement cues (progress bar, step counters, "last updated" badges).

## Tokens (source of truth: `:root` in style.css)
Primary `#dc2626` (dark `#b91c1c`, light `#ef4444`), dark `#111827`, bg `#f9fafb`, font Inter, radii 6/10/16px, shadows sm..2xl, transitions fast/smooth/spring.

## Rules
1. Never hardcode colors; use CSS variables. Every new color needs a dark-mode value under `[data-theme="dark"]` AND `@media (prefers-color-scheme: dark)` (when no explicit choice).
2. Every interactive element needs: hover, `:focus-visible` ring, active, disabled states.
3. Contrast: WCAG AA (4.5:1 text, 3:1 large/UI). Red on dark must be checked.
4. Respect `prefers-reduced-motion` for all animation.
5. Mobile first; 16px gutters; no horizontal scroll; tap targets >= 44px.
6. Components are reusable (one class/component per pattern), not per-page CSS.
7. Split style.css (2,856 lines) into layers: tokens, base, components, sections, utilities, print.
