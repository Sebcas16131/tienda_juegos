<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container-mis-pedidos">
    <h2>Mis pedidos</h2>
    <div class="container-intermedio-tus-pedidos">
        <?php if (!empty($orders)) : ?>
        <?php foreach ($orders as $order): ?>
        <div class="container-tu-pedido">
            
            <strong>Pedido #<?= $order['id'] ?></strong><br>
            Fecha: <?= $order['created_at'] ?><br>
            Estado: <?= ucfirst($order['status']) ?><br>
            Dirección: <?= htmlspecialchars($order['address']) ?><br>
            Teléfono: <?= htmlspecialchars($order['phone']) ?><br>
            Método de pago: <?= htmlspecialchars($order['payment_method']) ?><br><br>

            <strong>Productos:</strong>
            <ul>
                <?php foreach ($order['items'] as $item): ?>
                    <li><?= $item['name'] ?> x<?= $item['quantity'] ?> - $<?= number_format($item['price'], 2) ?></li>
                <?php endforeach; ?>
            </ul>
            <input type="submit" value="Borrar" class="delete-pedido">
        </div>
    <?php endforeach; ?>
    <?php else: ?>
    <p>No has realizado pedidos aún.</p>
    <?php endif; ?>

    <a href="index.php">Volver al inicio</a>
    </div>
    
</div>


<?php require_once __DIR__ . '/../layout/footer.php'; ?>
