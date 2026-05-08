# Activities Feature - Complete Implementation Guide

## Summary
This guide covers the complete implementation of the Activities feature with database, backend, admin panel, and frontend.

## Files Created

### 1. Database Migration
- **File:** `migration-create-activities.sql`
- **Action:** Run this SQL file to create the activities table with sample data

### 2. Model
- **File:** `app/Models/Activity.php`
- **Status:** ✅ Complete

### 3. Controller
- **File:** `app/Controllers/ActivityController.php`
- **Status:** ✅ Complete

---

## Installation Steps

### Step 1: Run the Database Migration

```bash
# Using MySQL command line
mysql -u your_username -p yetiroutes < migration-create-activities.sql

# Or import via phpMyAdmin
```

This will:
- Create the `activities` table
- Insert 8 sample activities
- Create necessary indexes

### Step 2: Create Frontend View Folders

Create these directories:
```
app/Views/frontend/activities/
app/Views/admin/activities/
```

### Step 3: Update Router

Add these routes to `app/Core/Router.php`:

```php
// In the routes registration section, add:

// Frontend Activity Routes
$this->add('GET', '/activities', 'ActivityController@index');
$this->add('GET', '/activity', 'ActivityController@show');

// Admin Activity Routes
$this->add('GET', '/admin/activities', 'ActivityController@adminIndex');
$this->add('GET', '/admin/activities/create', 'ActivityController@adminCreate');
$this->add('POST', '/admin/activities/store', 'ActivityController@adminStore');
$this->add('GET', '/admin/activities/edit', 'ActivityController@adminEdit');
$this->add('POST', '/admin/activities/update', 'ActivityController@adminUpdate');
$this->add('POST', '/admin/activities/delete', 'ActivityController@adminDelete');
$this->add('POST', '/admin/activities/toggle-featured', 'ActivityController@adminToggleFeatured');
$this->add('POST', '/admin/activities/toggle-active', 'ActivityController@adminToggleActive');
```

### Step 4: Update HomeController

Replace the static activities array in `home.php` with dynamic data:

```php
// In app/Controllers/HomeController.php
use App\Models\Activity;

public function index(): void
{
    $routeModel = new Route();
    $activityModel = new Activity();

    // ... existing route code ...

    // Get featured activities for homepage
    $featuredActivities = $activityModel->getFeatured(8);

    $this->view('frontend.home', [
        'featured_routes' => $featuredRoutes,
        'vacation_routes' => $popularTreks,
        'tour_routes' => $tourRoutes,
        'activities' => $featuredActivities // Add this line
    ]);
}
```

### Step 5: Update home.php Activities Section

Replace the static activities array (lines 715-772) with:

```php
<?php if (isset($activities) && !empty($activities)): ?>
    <?php foreach ($activities as $activity): ?>
        <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
            <!-- Image Background -->
            <div class="relative h-64 overflow-hidden">
                <?php
                $fallbackImages = [
                    'meditation' => 'photo-1506126613408-eca07ce68773',
                    'cycling' => 'photo-1559080509-e7e68ef8bd42',
                    'hiking' => 'photo-1551632811-561732d1e306',
                    'safari' => 'photo-1579549392258-005d5d36e2f1',
                    'hike' => 'photo-1464822759023-fed622ff2c3b',
                    'bungee' => 'photo-1519904981063-b0cf448d479e',
                    'balloon' => 'photo-1506905925346-21bda4d32df4',
                    'flight' => 'photo-1544735716-392fe2489ffa',
                    'default' => 'photo-1506905925346-21bda4d32df4'
                ];

                $slugKey = strtolower(explode('-', $activity->slug)[0]);
                $imageId = $fallbackImages[$slugKey] ?? $fallbackImages['default'];
                $imageUrl = "https://images.unsplash.com/{$imageId}?w=500";
                ?>
                <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($activity->title) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                <!-- Icon -->
                <div class="absolute top-4 right-4 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-brand-lime transition-colors duration-300">
                    <i class="<?= $activity->icon_class ?? 'ri-star-line' ?> text-2xl text-brand-lime group-hover:text-white transition-colors duration-300"></i>
                </div>

                <!-- Title -->
                <div class="absolute bottom-4 left-4 right-4">
                    <h3 class="text-2xl font-bold text-white mb-2"><?= htmlspecialchars($activity->title) ?></h3>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <p class="text-gray-600 leading-relaxed mb-4"><?= htmlspecialchars($activity->short_description) ?></p>
                <a href="/activity?slug=<?= htmlspecialchars($activity->slug) ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-lime group-hover:gap-3 transition-all duration-300">
                    Learn More
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-span-full text-center py-12">
        <p class="text-gray-600 text-lg">No activities available at the moment.</p>
    </div>
<?php endif; ?>
```

