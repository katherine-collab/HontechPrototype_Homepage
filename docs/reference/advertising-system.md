
# Hontech Advertising & Announcements Domain

## Entities
- `announcements` (id, slug, title, body, type[news|promo|notice|maintenance], status[draft|scheduled|published|archived], publish_at, expires_at, pinned, cover_image, author_id, created_at, updated_at)
- `promotions` (announcement + discount, service_id, code, terms)
- `campaigns` (name, utm_campaign, start/end, budget)
- `placements` (banner_top, hero_slot, modal, sidebar, footer) with priority
- `ad_events` (id, promo_id, event[impression|click|conversion], utm_*, session_hash, created_at)
- `subscribers`, `audit_log`

## Rules
1. Status workflow: draft -> scheduled -> published -> archived. Only published & within window is public (enforced by RLS, not just UI).
2. Dismissible banners remember dismissal per id + version.
3. Every promo click carries UTM; conversion = booking created with that campaign.
4. Content sanitized (no raw HTML from admin without sanitizer); images resized/alt required.
5. Every mutation writes `audit_log`. Destructive actions need confirm modal + soft delete.
6. Every post shows "Last updated".
7. Philippines context: PHP currency, Asia/Manila timezone stored UTC, DPA 2012 (Data Privacy Act) consent wording for newsletter/cookies.

## Analytics
Track impressions (once per view), clicks, conversions; dashboard = CTR and bookings per campaign.
