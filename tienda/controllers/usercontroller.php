<?php
require_once 'models/User.php';

class UserController {
    // Registro de usuario
   public function register() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!empty($name) && !empty($email) && !empty($password)) {
            $user = new User();

            // ✅ Verificar si el correo ya está registrado
            if ($user->emailExists($email)) {
                $error = "Este correo ya está registrado.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $saved = $user->save($name, $email, $hashedPassword);

                if ($saved) {
                    header('Location: login.php');
                    exit;
                } else {
                    $error = "Error al registrar el usuario.";
                }
            }
        } else {
            $error = "Todos los campos son obligatorios.";
        }
    }

    require 'views/user/register.php';
}

    // Login de usuario
    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($email) && !empty($password)) {
                $userModel = new User();
                $user = $userModel->login($email, $password);

                if ($user) {
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    header('Location: index.php'); // Cambia si tienes otra página principal
                    exit;
                } else {
                    $error = "Credenciales incorrectas.";
                }
            } else {
                $error = "Todos los campos son obligatorios.";
            }
        }

        require 'views/user/login.php';
    }
    
}
?>
