<?php
require_once 'models/Order.php';

class OrderController {
    public function create() {
        session_start();
        $user = $_SESSION['user'] ?? null;
        $cart = $_SESSION['cart'] ?? [];

        if (!$user || empty($cart)) {
            header('Location: cart.php'); // Requiere login y tener productos
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address = $_POST['address'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $payment = $_POST['payment_method'] ?? '';

            if ($address && $phone && $payment) {
                $orderModel = new Order();
                $orderModel->save($user['id'], $address, $phone, $payment, $cart);

                unset($_SESSION['cart']); // Vacía el carrito
                $success = true;
            } else {
                $error = "Todos los campos son obligatorios.";
            }
        }

        require 'views/order/create.php';
    }
    public function myOrders() {
    session_start();
    $user = $_SESSION['user'] ?? null;

    if (!$user) {
        header('Location: login.php');
        exit;
    }

    $orderModel = new Order();
    $orders = $orderModel->getByUser($user['id']);

    // Cargar productos de cada pedido
    foreach ($orders as &$order) {
        $order['items'] = $orderModel->getItems($order['id']);
    }

    require 'views/order/my_orders.php';
}
public function adminOrders() {
    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: index.php');
        exit;
    }

    $orderModel = new Order();
    $orders = $orderModel->getAll();

    foreach ($orders as &$order) {
        $order['items'] = $orderModel->getItems($order['id']);
    }

    require 'views/order/admin_orders.php';
}

public function updateStatus() {
    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: index.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $order_id = $_POST['order_id'] ?? null;
        $status = $_POST['status'] ?? null;

        if ($order_id && $status) {
            $orderModel = new Order();
            $orderModel->updateStatus($order_id, $status);
        }
    }

    header('Location: admin_orders.php');
}

}
