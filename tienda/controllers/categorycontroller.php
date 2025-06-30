<?php
require_once 'models/Category.php';

class CategoryController {
    public function index() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        require 'views/category/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            if (!empty($name)) {
                $categoryModel = new Category();
                $categoryModel->save($name);
                header('Location: categories.php');
                exit;
            } else {
                $error = "El nombre es obligatorio.";
            }
        }

        require 'views/category/create.php';
    }
}
?>
