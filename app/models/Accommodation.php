<?php
require_once __DIR__ . '/Database.php';
class Accommodation {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getInstance();
    }
    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM accommodations ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }
    public function findById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM accommodations WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($title, $description, $price, $image = '') {
        $stmt = $this->pdo->prepare('INSERT INTO accommodations (title, description, price, image) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$title, $description, $price, $image]);
    }
    public function update($id, $title, $description, $price, $image = '') {
        $stmt = $this->pdo->prepare('UPDATE accommodations SET title = ?, description = ?, price = ?, image = ? WHERE id = ?');
        return $stmt->execute([$title, $description, $price, $image, $id]);
    }
    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM accommodations WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
