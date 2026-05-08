# SEO NEXT PHASE - ACTION PLAN
## Yeti Routes Trekking Website

**Date:** January 2026
**Current Status:** 7/10 (Technical: 8/10, Content: 6/10)
**Goal:** Increase to 9/10 within 3 months

---

## AUDIT SUMMARY

### ✅ What's Working Well
- **Technical SEO Foundation (8/10)** - Excellent implementation of:
  - Schema.org structured data (Organization, TouristTrip, FAQ, BlogPosting, Breadcrumb)
  - Clean URL structure (`/trek/slug` instead of query strings)
  - Comprehensive meta tags (OG, Twitter, Canonical, Hreflang)
  - Multi-language support (EN, FR, DE with hreflang tags)
  - Image optimization infrastructure (WebP, responsive variants)
  - Sitemap.xml with dynamic content inclusion
  - Well-configured robots.txt

- **Content Pillar Pages (9/10)**
  - `/trekking-in-nepal` - 3,500+ words, 12 FAQs
  - 4 region pages (Everest, Annapurna, Langtang, Manaslu) - 2,500+ words each, 11-13 FAQs each
  - Trek detail pages - Dynamic SEO, FAQ schema, breadcrumbs
  - All targeting high-value keywords

### ⚠️ Critical Gaps Identified

1. **Blog Section Empty** - No published blog posts (missed opportunity for 10,000+ monthly visitors)
2. **Activity Pages Missing SEO Elements** - No FAQ schema, no breadcrumbs
3. **Internal Linking Weak** - No "Related Treks" or "Recommended Activities" sections
4. **Static Pages Under-Optimized** - About, Guides, Policies lack custom meta descriptions
5. **Missing Review System** - Hardcoded rating in schema (Google penalty risk)
6. **Image Alt Text Inconsistent** - Not all images have descriptive alt text
7. **Pagination Not Handled** - `/blog?page=2` indexed (duplicate content risk)

---

## PHASE 2: PRIORITY ACTION PLAN

### 🔥 WEEK 1: CRITICAL FIXES (Must Do Immediately)

**Goal:** Fix technical issues that could harm rankings

#### Day 1-2: Technical Fixes
- [ ] **Fix sitemap typo** `/activites` → `/activities` in SitemapController.php:27
- [ ] **Add conditional noindex to pagination**
  ```php
  // In BlogController and TrekController
  if (isset($_GET['page']) && $_GET['page'] > 1) {
      $seoData['robots'] = 'noindex,follow';
  }
  ```
- [ ] **Remove or fix hardcoded review rating**
  - Option A: Remove aggregateRating from Organization schema until you have real reviews
  - Option B: Implement actual review system ASAP
  - File: `app/Services/SeoService.php:253-259`

#### Day 3-5: Activity Pages SEO Enhancement
- [ ] **Add FAQ schema to Activity detail pages**
  - Extend `FaqService.php` with `getActivityFaqs()` method
  - Update `ActivityController::show()` to call FAQ service
  - Add FAQ section to `app/Views/frontend/activities/show.php`

- [ ] **Add breadcrumbs to Activity detail pages**
  - Copy breadcrumb implementation from trek-detail.php
  - Render breadcrumbs in activities/show.php view

- [ ] **Fix activity featured images**
  - Join media library in ActivityController
  - Display responsive images using MediaService

#### Day 6-7: Static Page Meta Descriptions
- [ ] **Write custom meta descriptions** (155 chars each):
  - About Us: "Meet the Yeti Routes team - local Sherpa guides with 15+ years Himalayan experience. Safe, authentic, sustainable trekking in Nepal."
  - Guides: "Our expert guides are certified mountaineers from Nepal's mountain communities. Meet your Sherpa, Tamang & Gurung trekking experts."
  - Terms & Conditions
  - Privacy Policy
  - Refund Policy
  - Cancellation Policy

**Expected Impact:** Fix potential Google penalties, improve CTR by 15-20%

---

### 📝 WEEK 2-3: CONTENT CREATION SPRINT (High Impact)

