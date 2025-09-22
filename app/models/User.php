<?php
require_once __DIR__ . '/Database.php';
class User {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getInstance();
    }
    public function create($name, $email, $password, $is_admin = 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO users (name,email,password,is_admin) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$name, $email, $hash, $is_admin]);
    }
    public function findByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    public function findById($id) {
        $stmt = $this->pdo->prepare('SELECT id,name,email,is_admin FROM users WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function verifyCredentials($email, $password) {
        $user = $this->findByEmail($email);
        if (!$user) return false;
        if (password_verify($password, $user['password'])) return $user;
        return false;
    }
}
