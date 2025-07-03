<?php require_once __DIR__ . '/../layout/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
<section class="container-login-principal">
    <div class="img-interfas-login">

    </div>
    <div class="container-login">
        <h2>Registro de Usuario</h2>
    <?php if (!empty($error)) : ?>
    <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="" class="form-register">
        <label for="name">Nombre:</label><br>
        <input type="text" class="input-login" name="name" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" class="input-login" name="email" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" class="input-login" name="password" required><br><br>

        <input class="button-login" type="submit" value="Registrarse">
    </form>
    </div>
</section>
    
    <?php require_once __DIR__ . '/../layout/footer.php'; ?>