**Goal:** Create 10 high-quality blog posts targeting high-volume keywords

#### Target Keywords & Article Titles

1. **"Best Time to Trek in Nepal: Month-by-Month Guide 2026"**
   - Keyword: "best time to trek nepal" (1,900 searches/month)
   - Word count: 2,500 words
   - Include: Month-by-month breakdown, seasonal charts, festival calendar
   - Internal links: 5+ to trek pages, region pages
   - CTA: "Browse Treks by Season"

2. **"Everest Base Camp vs Annapurna Base Camp: Which Trek is Right for You?"**
   - Keyword: "ebc vs abc" / "everest vs annapurna" (800 searches/month)
   - Word count: 2,200 words
   - Include: Side-by-side comparison table, difficulty, cost, scenery
   - Internal links: EBC trek page, ABC trek page, Everest region
   - CTA: "Compare All Treks"

3. **"Cost of Trekking in Nepal: Complete Budget Breakdown 2026"**
   - Keyword: "nepal trekking cost" / "how much to trek nepal" (1,200 searches/month)
   - Word count: 2,800 words
   - Include: Budget/mid/premium tiers, daily costs, hidden costs, money-saving tips
   - Internal links: Trek pages with pricing
   - CTA: "Get Custom Quote"

4. **"Everest Base Camp Trek Difficulty: Can You Do It?"**
   - Keyword: "ebc difficulty" / "how hard is everest base camp" (900 searches/month)
   - Word count: 2,000 words
   - Include: Fitness requirements, training plan, altitude sickness prevention
   - Internal links: EBC trek page, Everest region
   - CTA: "Book EBC Trek"

5. **"Ultimate Nepal Trekking Packing List (Downloadable PDF)"**
   - Keyword: "nepal trekking packing list" / "what to pack for nepal trek" (600 searches/month)
   - Word count: 1,800 words
   - Include: Season-specific lists, gear recommendations, what NOT to bring
   - Lead magnet: Downloadable PDF checklist
   - Internal links: Trek pages, gear rental info
   - CTA: "Download Free Packing List PDF"

6. **"Altitude Sickness in Nepal: Prevention, Symptoms & Treatment"**
   - Keyword: "altitude sickness nepal" / "ams prevention trekking" (500 searches/month)
   - Word count: 2,200 words
   - Include: Medical info, acclimatization schedules, Diamox guide, emergency procedures
   - Internal links: High-altitude treks (EBC, Thorong La, Larkya La)
   - CTA: "Trek Safely with Expert Guides"

7. **"Annapurna Circuit Trek: Complete Guide 2026"**
   - Keyword: "annapurna circuit" / "annapurna circuit guide" (1,100 searches/month)
   - Word count: 3,000 words
   - Include: Day-by-day itinerary, Thorong La Pass tips, budget guide, accommodation
   - Internal links: Annapurna region page, related treks
   - CTA: "Book Annapurna Circuit"

8. **"Nepal Trekking Permits: Complete Guide (TIMS, NP Permits, RAP)"**
   - Keyword: "nepal trekking permits" / "tims card nepal" (400 searches/month)
   - Word count: 1,800 words
   - Include: Permit types, costs, where to get, processing time, restrictions
   - Internal links: Pillar page, restricted area treks
   - CTA: "We Handle Your Permits"

9. **"Solo Trekking in Nepal: Is It Safe? (Complete Guide)"**
   - Keyword: "solo trekking nepal" / "trek nepal alone" (350 searches/month)
   - Word count: 2,000 words
   - Include: Safety tips, best solo routes, when guide is required, female solo trekking
   - Internal links: Trek pages, guide services
   - CTA: "Hire a Local Guide"

10. **"Manaslu Circuit Trek: Nepal's Best-Kept Secret (2026 Guide)"**
    - Keyword: "manaslu circuit" / "manaslu trek" (300 searches/month)
    - Word count: 2,600 words
    - Include: Why it's special, vs Annapurna Circuit, Larkya La guide, Tsum Valley
    - Internal links: Manaslu region page, restricted treks
    - CTA: "Explore Manaslu Trek"

