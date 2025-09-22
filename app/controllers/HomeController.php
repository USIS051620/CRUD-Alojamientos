<?php
require_once __DIR__ . '/../models/Accommodation.php';
class HomeController {
    private $accommodationModel;
    public function __construct() {
        $this->accommodationModel = new Accommodation();
    }
    public function index() {
        $accommodations = $this->accommodationModel->getAll();
        include __DIR__ . '/../views/layout/header.php';
        include __DIR__ . '/../views/home.php';
        include __DIR__ . '/../views/layout/footer.php';
    }
}
