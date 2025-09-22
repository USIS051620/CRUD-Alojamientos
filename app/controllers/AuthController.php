<?php
require_once __DIR__ . '/../models/User.php';
class AuthController {
    private $model;
    public function __construct() {
        $this->model = new User();
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            if ($name && $email && $password) {
                $existing = $this->model->findByEmail($email);
                if ($existing) $error = 'Ya existe un usuario con ese correo.';
                else {
                    $this->model->create($name,$email,$password,0);
                    header('Location: index.php?page=auth&action=login');
                    exit;
                }
            } else $error = 'Complete todos los campos.';
        }
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/auth/register.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $user = $this->model->verifyCredentials($email,$password);
            if ($user) {
                $_SESSION['user'] = ['id'=>$user['id'],'name'=>$user['name'],'email'=>$user['email'],'is_admin'=>$user['is_admin']];
                header('Location: index.php?page=user&action=account');
                exit;
            } else $error = 'Credenciales incorrectas.';
        }
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/auth/login.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
