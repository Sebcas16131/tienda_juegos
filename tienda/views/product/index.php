<?php require_once 'views/layout/header.php'; ?>
<div class="details-create-products">
    <h2>Lista de Productos</h2>
    <a href="products.php?action=create" class="agregar-producto-table">Agregar producto</a>

<table border="1" cellpadding="8" class="table-products">
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Imagen</th>
    </tr>
    <?php foreach ($products as $prod): ?>
        <tr>
            <td><?= htmlspecialchars($prod['name']) ?></td>
            <td>$<?= $prod['price'] ?></td>
            <td><?= $prod['category_name'] ?? 'Sin categoría' ?></td>
            <td>
                <?php if (!empty($prod['image'])): ?>
                    <img src="public/uploads/<?= $prod['image'] ?>" width="60">
                <?php endif; ?>
                <a href="products.php?action=edit&id=<?= $prod['id'] ?>" class="btn">✏️ Editar</a>
                <a href="products.php?action=delete&id=<?= $prod['id'] ?>" 
   onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">🗑 Eliminar</a>

            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>


<?php require_once 'views/layout/footer.php'; ?>
