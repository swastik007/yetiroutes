# Yeti Routes — Next Action Plan
**Audit Date:** May 8, 2026  
**Status after this session:** Production-ready locally, not yet deployed to live server.

---

## Bugs Fixed This Session

| # | Bug | Fix Applied |
|---|-----|-------------|
| 1 | `/trekking-in-nepal` returned 404 | Added router entry + `PageController::trekkingNepal()` method |
| 2 | Sitemap had `/activites` (typo) | Fixed to `/activities` |
| 3 | Sitemap missing `/tours`, region pages, pillar page | Added all 7 missing URLs |
| 4 | 4 duplicate route pairs both marked `is_featured=1` | Deactivated routes 20, 26, 34, 36; merged their better content into originals 1, 2, 3, 4 |
| 5 | Routes 1, 2, 3, 4 had under-populated highlights/inclusions (old sparse data) | Merged full 6-highlight, 10-12 inclusion content from duplicate counterparts |
| 6 | Routes 2, 3, 4 missing `meta_title` and `meta_description` | Added SEO-optimized meta for all three |
| 7 | Route 52 (Kathmandu Valley Rim Trek) wrongly assigned to Annapurna Region | Changed `location_id` to 1 (Nepal) |
| 8 | Blog posts 1, 2, 3 had no `meta_description` | Added meta_description to all three |

---

## Current State After Fixes

- **Active routes:** 58 (4 duplicates deactivated)
- **Featured routes:** 8 unique (no duplicates)  
- **Routes with full content:** 58/58 — all have highlights, inclusions, exclusions, best_season, meta
- **Itineraries:** All multi-day routes have complete day-by-day data
- **All pages returning 200:** `/`, `/treks`, `/tours`, `/activities`, `/blog`, `/trekking-in-nepal`, `/treks/everest`, `/treks/annapurna`, `/treks/langtang`, `/treks/manaslu`, `/about`, `/contact`, `/guides`

---

## Priority 1 — Deploy to Live Server (Do First)

All local work is done. Nothing ships until this happens.

### Steps
1. **Export local MySQL database**
   ```
   mysqldump -u root yetiroutes > yetiroutes-export-may2026.sql
   ```
2. **Upload DB to live server** and import
3. **Sync changed PHP files** (use rsync or FTP):
   - `app/Controllers/SitemapController.php`
   - `app/Controllers/PageController.php`
   - `app/Core/Router.php`
   - `app/Controllers/TrekController.php`
   - `app/Models/Route.php`
   - `app/Views/frontend/regions/` (all 5 files)
   - `app/Views/frontend/treks.php`
   - `app/Views/frontend/tours.php`
4. **Enable HTTPS redirect** — uncomment in `.htaccess`:
   ```apache
   RewriteCond %{HTTPS} off
   RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
   ```
5. **Enable HSTS** — uncomment in `.htaccess`:
   ```apache
   Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains; preload"
   ```
6. **Submit sitemap** to Google Search Console: `https://yetiroutes.com/sitemap.xml`

---

## Priority 2 — Content Quality (Highest SEO Impact)

### 2A: Fix 3 Near-Empty Blog Posts (Critical)

Blog posts 1, 2, 3 have only 44–57 characters of content — they appear as blank articles to visitors and rank as thin pages to Google.

| ID | Slug | Current chars | Target |
|----|------|---------------|--------|
| 1 | mistakes-avoid-ebc | 57 | 2,000+ words |
| 2 | packing-list-nepal | 43 | 2,000+ words |
| 3 | life-of-porter | 44 | 1,500+ words |

**Via admin panel:** Go to `/admin/blog`, edit each post, add full article body.

### 2B: Expand Existing Short Blog Posts (8 posts)

All other blog posts are 300–800 words vs the 1,500–2,500 word target needed to rank.

| Priority | Post | Current | Target |
|----------|------|---------|--------|
| 🔥 1 | Altitude Sickness (3,400 views) | ~400 words | 2,200 words |
| 🔥 2 | Dal Bhat Power (2,100 views) | ~300 words | 1,200 words |
| 🔥 3 | Training for EBC (1,540 views) | ~350 words | 2,000 words |
| 4 | 10 Mistakes EBC (1,240 views) | ~350 words | 2,000 words |
| 5 | Lukla Flights (1,200 views) | ~250 words | 1,000 words |
| 6 | Boots vs Runners (890 views) | ~800 words | 1,500 words |
| 7 | Sleeping Bags (780 views) | ~800 words | 1,500 words |
| 8 | Mani Stones (620 views) | ~600 words | 1,200 words |

**Per post, add:**
- Expand body text to target word count
- 1 featured image (1200×630px) — upload via `/admin/media`, then set on post
- FAQ section at bottom (5–8 questions) — already has schema infrastructure
- 4–6 internal links to relevant trek/region pages

### 2C: Publish New Priority Blog Posts (10 posts planned)

All posts are keyword-targeted and outlined in `Planning/BLOG-CONTENT-CALENDAR.md`.

