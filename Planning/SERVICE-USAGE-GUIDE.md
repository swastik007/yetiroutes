# Yeti Routes - Service Layer Usage Guide

This guide explains how to use the advanced service classes that implement Phase 2 features from the development plan.

---

## 1. PermitService - Nationality-Based Pricing

### Overview
Handles permit cost calculations based on route requirements and traveler nationality. Implements JSON-based pricing rules from the `permits` table.

### Setup Permit Data
```sql
-- Example: Create a permit with nationality-based pricing
INSERT INTO permits (name, is_fnrts_required, nationality_price_rules) VALUES
('Sagarmatha National Park Entry', 1, '{
    "SAARC": 30.00,
    "Chinese": 120.00,
    "Other": 90.00
}');

-- Attach permit to a route
INSERT INTO route_permits (route_id, permit_id) VALUES (1, 1);
```

### Usage Examples

#### Calculate Permit Costs
```php
use App\Services\PermitService;

$permitService = new PermitService();

// Get permit costs for a route and nationality
$permits = $permitService->calculatePermitCosts(
    routeId: 1,
    nationality: 'SAARC'
);

// Returns:
// [
//     [
//         'permit_id' => 1,
//         'permit_name' => 'Sagarmatha National Park Entry',
//         'cost' => 30.00,
//         'requires_fnrts' => true,
//         'currency' => 'USD'
//     ]
// ]
```

#### Get Total Permit Cost
```php
$totalCost = $permitService->getTotalPermitCost(
    routeId: 1,
    nationality: 'Other'
);
// Returns: 90.00 (float)
```

#### Check FNRTS Requirement
```php
$requiresFNRTS = $permitService->requiresFNRTS(1);
// Returns: true or false
```

#### Integrate with Booking
```php
// In BookingController
public function calculateTotal(): void
{
    $routeId = $_POST['route_id'];
    $nationality = $_POST['nationality'];

    $permitService = new PermitService();
    $permits = $permitService->calculatePermitCosts($routeId, $nationality);

    $permitTotal = array_sum(array_column($permits, 'cost'));
    $routePrice = 1299.00; // From route

    $total = $routePrice + $permitTotal;

    $this->json([
        'route_price' => $routePrice,
        'permits' => $permits,
        'permit_total' => $permitTotal,
        'grand_total' => $total
    ]);
}
```

---

## 2. LocalizationMiddleware - Multi-Language Content

### Overview
Handles automatic content translation based on URL structure, user preferences, or session. Implements the multi-language system using the `content_translations` table.

### Setup Translation Data
```sql
-- Example: Add French translation for a route
INSERT INTO content_translations
(entity_type, entity_id, language_code, field_name, translation_value)
VALUES
('route', 1, 'fr', 'title', 'Camp de base de l\'Everest'),
('route', 1, 'fr', 'short_description', 'Randonnée vers le camp de base de la plus haute montagne du monde');
```

### Usage Examples

#### Initialize in Controller
```php
use App\Middleware\LocalizationMiddleware;

class RouteController extends Controller
{
    public function show(): void
    {
        $localization = new LocalizationMiddleware();

        $routeId = $_GET['id'];
        $route = $this->routeModel->find($routeId);

        // Translate the route
        $route = $localization->translate('route', $routeId, $route);

        $this->view('route.detail', [
            'route' => $route,
            'current_lang' => $localization->getCurrentLanguage()
        ]);
    }
}
```

#### Translate Multiple Entities
```php
$localization = new LocalizationMiddleware();

$routes = $this->routeModel->all();

// Translate all routes at once (efficient)
$routes = $localization->translateMany('route', $routes);
```

#### Save Translations (Admin Panel)
```php
public function saveTranslation(): void
{
    $this->requireAuth();

    $localization = new LocalizationMiddleware();

    $success = $localization->saveTranslation(
        entityType: 'route',
        entityId: 1,
        languageCode: 'fr',
        fieldName: 'title',
        translationValue: 'Camp de base de l\'Everest'
    );

    if ($success) {
        $_SESSION['success'] = 'Translation saved!';
    }
}
```

