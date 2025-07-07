<?php require_once __DIR__ . '/../layout/header.php'; ?>
<section class="container-login-principal">
<div class="container-login">
    <h2>Editar Producto</h2>
    <form method="POST" action="products.php?action=update" enctype="multipart/form-data" class="form-envios">

    <input type="hidden" name="id" value="<?= $product['id'] ?>" class="input-login">

    <label>Nombre:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" class="input-login" required>

    <label>Precio:</label>
    <input type="number" name="price"  min="0" value="<?= $product['price'] ?>" class="input-login" required>

    <label>Stock:</label>
    <input type="number" name="stock" value="<?= $product['stock'] ?>" min="0" class="input-login" required>

    <label>Descripción:</label>
    <textarea class="input-description" name="description" required><?= htmlspecialchars($product['description']) ?></textarea>

    <label>Categoría:</label>
    <select name="category_id" class="select-category" required>
        <?php
        require_once 'models/Category.php';
        $categoryModel = new Category();    
        $categories = $categoryModel->getAll();
        foreach ($categories as $cat):
        ?>
            <option class="option-category" value="<?= $cat['id'] ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Imagen actual:</label>
    <?php if ($product['image']): ?>
        <img src="public/uploads/<?= $product['image'] ?>" width="100">
    <?php endif; ?>

    <label>Subir nueva imagen:</label>
    <input type="file" name="image" class="input-img">

    <input type="submit" value="Actualizar producto" class="button-product">
</form>
</div>
<div class="img-interfas-agregar-producto-form">

</div>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
