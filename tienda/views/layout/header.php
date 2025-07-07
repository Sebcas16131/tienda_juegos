<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tienda Virtual</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="public/js/header.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<header>
    <h1 class="logo"><span>GAME</span>ZONE</h1>
    <nav>
        <ul>
            <li><a href="index.php">TIENDA</a></li>
            <li><a href="#">AYUDA</a></li>
            
            

            <?php if (isset($_SESSION['user'])): ?>
                <!-- <li>Bienvenido, <?= htmlspecialchars($_SESSION['user']['name']) ?></li> -->

                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <select id="navSelect" class="select-header">
                        <option value="" class="option-header" selected disabled hidden>ADMIN</option>
                        <option value="categories.php">CATEGORIAS</option>
                        <option value="products.php">PRODUCTOS</option>
                        <option value="admin_orders.php">PEDIDOS</option>
                    </select>
                    
                <?php endif; ?>

                <li><a href="my_orders.php">MIS PEDIDOS</a></li>
                <li><a href="logout.php">CERRAR SESION</a></li>
                <li><a href="cart.php" class="boton-carrito">🛒 Mi carrito</a></li>
            <?php else: ?>


        </ul>
    </nav>
    <div class="icons">
        <!-- <div class="container-cart">
            <img src="./public/img/carrito-de-compras.png" class="shooping-cart">
        </div> -->
        <div class="container-logins">
            <a href="login.php"><button class="login-button">Inicie sesión</button></a>
            <p class="logins">o</p>
            <a href="register.php"><button class="register-button">Registrese</button></a>
            <?php endif; ?>
        </div>
    </div>
</header>
