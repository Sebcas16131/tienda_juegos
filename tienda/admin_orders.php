<?php
require_once 'controllers/OrderController.php';

$controller = new OrderController();
$action = $_GET['action'] ?? '';

if ($action === 'updateStatus') {
    $controller->updateStatus();
} else {
    $controller->adminOrders();
}
