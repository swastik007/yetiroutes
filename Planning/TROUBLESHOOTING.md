# Yeti Routes - Troubleshooting Guide

## Issue: Directory Listing Appears Instead of Application

### Problem
When accessing `http://yetiroutes.test`, you see a directory listing instead of the application.

### Cause
Your web server's DocumentRoot is pointing to the project root (`d:\server\yetiroutes\`) instead of the `public/` folder.

---

## ✅ **SOLUTION 1: Fix Laragon Virtual Host (RECOMMENDED)**

### Step 1: Open Laragon Apache Configuration
1. Right-click **Laragon tray icon** (bottom-right of Windows taskbar)
2. Click **Apache** → **sites-enabled** → **yetiroutes.test.conf**
3. If the file doesn't exist, create it

### Step 2: Update Configuration
Replace the content with:

```apache
<VirtualHost *:80>
    ServerName yetiroutes.test
    ServerAlias *.yetiroutes.test

    # CRITICAL: Point to public/ folder!
    DocumentRoot "D:/server/yetiroutes/public"

    <Directory "D:/server/yetiroutes/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog "C:/laragon/etc/apache2/logs/yetiroutes-error.log"
    CustomLog "C:/laragon/etc/apache2/logs/yetiroutes-access.log" combined
</VirtualHost>
```

**IMPORTANT**: Make sure `DocumentRoot` points to `D:/server/yetiroutes/public` (with `/public` at the end)

### Step 3: Restart Apache
1. Right-click **Laragon tray icon**
2. Click **Apache** → **Reload** (or restart Laragon)

### Step 4: Test
Go to: `http://yetiroutes.test/admin/login`

You should see the login page! ✅

---

## ✅ **SOLUTION 2: Quick Temporary Fix**

If you can't change the virtual host immediately:

### Option A: Access via /public/
Simply add `/public` to your URL:
- ❌ `http://yetiroutes.test/admin/login`
- ✅ `http://yetiroutes.test/public/admin/login`

### Option B: Use the Redirect (Already Created)
I've created two files that will redirect automatically:
- `index.php` (root)
- `.htaccess` (root)

Just refresh your browser - it should redirect to `/public/` automatically.

---

## ✅ **SOLUTION 3: Verify Apache Configuration**

### Check if mod_rewrite is enabled:

1. Open: `C:\laragon\bin\apache\apache-X.X.X\conf\httpd.conf`
2. Search for: `mod_rewrite.so`
3. Make sure this line is NOT commented (no `#` at the start):
   ```apache
   LoadModule rewrite_module modules/mod_rewrite.so
   ```
4. If you changed it, restart Apache

---

## Common Issues & Fixes

### Issue: "403 Forbidden" Error

**Solution**: Check directory permissions and Apache configuration:

```apache
<Directory "D:/server/yetiroutes/public">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted  ← Must be "all granted"
</Directory>
```

### Issue: "404 Not Found" on /admin pages

**Cause**: `.htaccess` not working or mod_rewrite disabled

**Solution**:
1. Enable mod_rewrite (see above)
2. Check `AllowOverride All` in virtual host
3. Verify `.htaccess` exists in `public/` folder

### Issue: "Database connection failed"

**Solution**: Update `config/config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'yetiroutes');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### Issue: Blank white page

**Solution**:
1. Check PHP error logs: `C:\laragon\etc\apache2\logs\error.log`
2. Enable error display in `public/index.php` (already enabled)
3. Check file permissions

---

## Verification Checklist

After fixing, verify these URLs work:

| URL | Expected Result |
|-----|-----------------|
| `http://yetiroutes.test` | Should redirect or show homepage |
| `http://yetiroutes.test/admin/login` | ✅ Login page appears |
| `http://yetiroutes.test/admin` | Redirects to login (if not logged in) |

---

## Testing the Fix

### Test 1: Login Page
```
URL: http://yetiroutes.test/admin/login
Expected: Beautiful login form with "Yeti Routes" title
```

### Test 2: Login
```
Email: admin@yetiroutes.com
Password: password
Expected: Redirects to dashboard with statistics
```

### Test 3: Dashboard
```
URL: http://yetiroutes.test/admin
Expected: Dashboard with stats (users, routes, bookings)
```

---

## Debug Mode

If issues persist, enable debug mode:

### 1. Check Apache Error Logs
```
Location: C:\laragon\etc\apache2\logs\error.log
```

### 2. Check PHP Errors
Already enabled in `public/index.php`:
```php
error_reporting(E_ALL);
ini_set('display_errors', '1');
```

### 3. Test Database Connection
Create `public/test-db.php`:
```php
<?php
require_once '../config/config.php';

try {
    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS
    );
    echo "✅ Database connected successfully!";
} catch (PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage();
}
```

Visit: `http://yetiroutes.test/test-db.php`

---

## Quick Reference: File Locations

```
yetiroutes/
├── public/              ← DocumentRoot should point HERE!
│   ├── index.php       ← Main entry point
│   └── .htaccess       ← Rewrite rules
├── config/
│   └── config.php      ← Database credentials
├── app/
│   └── ...
└── logs/               ← Application logs
```

---

## Still Not Working?

### Option 1: Use PHP Built-in Server (Quick Test)
```bash
cd public
php -S localhost:8000
```
Then visit: `http://localhost:8000/admin/login`

### Option 2: Check Laragon Status
1. Open Laragon
2. Verify Apache is running (green light)
3. Click "Start All" if needed

### Option 3: Restart Everything
1. Stop Laragon
2. Close all browsers
3. Start Laragon
4. Try again

---

## Contact Points

If you see these, you're on the right track:

| What You See | Status |
|--------------|--------|
| Directory listing | ❌ DocumentRoot is wrong |
| 404 Error | ❌ Routing not working |
| 403 Forbidden | ❌ Permissions issue |
| Database error | ⚠️ Check config/config.php |
| Login page | ✅ Everything is working! |

---

**After applying Solution 1, your URLs should work:**
- ✅ `http://yetiroutes.test/admin/login`
- ✅ `http://yetiroutes.test/admin`
- ✅ `http://yetiroutes.test/admin/routes`

Good luck! 🚀
