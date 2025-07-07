<?php
require_once 'config/database.php';

class Product {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT products.*, categories.name AS category_name
                FROM products
                LEFT JOIN categories ON products.category_id = categories.id
                ORDER BY products.id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($name, $description, $price, $image, $category_id,$stock) {
        $sql = "INSERT INTO products (name, description, price, image, category_id,stock)
                VALUES (?, ?, ?, ?, ?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $description, $price, $image, $category_id,$stock]);
    }

    public function getCategories() {
        $stmt = $this->conn->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByCategory($category_id) {
    $sql = "SELECT products.*, categories.name AS category_name
            FROM products
            LEFT JOIN categories ON products.category_id = categories.id
            WHERE category_id = ?
            ORDER BY products.id DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$category_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getById($id) {
    $sql = "SELECT products.*, categories.name AS category_name
            FROM products
            LEFT JOIN categories ON products.category_id = categories.id
            WHERE products.id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function search($name, $category_id = null) {
    $sql = "SELECT p.*, c.name AS category_name 
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.name LIKE ?";
    
    $params = ["%$name%"];

    if ($category_id) {
        $sql .= " AND p.category_id = ?";
        $params[] = $category_id;
    }

    $sql .= " ORDER BY p.id DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function update($id, $name, $price, $description, $category_id, $image = null,$stock) {
    if ($image) {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, category_id = ?, image = ?, stock=? WHERE id = ?";
        $params = [$name, $price, $description, $category_id, $image,$stock,$id];
    } else {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, category_id = ?, stock=? WHERE id = ?";
        $params = [$name, $price, $description, $category_id,$stock, $id];
    }

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($params);
}
public function delete($id) {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id]);
}

}

?>
