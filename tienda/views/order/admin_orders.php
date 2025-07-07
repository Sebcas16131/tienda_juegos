<?php require_once __DIR__ . '/../layout/header.php'; ?>
<div class="container-mis-pedidos">
    <h2>Gestión de Pedidos</h2>
    <div class="container-intermedio-tus-pedidos">
        <?php foreach ($orders as $order): ?>
    <div class="container-tu-pedido">
        <strong>Pedido #<?= $order['id'] ?></strong><br>
        Usuario: <?= htmlspecialchars($order['user_name']) ?><br>
        Fecha: <?= $order['created_at'] ?><br>
        Estado actual: <strong><?= ucfirst($order['status']) ?></strong><br>
        Dirección: <?= htmlspecialchars($order['address']) ?><br>
        Teléfono: <?= htmlspecialchars($order['phone']) ?><br>
        Método de pago: <?= htmlspecialchars($order['payment_method']) ?><br>

        <form method="POST" action="admin_orders.php?action=updateStatus">
            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
            <label for="status">Cambiar estado:</label>
            <select name="status" style="color:black;">
                <option value="pendiente" <?= $order['status'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                <option value="en_proceso" <?= $order['status'] == 'en_proceso' ? 'selected' : '' ?>>En proceso</option>
                <option value="enviado" <?= $order['status'] == 'enviado' ? 'selected' : '' ?>>Enviado</option>
                <option value="entregado" <?= $order['status'] == 'entregado' ? 'selected' : '' ?>>Entregado</option>
            </select>
            <input type="submit" value="Actualizar" class="input-actualizar-estado-pedidos">
        </form>

        <strong>Productos:</strong>
        <ul>
            <?php foreach ($order['items'] as $item): ?>
                <li><?= $item['name'] ?> x<?= $item['quantity'] ?> - $<?= number_format($item['price'], 2) ?></li>
            <?php endforeach; ?>
        </ul>
        <input type="submit" value="Borrar" class="delete-pedido">
    </div>
    <?php endforeach; ?>
    <a href="index.php">Volver al inicio</a>
    </div>

</div>


<?php require_once __DIR__ . '/../layout/footer.php'; ?>
