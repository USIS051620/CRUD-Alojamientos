<?php
require_once __DIR__ . '/../app/init.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/models/Database.php';

// Crear instancia PDO para usar en refresh
$pdo = Database::getInstance();

// Refrescar rol del usuario en cada request
refreshUserRole($pdo);

// -------- Enrutador --------
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

switch ($page) {
    case 'home':
        (new HomeController())->index();
        break;
    case 'auth':
        $c = new AuthController();
        if ($action === 'login') $c->login();
        elseif ($action === 'register') $c->register();
        elseif ($action === 'logout') $c->logout();
        else $c->login();
        break;
    case 'user':
        $c = new UserController();
        if ($action === 'account') $c->account();
        elseif ($action === 'add') $c->addAccommodationToUser();
        elseif ($action === 'remove') $c->removeAccommodationFromUser();
        else $c->account();
        break;
    case 'admin':
        $c = new AdminController();
        if ($action === 'index') $c->index();
        elseif ($action === 'create') $c->create();
        elseif ($action === 'edit') $c->edit();
        elseif ($action === 'delete') $c->delete();
        else $c->index();
        break;
    default:
        (new HomeController())->index();
}
