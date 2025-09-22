<?php
session_start();
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'alojamientos_db');
define('DB_USER', 'root');
define('DB_PASS', '');

require_once __DIR__ . '/models/Database.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/Accommodation.php';
require_once __DIR__ . '/models/UserAccommodation.php';

require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/AdminController.php';