---

## Frontend Views to Create

### 1. Activities Listing Page
**File:** `app/Views/frontend/activities/index.php`

Shows all active activities with filters and search.

### 2. Activity Details Page
**File:** `app/Views/frontend/activities/show.php`

Shows single activity with:
- Full description
- Highlights, inclusions, exclusions
- Pricing and duration
- Booking inquiry form
- Related activities

---

## Admin Views to Create

### 1. Activities List
**File:** `app/Views/admin/activities/index.php`

Table showing all activities with:
- Edit/Delete actions
- Toggle featured/active status
- Display order management

### 2. Create Activity Form
**File:** `app/Views/admin/activities/create.php`

Form fields:
- Title
- Short & Full Description
- Icon Class (Remixicon)
- Duration, Difficulty, Price
- Highlights (dynamic list)
- Inclusions (dynamic list)
- Exclusions (dynamic list)
- Requirements, Location
- SEO fields

### 3. Edit Activity Form
**File:** `app/Views/admin/activities/edit.php`

Same as create form but pre-filled with activity data.

---

## Testing Checklist

After implementation:

### Database
- [ ] Migration runs successfully
- [ ] 8 sample activities are inserted
- [ ] Activities table has all required fields

### Backend
- [ ] Activity model methods work
- [ ] Controller routes are registered
- [ ] Admin authentication works

### Frontend
- [ ] Homepage shows dynamic activities
- [ ] `/activities` page lists all activities
- [ ] `/activity?slug=xxx` shows activity details
- [ ] Activities link from homepage works

### Admin Panel
- [ ] Can list all activities
- [ ] Can create new activity
- [ ] Can edit existing activity
- [ ] Can delete activity
- [ ] Can toggle featured/active status

---

## Color Classes for Activities

Use these color schemes in your frontend views:

```php
$colorClasses = [
    'purple' => ['bg' => 'bg-purple-500', 'text' => 'text-purple-500'],
    'blue' => ['bg' => 'bg-blue-500', 'text' => 'text-blue-500'],
    'green' => ['bg' => 'bg-green-500', 'text' => 'text-green-500'],
    'orange' => ['bg' => 'bg-orange-500', 'text' => 'text-orange-500'],
    'teal' => ['bg' => 'bg-teal-500', 'text' => 'text-teal-500'],
    'red' => ['bg' => 'bg-red-500', 'text' => 'text-red-500'],
    'yellow' => ['bg' => 'bg-yellow-500', 'text' => 'text-yellow-500'],
    'indigo' => ['bg' => 'bg-indigo-500', 'text' => 'text-indigo-500']
];
```

---

## API Endpoints Summary

### Frontend
- `GET /activities` - List all activities
- `GET /activity?slug={slug}` - Single activity details

### Admin (Requires Authentication)
- `GET /admin/activities` - List all
- `GET /admin/activities/create` - Create form
- `POST /admin/activities/store` - Store new
- `GET /admin/activities/edit?id={id}` - Edit form
- `POST /admin/activities/update` - Update existing
- `POST /admin/activities/delete` - Delete
- `POST /admin/activities/toggle-featured` - Toggle featured
- `POST /admin/activities/toggle-active` - Toggle active

---

## Sample Activity Data Structure

```json
{
  "title": "Mountain Cycling",
  "slug": "mountain-cycling",
  "icon_class": "ri-bike-line",
  "short_description": "Ride through scenic trails",
  "difficulty": "moderate",
  "duration": "1-7 days",
  "price_from": 150.00,
  "highlights": ["Scenic trails", "Village visits"],
  "inclusions": ["Bike rental", "Guide", "Safety gear"],
  "exclusions": ["Meals", "Accommodation"],
  "is_featured": 1,
  "is_active": 1
}
```

---

## Next Steps

1. **Run migrations** for both route_type and activities
2. **Create view files** for frontend and admin
3. **Update Router** with activity routes
4. **Test thoroughly** both frontend and admin
5. **Add more activities** via admin panel

---

## Troubleshooting

### Activities not showing on homepage?
- Check if migration ran: `SELECT * FROM activities;`
- Check HomeController passes `$activities` to view
- Check home.php uses `$activities` variable

### Admin can't access activities?
- Check if routes are registered in Router
- Check if user is logged in
- Check session is working

### Slug conflicts?
- Ensure slugs are unique
- Add validation in controller
- Handle duplicates gracefully

---

## Support Files Created

1. ✅ `migration-create-activities.sql` - Database schema
2. ✅ `app/Models/Activity.php` - Model
3. ✅ `app/Controllers/ActivityController.php` - Controller
4. 📝 `ACTIVITIES-IMPLEMENTATION-GUIDE.md` - This guide

**Views to create:** 5 files (2 frontend + 3 admin)
