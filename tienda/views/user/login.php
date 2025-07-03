<?php require_once __DIR__ . '/../layout/header.php'; ?>
<section class="container-login-principal">
    <div class="container-login">
        <h2>Inicia sesión</h2>

    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="" class="form-login">
        <label for="email">Correo electrónico:</label><br>
        <input class="input-login" type="email" name="email" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input class="input-login" type="password" name="password" required><br><br>

        <input class="button-login" type="submit" value="Iniciar sesión">

        <p>¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
    </form>

    
    </div>
    <div class="img-interfas-login">

    </div>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
