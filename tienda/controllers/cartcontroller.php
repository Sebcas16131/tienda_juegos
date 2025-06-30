<?php
require_once 'models/Product.php';

class CartController {
    public function add($id) {
        session_start();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $productModel = new Product();
            $product = $productModel->getById($id);
            if ($product) {
                $_SESSION['cart'][$id] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'quantity' => 1
                ];
            }
        }

        header('Location: cart.php');
        exit;
    }

    public function index() {
        session_start();
        $cart = $_SESSION['cart'] ?? [];
        require 'views/cart/index.php';
    }

    public function remove($id) {
        session_start();
        unset($_SESSION['cart'][$id]);
        header('Location: cart.php');
    }

    public function increase($id) {
        session_start();
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        }
        header('Location: cart.php');
    }

    public function decrease($id) {
        session_start();
        if (isset($_SESSION['cart'][$id]) && $_SESSION['cart'][$id]['quantity'] > 1) {
            $_SESSION['cart'][$id]['quantity']--;
        } else {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: cart.php');
    }
}
