<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Editar Producto</h2>
<div class="demo-form-product">
    <form method="POST" action="products.php?action=update" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label>Nombre:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

    <label>Precio:</label>
    <input type="number" name="price"  min="0" value="<?= $product['price'] ?>" required>

    <label>Stock:</label>
    <input type="number" name="stock" value="<?= $product['stock'] ?>" min="0" required>

    <label>Descripción:</label>
    <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea>

    <label>Categoría:</label>
    <select name="category_id" required>
        <?php
        require_once 'models/Category.php';
        $categoryModel = new Category();    
        $categories = $categoryModel->getAll();
        foreach ($categories as $cat):
        ?>
            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Imagen actual:</label><br>
    <?php if ($product['image']): ?>
        <img src="public/uploads/<?= $product['image'] ?>" width="100"><br><br>
    <?php endif; ?>

    <label>Subir nueva imagen:</label>
    <input type="file" name="image"><br><br>

    <input type="submit" value="Actualizar producto">
</form>
</div>


<a href="products.php">← Volver al listado</a>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
