<?php
require_once 'models/Product.php';

class ProductController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();
        require 'views/product/index.php';
    }

    public function create() {
        $productModel = new Product();
        $categories = $productModel->getCategories();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            // Subir imagen
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $filename = time() . '_' . $_FILES['image']['name'];
                $destination = 'public/uploads/' . $filename;
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                $image = $filename;
            }

            if ($name && $price && $category_id) {
                $productModel->save($name, $description, $price, $image, $category_id);
                header('Location: products.php');
                exit;
            } else {
                $error = "Todos los campos son obligatorios.";
            }
        }

        require 'views/product/create.php';
    }
    public function viewByCategory($id) {
    $productModel = new Product();
    $products = $productModel->getByCategory($id);
    require 'views/product/category.php';
}
public function detail($id) {
    $productModel = new Product();
    $product = $productModel->getById($id);
    require 'views/product/detail.php';
}
public function edit($id) {
    $productModel = new Product();
    $product = $productModel->getById($id);

    require 'views/product/edit.php';
}

public function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];

        $image = null;

        // Si se sube una nueva imagen
        if (!empty($_FILES['image']['name'])) {
            $image = time() . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "public/uploads/" . $image);
        }

        $productModel = new Product();
        $productModel->update($id, $name, $price, $description, $category_id, $image);

        header('Location: products.php');
        exit;

    }
}
public function delete($id) {
    $productModel = new Product();
    $productModel->delete($id);

    header('Location: products.php');
    exit;
}


}
?>