#### Generate Localized URLs
```php
$localization = new LocalizationMiddleware();

// If current language is French:
$url = $localization->url('/everest-base-camp');
// Returns: /fr/everest-base-camp

// If English (default):
// Returns: /everest-base-camp
```

#### Language Detection Order
1. **URL prefix** (`/fr/route-name`)
2. **Session** (`$_SESSION['language']`)
3. **User preference** (database: `users.preferred_language`)
4. **Default** (`en`)

---

## 3. MediaService - Advanced File Uploads

### Overview
Handles file uploads with automatic image resizing, variant creation (thumbnails), and secure file management.

### Features
- ✅ File validation (MIME type, size)
- ✅ Automatic image resizing (3 variants: thumbnail, medium, large)
- ✅ Unique filename generation
- ✅ Database tracking
- ✅ Easy deletion (removes all variants)

### Usage Examples

#### Upload Media
```php
use App\Services\MediaService;

$mediaService = new MediaService();

// Upload from form
if (isset($_FILES['image'])) {
    $result = $mediaService->upload(
        file: $_FILES['image'],
        uploadedBy: $_SESSION['user_id'],
        visibility: 'public'
    );

    if ($result) {
        echo "Media ID: " . $result['id'];
        echo "URL: " . $result['url'];
        // Variants: thumbnail, medium, large
        print_r($result['variants']);
    }
}
```

#### Get Media URL
```php
$mediaService = new MediaService();

// Get original
$url = $mediaService->getUrl(mediaId: 1, size: 'original');

// Get thumbnail
$thumbUrl = $mediaService->getUrl(mediaId: 1, size: 'thumbnail');

// Get medium size
$mediumUrl = $mediaService->getUrl(mediaId: 1, size: 'medium');
```

#### Delete Media
```php
$mediaService = new MediaService();

// Deletes original + all variants
$success = $mediaService->delete(mediaId: 1);
```

#### Complete Upload Example
```php
// In a Controller
public function uploadRouteImage(): void
{
    $this->requireAuth();

    if (!isset($_FILES['route_image'])) {
        $_SESSION['error'] = 'No file uploaded';
        $this->redirect('/admin/routes');
    }

    $mediaService = new MediaService();
    $result = $mediaService->upload(
        $_FILES['route_image'],
        $_SESSION['user_id'],
        'public'
    );

    if ($result) {
        // Attach to route
        $mediaModel = new Media();
        $mediaModel->attachToEntity(
            $result['id'],
            'route',
            $routeId,
            isFeatured: true
        );

        $_SESSION['success'] = 'Image uploaded!';
    }

    $this->redirect('/admin/routes');
}
```

### Supported File Types
- Images: JPEG, PNG, GIF, WebP
- Videos: MP4
- Documents: PDF

### Image Variants Generated
| Variant | Max Width | Max Height | Use Case |
|---------|-----------|------------|----------|
| Thumbnail | 150px | 150px | Grid previews, avatars |
| Medium | 500px | 500px | Blog posts, cards |
| Large | 1200px | 1200px | Hero images, galleries |

---

## Integration Examples

### Example 1: Booking with Permits & Multi-Language

```php
use App\Services\PermitService;
use App\Middleware\LocalizationMiddleware;

class BookingController extends Controller
{
    public function create(): void
    {
        $localization = new LocalizationMiddleware();
        $permitService = new PermitService();

        $routeId = $_GET['route_id'];
        $nationality = $_SESSION['nationality'] ?? 'Other';

        // Get route (translated)
        $route = $this->routeModel->find($routeId);
        $route = $localization->translate('route', $routeId, $route);

        // Calculate permits
        $permits = $permitService->calculatePermitCosts($routeId, $nationality);
        $permitTotal = array_sum(array_column($permits, 'cost'));

        // Calculate total
        $total = $route->base_price + $permitTotal;

        $this->view('booking.create', [
            'route' => $route,
            'permits' => $permits,
            'permit_total' => $permitTotal,
            'grand_total' => $total,
            'current_lang' => $localization->getCurrentLanguage()
        ]);
    }
}
```

### Example 2: Multi-Language Route Admin

