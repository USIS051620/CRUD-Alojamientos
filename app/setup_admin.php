<?php
// Script de conveniencia - ejecutar una vez desde el navegador (por ejemplo: http://localhost/Alojamientos/app/setup_admin.php)
// Creará un usuario administrador con email admin@example.com y contraseña admin123 si no existe.
require_once __DIR__ . '/config/config.php';

echo "<h2>Configuración de admin (conveniencia)</h2>";

// Crear conexión a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Comprobar la conexión
if ($conn->connect_error) { 
    echo "Error de conexión a la base de datos: " . $conn->connect_error; 
    exit; 
}

// Verificar si el administrador ya existe
$r = $conn->query("SELECT id FROM users WHERE email='admin@example.com' LIMIT 1");

if ($r && $r->num_rows) {
    echo "El administrador ya existe.";
} else {
    // Crear el administrador por defecto
    $hash = password_hash('admin123', PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name,email,password,is_admin) VALUES (?,?,?,1)");
    $name = 'Admin'; 
    $email = 'admin@example.com'; 
    $stmt->bind_param('sss', $name, $email, $hash);

    if ($stmt->execute()) 
        echo "Administrador creado (admin@example.com / admin123)";
    else 
        echo "Error al crear el administrador.";
}

// Cerrar la conexión
$conn->close();
