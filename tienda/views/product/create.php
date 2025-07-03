<?php require_once 'views/layout/header.php'; ?>
<section class="container-login-principal">
    <div class="container-login">
        <h2>Agregar Producto</h2>

    <?php if (!empty($error)) : ?>
    <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="form-envios">
    <label>Nombre:</label><br>
    <input type="text" name="name" required class="input-login"><br><br>

    <label>Descripción:</label><br>
    <textarea name="description" class="input-login"></textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" name="price" step="0.01" min="0" required class="input-login"><br><br>

    <label>Categoría:</label><br>
    <select name="category_id" required class="input-login">
        <option value="">Seleccionar</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Imagen:</label><br>
    <input type="file" name="image" class="input-img-productos"><br><br>

    <input type="submit" value="Guardar" class="button-agregar-producto">
    </form>
    </div>
    <div class="img-interfas-agregar-producto-form">

    </div>
</section>



<?php require_once 'views/layout/footer.php'; ?>
