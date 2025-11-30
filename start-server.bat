@echo off
echo Starting Yeti Routes Development Server...
echo.
echo Access your application at: http://localhost:8000
echo Admin Login: http://localhost:8000/admin/login
echo.
echo Press Ctrl+C to stop the server
echo.
cd public
php -S localhost:8000
pause
