<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require BASE_PATH . '/app/views/templates/header.php';
        require BASE_PATH . '/app/views/' . $view . '.php';
        require BASE_PATH . '/app/views/templates/footer.php';
    }
    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}
