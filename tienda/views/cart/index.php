<?php require_once 'views/layout/header.php'; ?>
<div class="container-principal-cart">
    <h2 class="title-cart">Tu carrito</h2><br>

    <?php if (!empty($_SESSION['error'])): ?>
    <p class="mensaje-error" style="color:red;"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

<?php if (!empty($cart)) : ?>
    <table border="1" cellpadding="8">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($cart as $item): ?>
            <tr>
                <td class="name-img-cart">
                    <?php if ($item['image']): ?>
                        <img src="public/uploads/<?= $item['image'] ?>" width="60">
                    <?php endif; ?>
                    <p><?= htmlspecialchars($item['name']) ?></p>
                </td>
                <td>$<?= $item['price'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                <td>
                    <a href="cart.php?action=increase&id=<?= $item['id'] ?>"> + </a>
                    <a href="cart.php?action=decrease&id=<?= $item['id'] ?>"> - </a>
                    <a href="cart.php?action=remove&id=<?= $item['id'] ?>">🗑️</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


    <!-- Botón Finalizar compra -->
    <br>
    <a href="order.php" class="button-cart-shopping">
        Finaliza tu compra
    </a>
    <a href="index.php" class="link-seguir-comprando">Seguir comprando</a>

<?php else: ?>
    <p class="mensaje-carrito-vacio">Tu carrito está vacío.</p><br><br>
    <a href="index.php" class="link-volver-comprando">Compra</a><br><br><br><br><br><br><br><br><br><br>
<?php endif; ?>

<br><br>

<?php require_once 'views/layout/footer.php'; ?>
