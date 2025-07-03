<?php
require_once 'config/database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Guardar nuevo usuario
    public function save($name, $email, $password) {
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $email, $password]);
    }

    // Verificar login
    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return $user; // Login correcto
            }
        }

        return false; // Falló
    }
    public function emailExists($email) {
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->rowCount() > 0;
}

}
?>
