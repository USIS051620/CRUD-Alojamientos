<?php
// Configuración de la base de datos para XAMPP
if (!defined('DB_HOST')) define('DB_HOST', '127.0.0.1');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASS')) define('DB_PASS', '');
if (!defined('DB_NAME')) define('DB_NAME', 'alojamientos_db');

// Crear conexión a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Comprobar conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Opcional: establecer el conjunto de caracteres
$conn->set_charset("utf8mb4");

function refreshUserRole($pdo) {
    if (isset($_SESSION['user'])) {
        $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user']['id']]);
        $_SESSION['user']['is_admin'] = (bool)$stmt->fetchColumn();
    }
}
