<?php
// Úsalo solo si quieres crear rápidamente un admin con contraseña 'admin123' (hasheada)
require_once __DIR__ . '/app/init.php';
$db = Database::getInstance();
$email = 'admin@admin.com';
$exists = $db->prepare('SELECT id FROM users WHERE email = ?');
$exists->execute([$email]);
if ($exists->fetch()) {
    echo 'Admin ya existe.';
    exit;
}
$hash = password_hash('admin123', PASSWORD_DEFAULT);
$stmt = $db->prepare('INSERT INTO users (name,email,password,is_admin) VALUES (?, ?, ?, 1)');
$stmt->execute(['Administrador', $email, $hash]);
echo 'Admin creado: admin@admin.com / admin123';