#### Blog Post Template Structure

```markdown
# [Compelling Title with Primary Keyword]

[Featured Image: 1200x630px with descriptive alt text]

## Introduction (150-200 words)
- Hook with question or compelling statement
- Promise of what reader will learn
- Include primary keyword naturally

## Table of Contents
- Auto-generated with anchor links (improves UX and time on page)

## Main Content (1,500-2,500 words)
- H2 and H3 subheadings with secondary keywords
- Short paragraphs (3-4 sentences max)
- Bullet points and numbered lists
- Data, statistics, expert quotes
- Personal anecdotes from guides
- 5-8 internal links to trek/region pages
- 2-3 external links to authoritative sources (Nepal Tourism Board, CDC altitude info, etc.)

## Visual Elements
- 5-8 images with descriptive alt text
- Tables or comparison charts
- Infographics (optional but powerful)
- Embedded maps (Google Maps for routes)

## FAQ Section (5-8 questions)
- Target "People Also Ask" keywords
- Schema markup automatically applied

## Conclusion & CTA (100 words)
- Summarize key points
- Strong call-to-action
- Link to relevant trek booking page or contact form

## Author Bio
- Brief guide/writer bio (builds E-A-T)
- Link to about page

## Related Posts (Automatic)
- 3-4 related articles (by category)
- Keeps readers on site longer
```

#### Content Creation Timeline

**Week 2:**
- Day 1-2: Write Posts #1-2 (Best Time, EBC vs ABC)
- Day 3-4: Write Posts #3-4 (Cost, Difficulty)
- Day 5: Write Post #5 (Packing List) + Create PDF lead magnet
- Day 6-7: Publish all 5 posts, optimize images, test schema

**Week 3:**
- Day 1-2: Write Posts #6-7 (Altitude Sickness, Annapurna Circuit)
- Day 3-4: Write Posts #8-9 (Permits, Solo Trekking)
- Day 5: Write Post #10 (Manaslu Circuit)
- Day 6-7: Publish all 5 posts, internal linking audit, sitemap update

**Expected Impact:**
- 10 blog posts = ~22,000 words of SEO content
- Target combined monthly searches: ~10,000
- Potential monthly visitors from blog: 1,000-2,000 (month 3-6)
- Internal links: 50+ new links distributing authority to money pages

---

### 🔗 WEEK 4: INTERNAL LINKING STRATEGY

**Goal:** Improve link equity distribution and user engagement

#### A. Add "Related Treks" Section to Trek Detail Pages

**Implementation:**
File: `app/Controllers/TrekController.php::show()`

```php
// After loading $route, fetch related treks
$relatedTreks = Route::where('location_id', $route->location_id)
    ->where('id', '!=', $route->id)
    ->where('is_active', 1)
    ->limit(3)
    ->get();

// Pass to view
$this->view('frontend.trek-detail', [
    // ... existing data
    'relatedTreks' => $relatedTreks
]);
```

**View Update:**
File: `app/Views/frontend/trek-detail.php`

Add before footer:
```php
<?php if (!empty($relatedTreks)): ?>
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold mb-8 text-center">You Might Also Like</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($relatedTreks as $trek): ?>
                <a href="/trek/<?= $trek->slug ?>" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                    <img src="<?= $trek->featured_image_path ?>" alt="<?= $trek->title ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2"><?= $trek->title ?></h3>
                        <p class="text-gray-600 text-sm mb-4"><?= substr($trek->short_description, 0, 120) ?>...</p>
                        <div class="flex justify-between text-sm">
                            <span class="text-blue-600"><?= $trek->duration_days ?> days</span>
                            <span class="text-orange-600"><?= $trek->difficulty ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
```

#### B. Add "Recommended Activities" to Trek Pages

**Query:**
```php
// Get activities in the same region
$activities = Activity::where('location', 'LIKE', '%' . $route->location_name . '%')
    ->where('is_active', 1)
    ->limit(4)
    ->get();
```

#### C. Add Contextual Links in Blog Posts

