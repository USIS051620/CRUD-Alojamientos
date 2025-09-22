<?php
require_once __DIR__ . '/../models/Accommodation.php';
class AdminController {
    private $model;
    public function __construct() {
        $this->model = new Accommodation();
    }
    private function requireAdmin() {
        if (!isset($_SESSION['user']) || !$_SESSION['user']['is_admin']) {
            header('Location: index.php');
            exit;
        }
    }
    public function index() {
        $this->requireAdmin();
        $list = $this->model->getAll();
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/admin/index.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
    public function create() {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = floatval($_POST['price'] ?? 0);
            $image = trim($_POST['image'] ?? '');
            if ($title) {
                $this->model->create($title,$description,$price,$image);
                header('Location: index.php?page=admin&action=index');
                exit;
            } else $error = 'El título es obligatorio.';
        }
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/admin/create.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
    public function edit() {
        $this->requireAdmin();
        $id = intval($_GET['id'] ?? 0);
        $item = $this->model->findById($id);
        if (!$item) { header('Location: index.php?page=admin&action=index'); exit; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = floatval($_POST['price'] ?? 0);
            $image = trim($_POST['image'] ?? '');
            if ($title) {
                $this->model->update($id,$title,$description,$price,$image);
                header('Location: index.php?page=admin&action=index');
                exit;
            } else $error = 'El título es obligatorio.';
        }
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/admin/edit.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
    public function delete() {
        $this->requireAdmin();
        $id = intval($_GET['id'] ?? 0);
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?page=admin&action=index');
        exit;
    }
}
