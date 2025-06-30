<?php
require_once 'controllers/CategoryController.php';

$controller = new CategoryController();
$action = $_GET['action'] ?? 'index';

if ($action === 'create') {
    $controller->create();
} else {
    $controller->index();
}
