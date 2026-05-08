# Yeti Routes Design System v1 (Minimal)

This is a lightweight, practical design + brand guideline for Yeti Routes.
It is based on the current look and feel of the site and is intended to keep
future pages consistent across frontend and backend.

---

## 1) System Audit (Current State)

What is working well:
- Strong visual identity already exists: dark surfaces + lime accent.
- Good hero/marketing look on frontend (premium adventure vibe).
- Consistent use of rounded corners, subtle motion, and iconography.
- Core palette appears in many places (`brand-lime`, dark slate backgrounds).

Current consistency gaps:
- Typography is inconsistent across pages (`DM Sans`, `Poppins`, `Plus Jakarta Sans`).
- Color usage is mixed: some pages use tokens (`brand-lime`), others raw classes (`lime-400`).
- Backend styling is more generic and not fully aligned to frontend brand.
- Component variants are not centralized (buttons/cards/chips appear in many ad-hoc styles).
- Spacing/radius/shadow scale varies significantly between pages.

Recommendation:
- Keep current visual direction.
- Standardize with a minimal token set and reusable component rules.
- Migrate page-by-page, not all at once.

---

## 2) Brand Foundation

### Brand Personality
- Bold
- Trustworthy
- Premium but friendly
- Adventurous and local-expert

### Core Visual Signature
- Dark base UI
- Lime accent for action and highlights
- Rounded geometry
- Soft glass/blur overlays
- Motion that feels smooth, not flashy

---

## 3) Design Tokens (Minimal Set)

Use these everywhere (frontend + backend).

### Colors
- `brand.lime`: `#A3E635` (primary accent, CTA)
- `brand.limeHover`: `#BFFF4F`
- `brand.dark`: `#0F172A` (slate-900 style base)
- `brand.darkSoft`: `#1E293B` (secondary dark surfaces)
- `ui.white`: `#FFFFFF`
- `ui.gray100`: `#F3F4F6`
- `ui.gray500`: `#6B7280`
- `ui.gray900`: `#111827`
- `state.success`: `#22C55E`
- `state.warning`: `#F59E0B`
- `state.error`: `#EF4444`

### Typography
Choose one system and stick to it:
- Body/UI: `DM Sans` (fallback: `Poppins`, sans-serif)
- Display/Headings: `Playfair Display` (serif)

Do not introduce new font families unless replacing globally.

### Radius
- `r-sm`: 8px
- `r-md`: 12px
- `r-lg`: 16px
- `r-xl`: 24px
- `r-pill`: 9999px

### Spacing (8pt base)
- 4, 8, 12, 16, 24, 32, 40, 48, 64

### Shadow
- `shadow-sm`: cards/input
- `shadow-md`: interactive elements
- `shadow-lg`: floating actions/modals

---

## 4) Component Rules (Minimal)

### Buttons
- Primary CTA: lime background, dark text.
- Secondary: dark background, white text.
- Ghost: transparent with border.
- All buttons use consistent radius + height + hover transition.

### Inputs
- Light background with clear text contrast.
- Always explicit text and placeholder colors.
- Visible focus ring using lime tint.

### Cards
- White card on light sections, dark card on dark sections.
- Use consistent radius and border/shadow style.

### Navigation
- Frontend keeps glass + dark style.
- Backend should adopt same accent + spacing language.

### Status Chips
- Success/Warning/Error tokens only.
- Keep same padding and font size across app.

---

## 5) Layout Rules

### Frontend
- Hero sections can be expressive.
- Inner content width should follow a consistent container.
- Section spacing should use standardized scale (not ad-hoc margins).

### Backend
- Dashboard/admin should feel same brand family as frontend:
  - dark sidebar
  - lime accent actions
  - consistent cards/forms/table styles

---

## 6) Motion Rules

- Default transition: 200-300ms ease.
- Use subtle translate/scale on hover.
- Avoid continuous heavy animations except for key attention cues.
- Respect reduced motion in future accessibility pass.

---

## 7) Content + UI Voice

- Clear and human.
- Adventure-focused but practical.
- CTA copy should be action-oriented:
  - "Plan My Trek"
  - "Check Availability"
  - "Talk to an Expert"

---

## 8) Priority Rollout Plan

Phase 1 (now):
- Lock tokens (colors, fonts, radius, spacing).
- Standardize buttons + inputs + cards.
- Apply to layout shells first (frontend + backend).

Phase 2:
- Migrate major templates: home, treks, contact, blog, admin dashboard, chat.

Phase 3:
- Build reusable snippets/partials for repeated UI patterns.

---

## 9) Non-Negotiables

- Do not change lime as primary brand accent.
- Do not add new random colors per page.
- Do not mix multiple body font systems.
- Every new page must use tokenized styles.

---

## 10) Definition of Done (For New Pages)

A page is "design-system compliant" only if:
- Uses approved color tokens.
- Uses approved typography scale.
- Uses standard button/input/card variants.
- Maintains consistent spacing rhythm.
- Matches frontend/backend visual language.