| Priority | Title | Monthly Searches | Status |
|----------|-------|-----------------|--------|
| 1 | Best Time to Trek in Nepal | 1,900 | Draft ready |
| 2 | Cost of Trekking in Nepal | 1,200 | Outlined |
| 3 | EBC vs ABC Comparison | 800 | Outlined |
| 4 | How Hard is EBC? | 900 | Outlined |
| 5 | Nepal Trekking Permits | 400 | Outlined |
| 6 | Annapurna Circuit Guide | 1,100 | Outlined |
| 7 | Solo Trekking Nepal | 350 | Outlined |
| 8 | Manaslu Circuit Guide | 300 | Outlined |
| 9 | Poon Hill Guide | 600 | Outlined |
| 10 | First Time Trekking Nepal | 250 | Outlined |

---

## Priority 3 — Featured Images (Visual Quality)

All 58 routes have `featured_image_id = NULL`. No images display on trek cards — only the mountain icon placeholder.

**Process:**
1. Source or photograph images for each trek (Unsplash: free; Pexels: free; own photos: best)
2. Upload via `/admin/media`
3. Edit each route via `/admin/routes/edit?id=X` and set the featured image

**Minimum viable:** Get images for the 8 featured/flagship routes first:
- Everest Base Camp Trek
- Annapurna Circuit Trek
- Manaslu Circuit Trek
- Annapurna Base Camp Trek
- Upper Mustang Trek
- Mardi Himal Trek
- Poon Hill Trek
- Everest Three Passes Trek

---

## Priority 4 — Departure Dates

Only 3 routes have departure data (IDs 1, 2, 4). Booking functionality depends on this.

Add upcoming 2026/2027 departures for all featured routes via:
```sql
INSERT INTO departures (route_id, departure_date, return_date, max_group_size, available_seats, price_override, status)
VALUES (route_id, 'YYYY-MM-DD', 'YYYY-MM-DD', 12, 12, NULL, 'available');
```

Suggested dates (typical Nepal trekking seasons): October, November, March, April for most routes.

---

## Priority 5 — Google Analytics & Search Console

Currently blind to all traffic. Do this immediately after deployment:

1. **Google Search Console**
   - Verify ownership via HTML meta tag in layout `<head>`
   - Submit `https://yetiroutes.com/sitemap.xml`
   - Monitor index coverage errors

2. **Google Analytics 4**
   - Create GA4 property
   - Add `gtag.js` snippet to `app/Views/layouts/frontend.php`
   - Set up conversion events: contact form submit, WhatsApp click

---

## Priority 6 — Review System

The fake review schema was removed (Google penalty risk). Without real reviews, the site has no `aggregateRating` structured data — losing star ratings in search results.

**Implementation needed:**
1. Create `reviews` table in DB
2. Review submission form on trek detail pages
3. Admin approval UI
4. Dynamic `aggregateRating` schema in `SeoService.php`

**Estimated effort:** 1–2 days development

---

## Priority 7 — Booking System Completion

Currently at 60% — no payment integration.

**Remaining work:**
- Departure date selection in booking form
- Stripe payment integration
- Khalti (Nepal) payment integration
- Booking confirmation emails
- PDF invoice generation

**Estimated effort:** 5–7 days development

---

## Priority 8 — Performance Optimizations

`.htaccess` already has caching and gzip. Remaining items:

1. **Add `loading="lazy"`** to all images in trek cards and region pages
2. **Minify CSS/JS** — Tailwind is loaded from CDN (full 3MB). Switch to PurgeCSS build or a local minified file
3. **Test PageSpeed score** at `https://pagespeed.web.dev/` — establish baseline, target 80+
4. **Image lazy loading** already partially done (some views have it, some don't — audit `<img>` tags)

---

## Priority 9 — Duplicate Location Data Cleanup

Two pairs of duplicate location names exist in the DB:
- IDs 4 and 10 are both "Annapurna Region"
- IDs 5 and 11 are both "Langtang Region"

The `TrekController::region()` handles this by querying both IDs — but the underlying data is messy.

**Fix:** Reassign all routes using ID 5 to ID 11 (or vice versa), then delete the unused location row. Same for IDs 4 and 10.

```sql
-- Consolidate to newer location IDs
UPDATE routes SET location_id = 10 WHERE location_id = 4;
UPDATE routes SET location_id = 11 WHERE location_id = 5;
DELETE FROM locations WHERE id IN (4, 5);
-- Then update TrekController regionLocationMap to remove [4,10] → just [10], etc.
```

---

## Known Remaining Issues (Lower Priority)

| Issue | Impact | Notes |
|-------|--------|-------|
| Blog post content very short (400–800 words) | SEO ranking | See Priority 2 above |
| All featured images NULL | UX/conversion | See Priority 3 above |
| No departure dates on most routes | Booking | See Priority 4 above |
| Only 3 FAQs in DB, none truly linked to routes | SEO schema | DB has `faqs` table; static FAQs are in region/pillar views |
| No Google Analytics/Search Console | Analytics blind | See Priority 5 above |
| No review system | Trust/SEO | See Priority 6 above |
| Booking payment not implemented | Revenue | See Priority 7 above |
| No `loading="lazy"` on many images | Performance | Small effort |
| `blog_posts` 1, 2, 3 content near-empty | UX | Must expand manually via admin |

---

## Quick Reference: Admin Panel

**URL:** `http://yetiroutes.test:8080/admin` (local) / `https://yetiroutes.com/admin` (live)

- Edit routes: `/admin/routes`
- Edit blog posts: `/admin/blog`
- Upload images: `/admin/media`
- View inquiries: `/admin/inquiries`

---

*Plan created: May 8, 2026. Next review recommended after deployment to live server.*