**During blog writing:**
- Every mention of a trek name → link to trek page
- Every mention of a region → link to region page
- Cost mentions → link to cost breakdown page or pricing section
- Difficulty mentions → link to difficulty guide or specific trek

**Example:**
"The **[Everest Base Camp trek](/trek/everest-base-camp)** is one of Nepal's most iconic journeys. Located in the **[Everest region](/treks/everest-region)**, this challenging adventure..."

#### D. Update Homepage Internal Links

**Add "Popular Guides" section:**
- Links to top 5 blog posts
- Links to all 4 region pages
- Link to pillar page prominently

#### E. Footer Link Structure

Update footer to include:
- **Trek Regions**: Links to 4 region pages
- **Popular Treks**: Top 5 trek pages
- **Resources**: Top 5 blog articles
- **Company**: About, Guides, Contact

**Expected Impact:**
- Better crawlability (all pages within 3 clicks of homepage)
- Lower bounce rate (more navigation options)
- Higher time on site (15-20% increase expected)
- Better distribution of PageRank to money pages

---

### 📸 WEEK 5: IMAGE SEO OPTIMIZATION

**Goal:** Improve image search visibility and page load speed

#### Task 1: Audit All Image Alt Text

**Pages to Audit:**
1. Homepage (`app/Views/frontend/home.php`)
2. Trek detail template
3. Activity pages
4. Blog posts
5. Region pages

**Alt Text Best Practices:**

❌ **Bad Examples:**
- `alt="trek"`
- `alt="mountain"`
- `alt="img_1234.jpg"`

✅ **Good Examples:**
- `alt="Trekker crossing suspension bridge over Dudh Koshi river in Everest region with prayer flags"`
- `alt="Annapurna Base Camp amphitheater surrounded by 7000m peaks at sunrise"`
- `alt="Sherpa guide checking altimeter at Namche Bazaar acclimatization point"`
- `alt="Traditional stone teahouse in Langtang Valley with Langtang Lirung mountain backdrop"`

**Formula:** [Action/Subject] + [Location Detail] + [Context/Background]

#### Task 2: Convert Existing Images to WebP

**Run conversion script:**
```bash
php convert-images-to-webp.php
```

**Verify:**
- Check file size reduction (should be 25-35% smaller)
- Test responsive image loading in browser
- Verify WebP fallback works for old browsers

#### Task 3: Add Structured Data for Images

For key images (featured trek images), add ImageObject schema:

```json
{
  "@type": "ImageObject",
  "url": "https://yetiroutes.com/uploads/everest-base-camp.jpg",
  "caption": "Trekkers at Everest Base Camp with Khumbu Icefall",
  "creditText": "Yeti Routes",
  "copyrightNotice": "© 2026 Yeti Routes"
}
```

**Expected Impact:**
- 20-30% faster page load (WebP compression)
- Image search traffic increase (5-10% of total traffic)
- Better accessibility (screen readers)
- Improved Core Web Vitals score

---

### 🔍 WEEK 6: GOOGLE SEARCH CONSOLE SETUP & MONITORING

**Goal:** Start tracking SEO performance and identify issues

#### Setup Tasks

1. **Verify Site Ownership**
   - Add verification meta tag to SeoService.php
   - Alternative: Upload HTML file to public/
   - Verify in Google Search Console

2. **Submit Sitemap**
   - Submit `https://yetiroutes.com/sitemap.xml`
   - Monitor indexation status
   - Check for crawl errors

3. **Set Up Property**
   - Add both http:// and https:// versions
   - Set preferred version (https)
   - Link to Google Analytics (if available)

4. **Review Initial Data**
   - Index Coverage report
   - Mobile Usability
   - Core Web Vitals
   - Search Performance (queries, impressions, clicks, CTR)

#### Monitoring Checklist (Weekly)

**Week 1 Metrics:**
- [ ] Total indexed pages
- [ ] Pages with errors
- [ ] Mobile usability issues
- [ ] Core Web Vitals status (LCP, FID, CLS)

