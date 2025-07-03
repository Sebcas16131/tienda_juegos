<?php require_once __DIR__ . '/../layout/header.php'; ?>
<section class="container-login-principal">
    <div class="container-login">
    <h2>Finalizar Pedido</h2>

<?php if (!empty($error)) : ?>
    <p style="color:red;"><?= $error ?></p>
<?php elseif (!empty($success)) : ?>
    <p style="color:red;">¡Pedido realizado exitosamente!</p>
<?php endif; ?>

<form method="POST" action="" class="form-envios">
    <label>Dirección de envío:</label><br>
    <input type="text" class="input-login" name="address" required><br><br>

    <label>Teléfono de contacto:</label><br>
    <input type="text" class="input-login" name="phone" required><br><br>

    <label>Método de pago:</label><br>
    <select name="payment_method" class="input-login" required>
        <option value="Contra entrega">Contra entrega</option>
        <option value="Transferencia">Transferencia</option>
    </select><br><br>

    <input type="submit" value="Confirmar pedido" class="button-pedido"><br>
    <a href="index.php" class="volver-confirmar-pedidos">Volver al inicio</a>
    
</form>


</div>
<div class="img-interfas-finalizar-pedido-form">

</div>
</section>



<?php require_once __DIR__ . '/../layout/footer.php'; ?>
