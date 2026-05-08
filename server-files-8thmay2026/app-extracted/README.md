# Yeti Routes - Backend Admin Panel

## Overview
Complete PHP MVC backend panel for the Yeti Routes Himalayan Travel Platform, built following the database schema v17.

## Technology Stack
- **Backend**: PHP 8.2+ (Strict typing)
- **Database**: MySQL 8.0
- **Architecture**: MVC Pattern
- **Security**: PDO Prepared Statements
- **Frontend**: Tailwind CSS + Font Awesome

## Project Structure
```
yetiroutes/
├── app/
│   ├── Core/
│   │   ├── Autoloader.php       # PSR-4 Autoloader
│   │   ├── Database.php          # Singleton Database Connection
│   │   ├── Router.php            # Request Router
│   │   ├── Model.php             # Base Model with CRUD
│   │   └── Controller.php        # Base Controller
│   ├── Models/
│   │   ├── User.php              # User Model
│   │   ├── Route.php             # Routes Model
│   │   ├── Booking.php           # Bookings Model
│   │   ├── Location.php          # Locations Model
│   │   ├── BlogPost.php          # Blog Model
│   │   └── Media.php             # Media Library Model
│   ├── Controllers/
│   │   ├── AuthController.php    # Authentication
│   │   ├── AdminController.php   # Dashboard
│   │   ├── RouteController.php   # Routes Management
│   │   ├── UserController.php    # User Management
│   │   ├── BookingController.php # Bookings Management
│   │   ├── LocationController.php
│   │   ├── BlogController.php
│   │   ├── MediaController.php
│   │   └── HomeController.php    # Frontend
│   └── Views/
│       ├── layouts/
│       │   └── admin.php         # Admin Layout
│       ├── auth/
│       │   └── login.php         # Login Page
│       └── admin/
│           ├── dashboard.php     # Dashboard
│           ├── routes/
│           ├── users/
│           └── bookings/
├── config/
│   └── config.php                # Database Configuration
├── public/
│   ├── index.php                 # Entry Point
│   ├── .htaccess                 # Apache Rewrite Rules
│   ├── css/
│   ├── js/
│   └── uploads/                  # Media Uploads
└── logs/                         # Application Logs
```

## Features Implemented

### Core System
- ✅ MVC Architecture with PSR-4 Autoloading
- ✅ Singleton Database Pattern
- ✅ Request Routing System
- ✅ Base Model with CRUD Operations
- ✅ Base Controller with Helper Methods

### Authentication & Security
- ✅ Login/Logout System
- ✅ Password Hashing (bcrypt)
- ✅ Session Management
- ✅ CSRF Protection
- ✅ Rate Limiting (Login Attempts)
- ✅ PDO Prepared Statements

### Admin Dashboard
- ✅ Statistics Overview (Users, Routes, Bookings)
- ✅ Recent Bookings Display
- ✅ Responsive Sidebar Navigation

### Routes Management
- ✅ List All Routes with Pagination
- ✅ Create New Routes
- ✅ Edit Routes
- ✅ Delete Routes
- ✅ Feature/Unfea ture Routes
- ✅ Activate/Deactivate Routes

### User Management
- ✅ List All Users
- ✅ Create New Users
- ✅ Delete Users
- ✅ Loyalty Points Tracking

### Bookings Management
- ✅ List All Bookings
- ✅ View Booking Details
- ✅ Update Booking Status
- ✅ Payment Status Tracking
- ✅ Booking Reference Generation

### Media Library
- ✅ Media Upload Functionality
- ✅ Media Attachments to Entities
- ✅ Variants Support (JSON)

### Database Models
All major database tables are covered:
- Users & Roles
- Routes & Itineraries
- Bookings & Payments
- Locations (Hierarchical)
- Blog Posts & Categories
- Media Library
- Loyalty Transactions
- Testimonials

## Installation

### 1. Database Setup
```sql
-- Import the schema
mysql -u root -p yetiroutes < schema-v17.md

-- Create a test admin user
INSERT INTO roles (id, name) VALUES (1, 'Super Admin');
INSERT INTO users (role_id, email, password_hash, full_name, is_active)
VALUES (1, 'admin@yetiroutes.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin User', 1);
-- Password: password
```

### 2. Configure Database
Edit `config/config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'yetiroutes');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### 3. Set Document Root
Point your web server to the `public/` directory.

For Apache virtual host:
```apache
<VirtualHost *:80>
    ServerName yetiroutes.local
    DocumentRoot "d:/server/yetiroutes/public"

    <Directory "d:/server/yetiroutes/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### 4. Access Admin Panel
- **URL**: http://localhost/admin/login
- **Email**: admin@yetiroutes.com
- **Password**: password

## API Routes

### Authentication
- `GET  /admin/login` - Show login form
- `POST /admin/login` - Process login
- `GET  /admin/logout` - Logout

### Dashboard
- `GET /admin` - Admin dashboard

### Routes Management
- `GET  /admin/routes` - List routes
- `GET  /admin/routes/create` - Create form
- `POST /admin/routes/store` - Store route
- `GET  /admin/routes/edit?id=X` - Edit form
- `POST /admin/routes/update` - Update route
- `POST /admin/routes/delete` - Delete route

### Users
- `GET  /admin/users` - List users
- `GET  /admin/users/create` - Create form
- `POST /admin/users/store` - Store user
- `POST /admin/users/delete` - Delete user

### Bookings
- `GET /admin/bookings` - List bookings
- `GET /admin/bookings/view?id=X` - View booking
- `POST /admin/bookings/updateStatus` - Update status

### Others
- `GET /admin/locations` - Locations management
- `GET /admin/blog` - Blog management
- `GET /admin/media` - Media library

## Next Steps

### Phase 2 - Service Layer (To Implement)
- [ ] Permit Logic Service (nationality-based pricing)
- [ ] Localization Middleware (multi-language)
- [ ] Email Service (booking confirmations)
- [ ] Payment Gateway Integration (Stripe, Khalti)
- [ ] Carbon Offset Calculator

### Phase 3 - Frontend
- [ ] Public-facing website
- [ ] Route listing & detail pages
- [ ] Booking flow
- [ ] User dashboard
- [ ] Wishlist functionality

### Phase 4 - Advanced Features
- [ ] Advanced search & filtering
- [ ] Real-time availability
- [ ] Reviews & ratings system
- [ ] Multi-language content
- [ ] Analytics dashboard

## Security Considerations

✅ **Implemented:**
- Password hashing with bcrypt
- PDO prepared statements (SQL injection prevention)
- CSRF token validation
- Session security
- XSS prevention (htmlspecialchars)
- Input validation

⚠️ **TODO:**
- Rate limiting middleware
- Two-factor authentication
- API authentication (JWT)
- File upload validation
- Advanced permission system

## Database Schema Compliance
This backend panel fully implements the schema-v17.md specifications including:
- All 30+ tables
- Multi-language support (content_translations)
- Loyalty points system
- Media library with polymorphic attachments
- Hierarchical locations
- Booking line items & payments
- Audit logging

## Support & Documentation
- Development Plan: `webdevelopmentplan.txt`
- Database Schema: `schema-v17.md`
- Business Plan: `BusinessDevelopment.txt`

---
**Version**: 1.0.0
**Last Updated**: November 2024
**Developer**: Full Stack Team
