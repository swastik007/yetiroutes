# Route Type Implementation Guide

## Overview
This implementation adds a `route_type` field to differentiate between treks, tours, expeditions, and day trips in the routes table.

## Changes Made

### 1. Database Migration
**File:** `migration-add-route-type.sql`

Adds a new `route_type` enum field with values:
- `trek` - Multi-day trekking adventures (8-15 days)
- `tour` - Shorter touring experiences (4-7 days)
- `expedition` - Extended expeditions (16+ days)
- `day_trip` - Single or short trips (1-3 days)

### 2. Route Model Updates
**File:** [app/Models/Route.php](app/Models/Route.php)

#### Added Methods:
- `getByType(string $type, int $limit = 10)` - Get routes by specific type
- `getFeaturedByType(string $type, int $limit = 6)` - Get featured routes by type
- `getTreks(int $limit = 10)` - Convenience method for treks
- `getTours(int $limit = 10)` - Convenience method for tours
- `getExpeditions(int $limit = 10)` - Convenience method for expeditions
- `getDayTrips(int $limit = 10)` - Convenience method for day trips

### 3. HomeController Updates
**File:** [app/Controllers/HomeController.php](app/Controllers/HomeController.php)

Updated to use the new filtering methods:
- **Featured Treks Section:** Shows featured treks specifically
- **Most Popular Treks Section:** Shows all treks
- **Most Popular Tours Section:** Shows tours only (with fallback to day_trips)

## Installation Steps

### Step 1: Run the Migration

#### Option A: Using MySQL Command Line
```bash
mysql -u your_username -p yetiroutes < migration-add-route-type.sql
```

#### Option B: Using phpMyAdmin
1. Open phpMyAdmin
2. Select the `yetiroutes` database
3. Go to the SQL tab
4. Copy and paste the contents of `migration-add-route-type.sql`
5. Click "Go" to execute

#### Option C: Using MySQL Workbench
1. Open MySQL Workbench
2. Connect to your database
3. File → Open SQL Script → Select `migration-add-route-type.sql`
4. Execute the script

### Step 2: Verify the Migration
After running the migration, verify the changes:

```sql
-- Check if the column was added
DESCRIBE routes;

-- Check the distribution of route types
SELECT route_type, COUNT(*) as count
FROM routes
GROUP BY route_type;
```

### Step 3: Update Existing Routes (Optional)
The migration automatically categorizes routes based on duration. However, you may want to manually adjust some routes:

```sql
-- Example: Update specific routes to be tours
UPDATE routes
SET route_type = 'tour'
WHERE id IN (1, 2, 3);

-- Example: Mark expedition routes
UPDATE routes
SET route_type = 'expedition'
WHERE title LIKE '%Expedition%' OR difficulty = 'extreme';
```

## How It Works

### Frontend Sections:
1. **Featured Treks:** Shows routes where `route_type = 'trek'` AND `is_featured = 1`
2. **Most Popular Treks:** Shows all routes where `route_type = 'trek'`
3. **Most Popular Tours:** Shows all routes where `route_type = 'tour'`

### Automatic Classification:
The migration automatically classifies existing routes based on duration:
- 1-3 days → `day_trip`
- 4-7 days → `tour`
- 8-15 days → `trek`
- 16+ days → `expedition`

## Usage Examples

### In Controllers:
```php
$routeModel = new Route();

// Get 10 treks
$treks = $routeModel->getTreks(10);

// Get 8 featured tours
$featuredTours = $routeModel->getFeaturedByType('tour', 8);

// Get all expeditions
$expeditions = $routeModel->getExpeditions(20);
```

### In Admin Panel:
When creating or editing routes, you can now set the `route_type` field to properly categorize each route.

## Rollback (If Needed)
If you need to rollback this change:

```sql
-- Remove the route_type column
ALTER TABLE routes DROP COLUMN route_type;
```

**Note:** Make sure to update the code back to the previous version before rolling back the database.

## Testing

After implementation:
1. Visit the homepage
2. Verify that the three sections show different content:
   - Featured Treks (featured trek routes only)
   - Most Popular Treks (all trek routes)
   - Most Popular Tours (tour routes only)

## Benefits

✅ **Clear Categorization:** Routes are now properly categorized by type
✅ **Better User Experience:** Users can easily find treks vs tours
✅ **Flexible Filtering:** Easy to add new route type pages in the future
✅ **SEO Friendly:** Can create dedicated pages for each route type
✅ **Admin Flexibility:** Manually control what appears in each section

## Future Enhancements

Consider adding:
- Dedicated pages for each route type (`/tours`, `/expeditions`, etc.)
- Filters on listing pages to show/hide route types
- Admin UI to bulk update route types
- Route type badges/icons on the frontend

## Support

If you encounter any issues, check:
1. Database connection is working
2. Migration ran successfully (check the `routes` table structure)
3. Routes have been assigned proper `route_type` values
4. Clear any application cache if applicable
