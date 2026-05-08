# Business Analyst Audit Report: Yeti Routes

**Date:** January 8, 2026
**Auditor:** Antigravity (AI Agent)
**Project Scope:** Custom PHP MVC Travel Agency Website

---

## 1. Executive Summary

**Overall Status:** 🟡 **Pre-Launch / Functional Beta**

"Yeti Routes" demonstrates a strong visual identity and a solid technical foundation for SEO, which is critical for the niche trekking market. However, from a business perspective, the application is **not yet commercially viable** because the primary revenue capture mechanism—the booking flow—is incomplete.

While the "Digital Sherpa" concept and "Pillar Page" SEO strategy are excellent differentiators, the current state requires immediate attention to the **Transaction Layer** (Booking & Payments) before any marketing traffic is driven to the site.

---

## 2. Critical Business Priorities (High Urgency)

### 🚨 1. The Booking "Dead End"
**Issue:** The "Book This Trip" button on the Trek Detail page links to `/booking/{slug}`, but there is no corresponding frontend controller logic or view to handle this request.
**Business Impact:** User frustration, 100% drop-off rate at the point of conversion.
**Recommendation:** 
*   **Immediate Fix:** Redirect `/booking/{slug}` to the Contact page (`/contact?trek={slug}`) as a temporary measure to capture leads via inquiry.
*   **Strategic Fix:** Build the `BookingController::create` method and a dedicated booking wizard view as planned.

### ⚠️ 2. Hardcoded External Assets
**Issue:** The codebase (e.g., `home.php`, `trek-detail.php`) heavily relies on hardcoded links to **Unsplash.com**.
**Business Impact:** 
*   **Brand Risk:** You do not own these assets; they could disappear or change.
*   **Performance:** Reliance on external CDNs affects Core Web Vitals (LCP).
**Recommendation:** Operationalize the "WebP Conversion System" mentioned in the documentation. Replace all Unsplash URLs with local, optimized images stored in `public/uploads`.

### ⚠️ 3. Content "Thinness"
**Issue:** Blog posts and some region descriptions are marked as "too short" or placeholders.
**Business Impact:** Search engines (Google) penalize "thin content," undermining the robust technical SEO work already done.
**Recommendation:** Prioritize the "Content Optimization Plan" (expanding existing 11 posts) over creating new features.

---

## 3. Product & UX Audit

### ✅ Strengths
*   **Conversion-Centric Design:** The `trek-detail.php` layout is excellent. The sticky "Booking Card" on the right sidebar (desktop) and prominent mobile CTAs follow industry best practices (resembling big players like GetYourGuide or Viator).
*   **Trust Signals:** Integration of "Gov. Certified", "First Aid Experts", and "4.9/5 Star" badges builds immediate credibility.
*   **Visual Storytelling:** The use of large hero videos and gradients (`bg-brand-lime`) creates a modern, premium feel that stands out from typical "outdated" Nepali agency sites.

### 🟡 Areas for Improvement
*   **Search Functionality:** The homepage "Trip Finder" leads to `/treks` with GET parameters. Ensure the `RouteController` creates friendly URLs or handles these parameters efficiently to avoid "No Results" pages.
*   **Inquiry vs. Booking:** The distinction is currently blurred. A "Custom Quote" button (Inquiry) exists alongside "Book This Trip". Ensure the workflows are distinct:
    *   **Booking:** specific dates, price, payment.
    *   **Inquiry:** general questions, custom dates.

---

## 4. Technical Audit (Business Perspective)

### Architecture: Custom MVC
*   **Observation:** The project uses a custom PHP framework rather than a standardized one (Laravel/Symfony).
*   **Risk:** Higher "Bus Factor". If the original developer leaves, onboarding a new developer to a custom framework is harder/more expensive than a standard one. Security updates depend entirely on the internal team.
*   **Mitigation:** rigorous documentation (which is currently **Good**—the `MASTER-OVERVIEW.md` is detailed) and eventual migration if the business scales beyond ~$1M revenue.

### SEO Infrastructure
*   **Observation:** `SeoService.php` is a standout feature. It automates Schema.org, OpenGraph, and Meta tags.
*   **Verdict:** **Excellent asset.** This automation reduces the marketing team's workload significantly.

---

## 5. Strategic Roadmap Recommendations

### Phase 1: The "Lead Capture" Fix (Days 1-3)
1.  **Redirect Booking Button:** Point `/booking/{slug}` to `/contact?trek={slug}` mostly immediately.
2.  **Verify Contact Form:** Ensure the contact form actually sends emails (SMTP check) and saves to the database (`Inquiries` table).

### Phase 2: Content & Asset Ownership (Weeks 1-2)
1.  **Asset Migration:** Download valid license-free images, process them through the WebP converter, and update the Views to use local paths.
2.  **Blog Expansion:** Execute the content plan to flesh out the "thin" pages.

### Phase 3: The Transaction Engine (Month 2)
1.  **Booking Wizard:** Build the multi-step form (Dates -> Travelers -> Add-ons -> Guest Details).
2.  **Payment Integration:** Integrate Stripe or a local gateway (Khalti/eSewa) to take deposit payments.

---

**Final Score:**
*   **Design/UX:** 8.5/10
*   **SEO Tech:** 9.0/10
*   **Business Logic (Booking):** 2.0/10 (Critical Failure)
*   **Content:** 4.0/10

**Conclusion:** Yeti Routes is a Ferrari engine in a chassis without wheels. It looks great and has power (SEO), but it can't move forward (Sales) until the booking gap is bridged.