**Week 2-4 Metrics:**
- [ ] Top performing queries
- [ ] Click-through rate (CTR) trends
- [ ] Average position for target keywords
- [ ] Manual actions or security issues

**Expected Insights:**
- Identify which pages aren't indexing (fix crawlability)
- See which keywords you're ranking for (optimize further)
- Find mobile issues (fix for better rankings)
- Track improvement in rankings week-over-week

---

### ⚡ WEEK 7-8: PERFORMANCE OPTIMIZATION

**Goal:** Achieve 80+ PageSpeed score, improve Core Web Vitals

#### Performance Audit

**Test with:**
- Google PageSpeed Insights: https://pagespeed.web.dev/
- GTmetrix: https://gtmetrix.com/
- WebPageTest: https://www.webpagetest.org/

**Target Metrics:**
- Largest Contentful Paint (LCP): <2.5s
- First Input Delay (FID): <100ms
- Cumulative Layout Shift (CLS): <0.1
- Time to Interactive (TTI): <3.8s
- First Contentful Paint (FCP): <1.8s

#### Optimization Tasks

**1. Image Optimization (if not done)**
- Lazy load images below fold: `loading="lazy"`
- Use next-gen formats (WebP) ✅ Already implemented
- Responsive image srcsets ✅ Already implemented
- Compress images to <200KB

**2. Font Optimization**
```html
<!-- Add to layout -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
```

**3. Critical CSS**
- Extract above-the-fold CSS
- Inline critical CSS in <head>
- Defer non-critical CSS

**4. JavaScript Optimization**
- Move scripts to bottom (before </body>)
- Add defer or async attributes:
  ```html
  <script src="app.js" defer></script>
  ```

**5. Browser Caching (in .htaccess)**
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

**6. Minification**
- Minify CSS and JS
- Use build tools (Webpack, Gulp, or online minifiers)
- Remove unused CSS (PurgeCSS)

**7. Content Delivery**
- Consider Cloudflare CDN (free tier available)
- Enable Gzip/Brotli compression
- Optimize server response time (TTFB <200ms)

**Expected Impact:**
- 30-40% faster page loads
- Better mobile experience
- Improved search rankings (speed is ranking factor)
- Lower bounce rate

---

### 📊 MONTH 2-3: ADVANCED SEO & CONTENT EXPANSION

#### Week 9-10: Review System Implementation

**Why Critical:**
Your Organization schema currently shows:
```json
"aggregateRating": {
  "ratingValue": "4.9",
  "reviewCount": "150"
}
```
But you have NO actual reviews in database → **Google penalty risk**

**Solution: Implement Real Review System**

**Database Schema:**
```sql
CREATE TABLE reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    route_id INT,
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    title VARCHAR(200),
    review_text TEXT,
    trek_date DATE,
    verified_booking BOOLEAN DEFAULT 0,
    is_approved BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (route_id) REFERENCES routes(id)
);
```

**Features to Implement:**
1. Review submission form on trek pages (after booking)
2. Admin approval system
3. Display reviews on trek detail pages
4. Aggregate rating calculation (dynamic)
5. Review schema generation (replace hardcoded)

**Schema Implementation:**
```php
// In SeoService, replace hardcoded with:
public function addReviewSchemaFromDatabase($reviews, $averageRating, $reviewCount) {
    if (empty($reviews)) return;

    $reviewData = [];
    foreach ($reviews as $review) {
        $reviewData[] = [
            "@type" => "Review",
            "author" => ["@type" => "Person", "name" => $review->user_name],
            "reviewRating" => [
                "@type" => "Rating",
                "ratingValue" => $review->rating,
                "bestRating" => "5"
            ],
            "reviewBody" => $review->review_text
        ];
    }

    $this->structuredData[] = [
        "@context" => "https://schema.org",
        "@type" => "Product",
        "name" => "Nepal Trekking Services",
        "review" => $reviewData,
        "aggregateRating" => [
            "@type" => "AggregateRating",
            "ratingValue" => $averageRating,
            "reviewCount" => $reviewCount
        ]
    ];
}
```

