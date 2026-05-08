# Yeti Routes Backend Setup Guide

## Quick Start (5 Minutes)

### Step 1: Database Setup
```bash
# 1. Create database
mysql -u root -p
CREATE DATABASE yetiroutes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;

# 2. Import schema
mysql -u root -p yetiroutes < schema-v17.md

# 3. Import initial data (creates admin user)
mysql -u root -p yetiroutes < setup-initial-data.sql
```

### Step 2: Configure Database Connection
Edit `config/config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'yetiroutes');
define('DB_USER', 'root');        // Change this
define('DB_PASS', '');            // Change this
```

### Step 3: Set File Permissions
```bash
# Make uploads directory writable
chmod 755 public/uploads/

# Make logs directory writable
chmod 755 logs/
```

### Step 4: Configure Web Server

#### Option A: Using Laragon (Recommended for Windows)
1. Add your project to Laragon's www folder or use current location
2. Right-click Laragon tray icon → Apache → httpd.conf
3. Add this virtual host:
```apache
<VirtualHost *:80>
    ServerName yetiroutes.local
    DocumentRoot "D:/server/yetiroutes/public"

    <Directory "D:/server/yetiroutes/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
4. Add to `C:\Windows\System32\drivers\etc\hosts`:
```
127.0.0.1 yetiroutes.local
```
5. Restart Apache in Laragon

#### Option B: Using XAMPP
1. Edit `C:\xampp\apache\conf\extra\httpd-vhosts.conf`
2. Add the same virtual host configuration above
3. Add to hosts file
4. Restart Apache

#### Option C: PHP Built-in Server (Development Only)
```bash
cd public
php -S localhost:8000
```

### Step 5: Access Admin Panel
Open your browser and go to:
- **URL**: http://yetiroutes.local/admin/login (or http://localhost:8000/admin/login)
- **Email**: admin@yetiroutes.com
- **Password**: password

**⚠️ IMPORTANT**: Change the admin password after first login!

---

## Verify Installation

### Test Database Connection
Visit: http://yetiroutes.local/
- If you see "Database connection successful!", everything is working!

### Test Admin Login
1. Go to: http://yetiroutes.local/admin/login
2. Login with credentials above
3. You should see the dashboard with statistics

### Check PHP Requirements
```bash
php -v  # Should be 8.0 or higher
```

Required PHP Extensions:
- PDO
- PDO_MySQL
- mbstring
- json
- OpenSSL

---

## Project Structure Overview

```
yetiroutes/
├── app/
│   ├── Core/              # Framework core files
│   │   ├── Autoloader.php
│   │   ├── Database.php
│   │   ├── Router.php
│   │   ├── Model.php
│   │   └── Controller.php
│   ├── Models/            # Database models
│   │   ├── User.php
│   │   ├── Route.php
│   │   ├── Booking.php
│   │   └── ...
│   ├── Controllers/       # Business logic
│   │   ├── AuthController.php
│   │   ├── AdminController.php
│   │   └── ...
│   └── Views/             # HTML templates
│       ├── layouts/
│       ├── auth/
│       └── admin/
├── config/
│   └── config.php         # Database config
├── public/                # Web root (point Apache here!)
│   ├── index.php         # Entry point
│   ├── .htaccess         # Rewrite rules
│   └── uploads/          # Media files
└── logs/                  # Application logs
```

---

## Available Admin Routes

### Authentication
| Method | Route | Description |
|--------|-------|-------------|
| GET | /admin/login | Login page |
| POST | /admin/login | Process login |
| GET | /admin/logout | Logout |

### Dashboard
| Method | Route | Description |
|--------|-------|-------------|
| GET | /admin | Dashboard with stats |

### Routes Management
| Method | Route | Description |
|--------|-------|-------------|
| GET | /admin/routes | List all routes |
| GET | /admin/routes/create | Create route form |
| POST | /admin/routes/store | Save new route |
| GET | /admin/routes/edit?id=X | Edit route form |
| POST | /admin/routes/update | Update route |
| POST | /admin/routes/delete | Delete route |

### Users
| Method | Route | Description |
|--------|-------|-------------|
| GET | /admin/users | List all users |
| POST | /admin/users/store | Create user |
| POST | /admin/users/delete | Delete user |

### Bookings
| Method | Route | Description |
|--------|-------|-------------|
| GET | /admin/bookings | List bookings |
| GET | /admin/bookings/view?id=X | View details |

### Others
- `/admin/locations` - Location management
- `/admin/blog` - Blog management
- `/admin/media` - Media library

---

## Sample Data Included

After running `setup-initial-data.sql`, you'll have:

✅ **Admin User**
- Email: admin@yetiroutes.com
- Password: password

✅ **Sample Locations**
- Nepal (with Everest, Annapurna, Langtang regions)
- Tibet

✅ **Sample Route**
- Everest Base Camp Trek (14 days, $1,299)
- 4 departures scheduled for 2025

✅ **Languages**
- English, French, German

✅ **Categories**
- Blog categories
- FAQ categories

✅ **Other**
- Sustainability projects
- Rental gear items
- Semantic tags

---

## Common Issues & Solutions

### Issue: "Database connection failed"
**Solution**: Check `config/config.php` credentials

### Issue: "404 Not Found" on admin pages
**Solution**:
1. Ensure `.htaccess` exists in `public/` folder
2. Enable `mod_rewrite` in Apache
3. Check `AllowOverride All` in virtual host

### Issue: "Class not found" errors
**Solution**:
1. Verify autoloader is working
2. Check namespace declarations match folder structure
3. Clear any opcode cache (restart Apache)

### Issue: Can't upload media
**Solution**:
```bash
chmod 755 public/uploads/
```

### Issue: Page shows blank/white screen
**Solution**:
1. Check `logs/` directory for errors
2. Enable error display in `public/index.php` (line 13-14)
3. Check PHP error logs

---

## Security Checklist

Before going to production:

- [ ] Change admin password
- [ ] Update database credentials in `config/config.php`
- [ ] Disable error display (`ini_set('display_errors', '0')`)
- [ ] Set proper file permissions (755 for directories, 644 for files)
- [ ] Enable HTTPS/SSL
- [ ] Configure backups
- [ ] Set up firewall rules
- [ ] Review `.htaccess` security headers

---

## Development Tips

### Adding New Routes
Edit `app/Core/Router.php` → `loadRoutes()` method

### Creating New Models
1. Create file in `app/Models/`
2. Extend `App\Core\Model`
3. Set `$table` and `$fillable` properties

### Creating New Controllers
1. Create file in `app/Controllers/`
2. Extend `App\Core\Controller`
3. Add methods for each action
4. Register routes in Router

### Database Queries
```php
// Using Model
$routes = $routeModel->all();
$route = $routeModel->find(1);
$routes = $routeModel->where('difficulty', 'challenging');

// Custom queries
$results = $routeModel->query("SELECT * FROM routes WHERE ...", $params);
```

---

## Next Development Steps

1. **Implement Permit Calculator**
   - Create `app/Services/PermitService.php`
   - Parse JSON nationality rules
   - Calculate costs dynamically

2. **Add Multi-Language Support**
   - Create `app/Middleware/LocalizationMiddleware.php`
   - Fetch translations from `content_translations` table
   - Implement language switcher

3. **Payment Integration**
   - Stripe API
   - Khalti (Nepal payment gateway)
   - Bank transfer processing

4. **Email Notifications**
   - Booking confirmations
   - Payment receipts
   - Trip reminders

5. **Build Frontend Website**
   - Route listing page
   - Route detail page
   - Booking flow
   - User dashboard

---

## Support

For questions or issues:
1. Check README.md
2. Review database schema (schema-v17.md)
3. Check development plan (webdevelopmentplan.txt)

**Happy Coding! 🏔️**
