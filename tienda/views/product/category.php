<?php require_once 'views/layout/header.php'; ?>

<h2>Productos por Categoría</h2>

<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    <?php foreach ($products as $prod): ?>
        <div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
            <h4><?= htmlspecialchars($prod['name']) ?></h4>
            <p><strong>$<?= number_format($prod['price'], 2) ?></strong></p>
            <?php if (!empty($prod['image'])): ?>
                <img src="public/uploads/<?= $prod['image'] ?>" width="100%">
            <?php endif; ?>
            <p><?= htmlspecialchars(substr($prod['description'], 0, 60)) ?>...</p>
            <a href="product.php?action=detail&id=<?= $prod['id'] ?>">Ver más</a>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once 'views/layout/footer.php'; ?>
