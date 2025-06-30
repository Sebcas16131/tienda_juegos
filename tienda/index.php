<?php
require_once 'models/Product.php';
require_once 'models/Category.php';

$productModel = new Product();
$categoryModel = new Category();

$search = $_GET['search'] ?? '';
$category_id = $_GET['category'] ?? '';

if (!empty($search) || !empty($category_id)) {
    $products = $productModel->search($search, $category_id ?: null);
} else {
    $products = $productModel->getAll();
}

$categories = $categoryModel->getAll();

require 'views/home/index.php';
