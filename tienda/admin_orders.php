<?php
require_once 'controllers/OrderController.php';

$controller = new OrderController();
$action = $_GET['action'] ?? '';

if ($action === 'updateStatus') {
    $controller->updateStatus();
} elseif ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['order_id'] ?? null;
    if ($orderId) {
        $controller->delete($orderId);
    }
} else {
    $controller->adminOrders();
}