```php
class RouteController extends Controller
{
    public function edit(): void
    {
        $this->requireAuth();

        $routeId = $_GET['id'];
        $route = $this->routeModel->find($routeId);

        $localization = new LocalizationMiddleware();
        $languages = $localization->getActiveLanguages();

        // Get existing translations
        $translations = [];
        foreach ($languages as $lang) {
            if ($lang->code !== 'en') {
                // Fetch translation
                $stmt = $this->db->prepare(
                    "SELECT field_name, translation_value
                     FROM content_translations
                     WHERE entity_type = 'route'
                     AND entity_id = :id
                     AND language_code = :lang"
                );
                $stmt->execute(['id' => $routeId, 'lang' => $lang->code]);
                $translations[$lang->code] = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
            }
        }

        $this->view('admin.routes.edit', [
            'route' => $route,
            'languages' => $languages,
            'translations' => $translations
        ]);
    }

    public function update(): void
    {
        $this->requireAuth();

        // Update main route
        $this->routeModel->update($_POST['id'], $_POST);

        // Update translations
        $localization = new LocalizationMiddleware();
        foreach ($_POST['translations'] as $lang => $fields) {
            foreach ($fields as $field => $value) {
                $localization->saveTranslation(
                    'route',
                    $_POST['id'],
                    $lang,
                    $field,
                    $value
                );
            }
        }

        $_SESSION['success'] = 'Route updated with translations!';
        $this->redirect('/admin/routes');
    }
}
```

### Example 3: Route with Images

```php
class RouteController extends Controller
{
    public function store(): void
    {
        $this->requireAuth();

        // Create route
        $routeId = $this->routeModel->create($_POST);

        // Handle image upload
        if (isset($_FILES['featured_image'])) {
            $mediaService = new MediaService();
            $result = $mediaService->upload(
                $_FILES['featured_image'],
                $_SESSION['user_id']
            );

            if ($result) {
                // Update route with media_id
                $this->routeModel->update($routeId, [
                    'media_id' => $result['id']
                ]);

                // Also attach to media_attachments for gallery
                $mediaModel = new Media();
                $mediaModel->attachToEntity(
                    $result['id'],
                    'route',
                    $routeId,
                    isFeatured: true
                );
            }
        }

        $_SESSION['success'] = 'Route created!';
        $this->redirect('/admin/routes');
    }
}
```

---

## Testing the Services

### Test Permit Service
```php
// Create test route and permit
// Then in a test controller:
$permitService = new PermitService();
$result = $permitService->calculatePermitCosts(1, 'SAARC');
var_dump($result);
```

### Test Localization
```php
// Set session language
$_SESSION['language'] = 'fr';

$localization = new LocalizationMiddleware();
echo $localization->getCurrentLanguage(); // 'fr'
echo $localization->url('/test'); // '/fr/test'
```

### Test Media Upload
```php
// Upload via admin panel at /admin/media
// Or test directly:
$mediaService = new MediaService();
$result = $mediaService->upload($_FILES['test'], 1);
print_r($result);
```

---

## Advanced Patterns

### Service Dependency Injection
```php
class BookingService
{
    public function __construct(
        private PermitService $permitService,
        private LocalizationMiddleware $localization
    ) {}

    public function createBooking(array $data): array
    {
        // Use injected services
        $permits = $this->permitService->calculatePermitCosts(
            $data['route_id'],
            $data['nationality']
        );

        // Translate confirmation message
        $route = $data['route'];
        $route = $this->localization->translate('route', $route->id, $route);

        // ... create booking
        return $booking;
    }
}
```

---

## Next Steps

1. **Implement in Admin Panel**
   - Add translation forms to route/blog edit pages
   - Show permit calculator in booking form
   - Integrate MediaService in all upload forms

2. **Create Frontend**
   - Language switcher in header
   - Permit wizard page
   - Route detail page with translated content

3. **Add More Services**
   - EmailService (booking confirmations)
   - PaymentService (Stripe, Khalti)
   - BookingService (availability checking)

---

**All three critical Phase 2 services are now complete and ready to use!**
