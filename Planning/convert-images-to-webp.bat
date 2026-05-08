@echo off
REM Windows Batch Script for WebP Conversion
REM Double-click this file to run it

echo.
echo ===============================================================
echo   WebP Image Conversion Tool - Yeti Routes
echo ===============================================================
echo.

REM Try common PHP locations
set PHP_PATH=

REM Check if php is in PATH
where php >nul 2>&1
if %errorlevel% equ 0 (
    set PHP_PATH=php
    goto :run
)

REM Check common XAMPP location
if exist "C:\xampp\php\php.exe" (
    set PHP_PATH=C:\xampp\php\php.exe
    goto :run
)

REM Check common Laragon location
if exist "C:\laragon\bin\php\php.exe" (
    set PHP_PATH=C:\laragon\bin\php\php.exe
    goto :run
)

REM Check WAMP location
if exist "C:\wamp64\bin\php\php.exe" (
    set PHP_PATH=C:\wamp64\bin\php\php.exe
    goto :run
)

REM PHP not found
echo ERROR: PHP not found!
echo.
echo Please install PHP or update this script with the correct path.
echo Common locations:
echo   - XAMPP: C:\xampp\php\php.exe
echo   - Laragon: C:\laragon\bin\php\php-8.x\php.exe
echo   - WAMP: C:\wamp64\bin\php\php8.x\php.exe
echo.
echo Or add PHP to your system PATH.
echo.
pause
exit /b 1

:run
echo Found PHP at: %PHP_PATH%
echo.
echo Starting conversion...
echo.

"%PHP_PATH%" "%~dp0convert-images-to-webp.php"

if %errorlevel% equ 0 (
    echo.
    echo ===============================================================
    echo   Conversion completed successfully!
    echo ===============================================================
) else (
    echo.
    echo ===============================================================
    echo   An error occurred during conversion.
    echo   Check the output above for details.
    echo ===============================================================
)

echo.
echo Press any key to exit...
pause >nul
