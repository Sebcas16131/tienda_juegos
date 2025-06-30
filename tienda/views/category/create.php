<?php require_once 'views/layout/header.php'; ?>
<section class="container-login-principal">
    <div class="container-login">
        <h2>Crear categoría</h2>

        <?php if (!empty($error)) : ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST" action="" class="form-envios">
            <label for="name">Nombre:</label><br>
            <input type="text" name="name" required class="input-login"><br><br>
            <input type="submit" value="Guardar" class="button-agregar-producto">
        </form>
    </div>
    <div class="img-interfas-agregar-producto-form">

    </div>
</section>




<?php require_once 'views/layout/footer.php'; ?>
