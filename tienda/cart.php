<?php
require_once 'controllers/CartController.php';

$controller = new CartController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action === 'add' && $id) {
    $controller->add($id);
} elseif ($action === 'remove' && $id) {
    $controller->remove($id);
} elseif ($action === 'increase' && $id) {
    $controller->increase($id);
} elseif ($action === 'decrease' && $id) {
    $controller->decrease($id);
} else {
    $controller->index();
}
