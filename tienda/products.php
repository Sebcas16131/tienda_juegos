<?php
require_once 'controllers/ProductController.php';

$controller = new ProductController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action === 'create') {
    $controller->create();
} elseif ($action === 'edit' && $id) {
    $controller->edit($id);
} elseif ($action === 'update') {
    $controller->update();
} elseif ($action === 'detail' && $id) {
    $controller->detail($id);
} elseif ($action === 'category' && $id) {
    $controller->viewByCategory($id);
}
elseif ($action === 'delete' && $id) {
    $controller->delete($id);
}
 else {
    $controller->index();
}
