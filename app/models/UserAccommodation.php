<?php
require_once __DIR__ . '/Database.php';
class UserAccommodation {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getInstance();
    }
    public function add($user_id, $alojamiento_id) {
        $stmt = $this->pdo->prepare('SELECT id FROM user_accommodations WHERE user_id = ? AND alojamiento_id = ?');
        $stmt->execute([$user_id, $alojamiento_id]);
        if ($stmt->fetch()) return false;
        $stmt = $this->pdo->prepare('INSERT INTO user_accommodations (user_id, alojamiento_id) VALUES (?, ?)');
        return $stmt->execute([$user_id, $alojamiento_id]);
    }
    public function remove($user_id, $alojamiento_id) {
        $stmt = $this->pdo->prepare('DELETE FROM user_accommodations WHERE user_id = ? AND alojamiento_id = ?');
        return $stmt->execute([$user_id, $alojamiento_id]);
    }
    public function getByUser($user_id) {
        $stmt = $this->pdo->prepare('SELECT a.* FROM accommodations a JOIN user_accommodations ua ON ua.alojamiento_id = a.id WHERE ua.user_id = ? ORDER BY ua.created_at DESC');
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
    public function userHas($user_id, $alojamiento_id) {
        $stmt = $this->pdo->prepare('SELECT id FROM user_accommodations WHERE user_id = ? AND alojamiento_id = ? LIMIT 1');
        $stmt->execute([$user_id, $alojamiento_id]);
        return (bool)$stmt->fetch();
    }
}
