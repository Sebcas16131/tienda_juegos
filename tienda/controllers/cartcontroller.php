<?php
require_once 'models/Product.php';

class CartController {
    public function add($id) {
        session_start();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $productModel = new Product();
        $product = $productModel->getById($id);

        if (!$product) {
            header('Location: cart.php');
            exit;
        }

        // Si ya está en el carrito
        if (isset($_SESSION['cart'][$id])) {
            $currentQty = $_SESSION['cart'][$id]['quantity'];
            if ($currentQty < $product['stock']) {
                $_SESSION['cart'][$id]['quantity']++;
            } else {
                $_SESSION['error'] = "No puedes agregar más de este producto. Stock máximo alcanzado.";
            }
        } else {
            // Si no está en el carrito y hay stock
            if ($product['stock'] > 0) {
                $_SESSION['cart'][$id] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'quantity' => 1
                ];
            } else {
                $_SESSION['error'] = "Este producto no tiene stock disponible.";
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
        $productModel = new Product();
        $product = $productModel->getById($id);

        if (isset($_SESSION['cart'][$id]) && $product) {
            if ($_SESSION['cart'][$id]['quantity'] < $product['stock']) {
                $_SESSION['cart'][$id]['quantity']++;
            } else {
                $_SESSION['error'] = "Stock insuficiente para aumentar la cantidad.";
            }
        }
        header('Location: cart.php');
    }

    public function decrease($id) {
        session_start();
        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['quantity'] > 1) {
                $_SESSION['cart'][$id]['quantity']--;
            } else {
                unset($_SESSION['cart'][$id]);
            }
        }
        header('Location: cart.php');
    }
}
