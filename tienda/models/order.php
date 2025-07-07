<?php
require_once 'config/database.php';

class Order {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function save($user_id, $address, $phone, $payment_method, $cart) {
    try {
        $this->conn->beginTransaction();

        // Insertar pedido principal
        $sql = "INSERT INTO orders (user_id, address, phone, payment_method) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id, $address, $phone, $payment_method]);

        $order_id = $this->conn->lastInsertId();

        // Insertar productos del carrito
        $sqlItem = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmtItem = $this->conn->prepare($sqlItem);

        foreach ($cart as $item) {
            $stmtItem->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);

            // Restar stock del producto
            $sqlUpdateStock = "UPDATE products SET stock = stock - ? WHERE id = ?";
            $stmtStock = $this->conn->prepare($sqlUpdateStock);
            $stmtStock->execute([$item['quantity'], $item['id']]);
        }

        $this->conn->commit();
        return true;

    } catch (Exception $e) {
        $this->conn->rollBack();
        return false;
    }
}

    public function getByUser($user_id) {
    $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getItems($order_id) {
    $sql = "SELECT oi.*, p.name 
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$order_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Obtener todos los pedidos (para admin)
public function getAll() {
    $sql = "SELECT o.*, u.name AS user_name
            FROM orders o
            JOIN users u ON o.user_id = u.id
            ORDER BY o.created_at DESC";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Cambiar estado del pedido
public function updateStatus($order_id, $status) {
    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$status, $order_id]);
}


}
