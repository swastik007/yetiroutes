<?php
// Generate bcrypt hash for admin password
// DELETE THIS FILE AFTER USE!

$password = 'Chyangba@13';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password: " . $password . "\n";
echo "Hash: " . $hash . "\n\n";
echo "SQL Command:\n";
echo "UPDATE users SET password_hash = '" . $hash . "' WHERE email = 'admin@yetiroutes.com';\n";
