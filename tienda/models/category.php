<?php
require_once 'config/database.php';

class Category {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM categories ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($name) {
        $sql = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name]);
    }
}
?>
