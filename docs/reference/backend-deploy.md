
# Hontech Backend, Security & Deployment

## Constraint
Vercel does not run PHP natively. Do not plan a Vercel deploy of the PHP app. Follow the decision recorded in docs/IMPLEMENTATION_PLAN.md (Phase 0). Default recommendation: Next.js (App Router, TypeScript) + Supabase, reusing the React prototype.

## Supabase
- Postgres migrations live in `supabase/migrations/` (never edit prod via dashboard only).
- RLS ON for every table. Public: read published announcements only; insert-only for contact/appointments/subscribers with validation. Admin: role in `profiles.role`, checked in policies.
- Service-role key only on the server; never in client bundles or git.
- Google OAuth via Supabase Auth; redirect URLs per environment (local, Vercel preview, production).

## Security baseline (fix before any launch)
- Admin area must require login (current admin.php and update_status API are unauthenticated).
- Remove `Access-Control-Allow-Origin: *` on write endpoints.
- Validate + sanitize server-side (zod); parameterized queries only; rate limit public forms; honeypot/captcha.
- Security headers (CSP, HSTS, X-Content-Type-Options, Referrer-Policy) via Vercel config.
- No secrets in git: `.env.example` only; verify `.env` is ignored.

## Environments
local -> preview (per PR) -> production. Env vars set in Vercel per environment. Separate Supabase projects for staging/prod.

## Definition of done for backend work
Migration + RLS policy + test for allowed and denied access + typed client + docs updated.
