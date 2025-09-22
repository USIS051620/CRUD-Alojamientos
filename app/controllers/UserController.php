<?php
require_once __DIR__ . '/../models/UserAccommodation.php';
class UserController {
    private $uaModel;
    public function __construct() {
        $this->uaModel = new UserAccommodation();
    }
    private function requireLogin() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=auth&action=login');
            exit;
        }
    }
    public function account() {
        $this->requireLogin();
        $user = $_SESSION['user'];
        $selected = $this->uaModel->getByUser($user['id']);
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/user/account.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
    public function addAccommodationToUser() {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $acc_id = intval($_POST['accommodation_id'] ?? 0);
            $user_id = $_SESSION['user']['id'];
            $this->uaModel->add($user_id, $acc_id);
        }
        header('Location: index.php');
        exit;
    }
    public function removeAccommodationFromUser() {
        $this->requireLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $acc_id = intval($_POST['accommodation_id'] ?? 0);
            $user_id = $_SESSION['user']['id'];
            $this->uaModel->remove($user_id, $acc_id);
        }
        header('Location: index.php?page=user&action=account');
        exit;
    }
}