**Expected Impact:**
- Rich snippets in search (star ratings visible)
- 20-30% higher CTR from search results
- Trust signal for users
- Compliance with Google guidelines

#### Week 11-12: Content Expansion - Second Wave

**Create 10 More Blog Posts (Total: 20)**

Target secondary keywords and long-tail queries:

11. "Langtang Valley Trek Guide: Nepal's Hidden Gem"
12. "Ghorepani Poon Hill Trek: Perfect for Beginners"
13. "How to Train for Everest Base Camp Trek"
14. "Nepal Trekking Insurance: What You Need to Know"
15. "Teahouse vs Camping Trek: Which is Better?"
16. "Best Food on Nepal Treks: What to Expect"
17. "Thorong La Pass: Complete Crossing Guide"
18. "Mardi Himal Trek: Off the Beaten Path"
19. "Nepal Trekking with Kids: Is It Possible?"
20. "Photography Tips for Nepal Treks"

**Content Distribution:**
- Publish 2 posts per week
- Share on social media (Facebook, Instagram)
- Email to mailing list subscribers
- Cross-link with existing blog posts

---

### 🎯 MONTH 3: ADVANCED OPTIMIZATIONS

#### Week 13: Competitor Analysis

**Analyze Top 3 Competitors:**
1. Identify their top-ranking pages (Ahrefs/SEMrush or manual Google search)
2. Analyze their content (word count, topics, internal links)
3. Find content gaps (topics they don't cover)
4. Improve your content to be 10x better

**Tools:**
- Google Search: "nepal trekking" (see who ranks #1-10)
- AlsoAsked.com: Find related questions
- AnswerThePublic: Find search queries
- Google Trends: Trending topics

#### Week 14: FAQ Expansion

**Current Status:**
- Trek pages: Have FAQs ✅
- Region pages: Have FAQs ✅
- Activity pages: **MISSING** ❌

**Action:**
Add 10-15 FAQs to each activity page, for example:

**Mountain Climbing Activity FAQs:**
1. What climbing experience is required?
2. How long does it take to climb [Peak Name]?
3. What is the success rate?
4. Do I need climbing permits?
5. What gear is provided vs what do I bring?
6. Is altitude sickness a concern?
7. How physically demanding is it?
8. What is the best season?
9. Can beginners attempt this climb?
10. What safety measures are in place?

**Generate Schema:** Automatic via FaqService

#### Week 15: Link Building Campaign (Optional but Recommended)

**Goal:** Acquire 10-20 high-quality backlinks

**White-Hat Strategies:**

1. **Guest Posting**
   - Write for travel blogs (Lonely Planet community, Travel + Leisure)
   - Contribute to trekking forums (Reddit r/Nepal, TripAdvisor forums)
   - Partner with travel bloggers (offer free trek in exchange for review)

2. **Resource Page Link Building**
   - Find "Nepal travel resources" pages
   - Contact webmasters: "Hey, I noticed your resource page. Our comprehensive Nepal trekking guide might be valuable..."
   - Target: University travel sites, government tourism sites, travel associations

3. **Broken Link Building**
   - Find broken links on travel sites
   - Suggest your content as replacement
   - Tool: Ahrefs Broken Link Checker or Check My Links Chrome extension

4. **Local Citations**
   - Nepal Tourism Board directory
   - TripAdvisor business listing
   - Google My Business (if physical location)
   - Booking.com / Viator partner listings

5. **PR & Media**
   - Submit press releases about unique treks or sustainable tourism initiatives
   - Reach out to travel journalists
   - Partner with adventure magazines

**Expected Impact:**
- Domain authority increase
- Referral traffic
- Higher rankings for competitive keywords
- Brand visibility

#### Week 16: Schema Enhancements

**Add Advanced Schema Types:**

1. **Video Schema** (if you create trek videos)
```json
{
  "@type": "VideoObject",
  "name": "Everest Base Camp Trek Experience",
  "description": "Follow our guide through the EBC trek",
  "thumbnailUrl": "https://yetiroutes.com/video-thumb.jpg",
  "uploadDate": "2026-01-15",
  "duration": "PT5M30S",
  "contentUrl": "https://youtube.com/watch?v=..."
}
```

2. **LocalBusiness Schema** (if you have office in Nepal)
```json
{
  "@type": "LocalBusiness",
  "name": "Yeti Routes Trekking Office",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Thamel",
    "addressLocality": "Kathmandu",
    "addressCountry": "NP"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "27.7172",
    "longitude": "85.3240"
  },
  "openingHours": "Mo-Su 09:00-18:00",
  "telephone": "+977-984-1234567"
}
```

3. **Event Schema** (for fixed departure dates)
```json
{
  "@type": "Event",
  "name": "Everest Base Camp Trek - Group Departure",
  "startDate": "2026-03-15",
  "endDate": "2026-03-28",
  "location": {
    "@type": "Place",
    "name": "Everest Base Camp",
    "address": "Khumbu, Nepal"
  },
  "offers": {
    "@type": "Offer",
    "price": "1299",
    "priceCurrency": "USD",
    "availability": "https://schema.org/InStock",
    "url": "https://yetiroutes.com/trek/everest-base-camp"
  }
}
```

---

## MEASUREMENT & KPIs

### Month 1 Targets
- [ ] Blog posts published: 10
- [ ] Total indexed pages: 50+
- [ ] Organic traffic: +30% vs baseline
- [ ] Average position for "nepal trekking": Top 50
- [ ] FAQ snippets earned: 5+
- [ ] PageSpeed score: 75+

### Month 2 Targets
- [ ] Blog posts published: 20 total
- [ ] Total indexed pages: 80+
- [ ] Organic traffic: +100% vs baseline
- [ ] Average position for "nepal trekking": Top 30
- [ ] FAQ snippets earned: 15+
- [ ] PageSpeed score: 80+
- [ ] Backlinks acquired: 10+

### Month 3 Targets
- [ ] Blog posts published: 30 total
- [ ] Total indexed pages: 100+
- [ ] Organic traffic: +200% vs baseline
- [ ] Average position for "nepal trekking": Top 20
- [ ] Average position for "everest base camp trek": Top 10
- [ ] FAQ snippets earned: 25+
- [ ] PageSpeed score: 85+
- [ ] Backlinks acquired: 20+
- [ ] Review count: 20+ verified reviews
- [ ] Conversion rate: 2-3% (traffic → inquiry)

---

## TOOLS & RESOURCES NEEDED

### Free Tools
- [x] Google Search Console (for monitoring)
- [x] Google Analytics (for traffic analysis)
- [x] Google PageSpeed Insights (for performance)
- [ ] AlsoAsked.com (for FAQ research)
- [ ] AnswerThePublic (for keyword ideas)
- [ ] Ubersuggest (free keyword research - limited)

### Paid Tools (Optional but Recommended)
- [ ] Ahrefs ($99/month) - Keyword research, backlink analysis, competitor research
- [ ] SEMrush ($119/month) - Alternative to Ahrefs
- [ ] Surfer SEO ($59/month) - Content optimization
- [ ] Grammarly Premium ($12/month) - Content quality

### Content Creation
- [ ] Canva Pro ($13/month) - Infographics, featured images
- [ ] Stock photos: Unsplash (free) or Shutterstock (paid)
- [ ] AI writing assistant: Jasper or Claude (for outlines and research)

---

## RISK MITIGATION

### Potential Issues & Solutions

**Issue 1: Content Creation Backlog**
- **Risk:** Can't write 10 blog posts in 2 weeks
- **Solution:** Hire freelance writer ($50-100/article) or use AI assistance for drafts
- **Alternative:** Extend timeline to 1 post every 3 days (6 weeks for 10 posts)

**Issue 2: No Technical Developer**
- **Risk:** Can't implement review system or advanced features
- **Solution:** Use WordPress plugin equivalents, or hire developer on Upwork ($25-50/hr for 10-20 hours)

**Issue 3: Low Initial Traffic**
- **Risk:** SEO takes 3-6 months to show results
- **Solution:**
  - Supplement with paid ads (Google Ads, Facebook Ads) during SEO ramp-up
  - Email marketing to existing customer list
  - Social media marketing (Instagram, Pinterest - visual platforms)

**Issue 4: Competitor Aggressiveness**
- **Risk:** Competitors also doing SEO, hard to rank
- **Solution:**
  - Focus on long-tail, low-competition keywords initially
  - Target "Manaslu" and "Langtang" (less competitive than "Everest")
  - Build brand authority through consistent, quality content

---

## SUCCESS CRITERIA

**By End of Month 3:**
- ✅ 80+ pages indexed in Google
- ✅ 20-30 blog posts published
- ✅ Ranking in top 20 for "nepal trekking"
- ✅ Ranking in top 10 for "manaslu circuit"
- ✅ 1,000+ monthly organic visitors (up from ~100 baseline)
- ✅ 15+ "People Also Ask" featured snippets
- ✅ 20+ backlinks from relevant sites
- ✅ 85+ PageSpeed score
- ✅ 20+ verified customer reviews with schema
- ✅ 2-3% conversion rate (traffic to inquiry form)

**Long-Term (6-12 Months):**
- ✅ Ranking in top 5 for "nepal trekking tours"
- ✅ Ranking in top 3 for regional keywords ("annapurna base camp trek")
- ✅ 5,000+ monthly organic visitors
- ✅ 50+ featured snippets
- ✅ 100+ backlinks
- ✅ Established as authority in Nepal trekking niche

---

## NEXT ACTIONS

**Start This Week:**
1. [ ] Review and approve this plan
2. [ ] Fix critical technical issues (Week 1 tasks)
3. [ ] Set up Google Search Console
4. [ ] Audit all image alt text
5. [ ] Plan blog content calendar (who writes what, when)

**Assign Responsibilities:**
- **Technical fixes:** Developer or you
- **Content creation:** Writer(s) + review by guides for accuracy
- **Image optimization:** Designer or marketing team
- **Link building:** Marketing/PR person
- **Monitoring:** Weekly review of Search Console data

**Budget Estimate (Optional Paid Services):**
- Freelance writer: $500-1,000 (10 articles)
- Ahrefs subscription: $99/month
- Stock images: $0-100 (use Unsplash free)
- Developer for review system: $500-1,000 one-time
- **Total Month 1:** $1,100-2,200
- **Total Months 2-3:** $200-300/month (ongoing tools)

---

## QUESTIONS TO ANSWER BEFORE STARTING

1. **Who will write the blog content?**
   - In-house team, freelancer, or AI-assisted?

2. **Do you have customer reviews/testimonials?**
   - If yes, how many? Can we use them for review schema?

3. **What's your budget for SEO?**
   - Free/DIY or willing to invest in tools/services?

4. **Timeline flexibility?**
   - Strict 3 months or can extend if needed?

5. **Access to photography/media?**
   - Do you have trek photos, or need to source stock images?

6. **Technical skill level?**
   - Can you implement PHP code changes, or need developer help?

---

## CONCLUSION

This plan transforms your **strong technical SEO foundation (8/10)** into a **complete SEO powerhouse (9/10)** by focusing on:

1. **Content Creation** - 20-30 high-quality blog posts targeting valuable keywords
2. **Technical Fixes** - Closing gaps in Activity pages, meta descriptions, pagination
3. **Internal Linking** - Better link distribution to money pages
4. **Performance** - Faster load times improve rankings and UX
5. **Authority Building** - Reviews, backlinks, featured snippets

**Expected ROI:**
- Month 3: 200-300% traffic increase
- Month 6: 500% traffic increase
- Month 12: 1,000%+ traffic increase
- More organic traffic = fewer paid ads = lower customer acquisition cost
- Better rankings = more credibility = higher conversion rates

**The key is consistency.** SEO compounds over time. The content you create today will drive traffic for years.

Ready to begin? Let's start with Week 1 Critical Fixes! 🚀
