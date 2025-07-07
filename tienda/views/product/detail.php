<?php require_once 'views/layout/header.php'; ?>

<?php if ($product): ?>
    <div class="container-primary-product">
        <div class="container-secondary-img-product">
        <?php if (!empty($product['image'])): ?>
            <img src="public/uploads/<?= $product['image'] ?>">
        <?php endif; ?>
        </div>
        <div class="container-secondary-detail-product">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p> <?= htmlspecialchars($product['category_name']) ?></p><br>
        <p><strong>Descripción:</strong> <?= nl2br(htmlspecialchars($product['description'])) ?></p><br>
        <p><strong>Precio:</strong> $<?= number_format($product['price'], 2) ?></p><br>
        <p><strong>Stock disponible:</strong> <?= $product['stock'] ?></p>
        <br><br>
        <div class="container-buttons-product">
            <a href="cart.php?action=add&id=<?= $product['id'] ?>" class="button-cart-product">Agregar al carrito</a>
            <a href="index.php" class="button-cart-product2"> Volver a tienda</a>
        </div>
        </div>

    </div>
    <!-- Botón de agregar al carrito -->
    <br><br>


<?php else: ?>
    <p>Producto no encontrado.</p>
<?php endif; ?>
    </div>
    

<?php require_once 'views/layout/footer.php'; ?>
