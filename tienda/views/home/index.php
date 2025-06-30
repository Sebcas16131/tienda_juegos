<?php require_once __DIR__ . '/../layout/header.php'; ?>
<div class="container-principal">
    <div class="container-linear-gradient">
        <div class="container-segundario">
            <h3 class="title-segundario">¡Tu destino de juegos definitivo!</h3>
            <h2 class="title-principal">Adentrate en el mundo de <span>GAME</span>ZONE</h2>
            <p class="parrafo-principal">Explora juegos de vanguardia, descubre reseñas de expertos y conéctate con otros jugadores. GameZone te trae lo último y lo mejor en juegos.</p>
        <div class="container-buttons">
            <a href="#title-segundasection"><button class="button-explore">Explorar</button></a>
            <a href="#container-form-principal"><button class="button-about">Acerca de</button></a>
        </div>
    </div>
    </div>
</div>
<!--SEGUNDA SECCION PAGINA PRINCIPAL-->

<h2 class="title-segundasection" id="title-segundasection">Productos destacados</h2>
<section class="container-segundasection">
    <img src="./public/img/thelastofus2.jpg">
    <img src="./public/img/pubg.jpg">
    <img src="./public/img/slider-agg-products2.jpeg">
    <img src="./public/img/FC25.jpeg">
    <img src="./public/img/mortalkombat.jpeg">
</section>
<!--TERCERA SECCION PAGINA PRINCIPAL-->
<div class="container-form-principal"  id="container-form-principal">
    <h2 class="title-search">Busca tus videojuegos favoritos en <span>GAME</span>ZONE</h2>
    <form method="GET" action="index.php" class="form-search">
    <input class="search" type="text" name="search" placeholder="Buscar producto" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    
    <select name="category" class="select-search">
        <option value="" class="option-search">Todas las categorías</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= ($_GET['category'] ?? '') == $cat['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

        <a href="#container-form-principal"><input class="button-search" type="submit" value="Filtrar"></a>
    </form>
    <div class="container-products-principal">
        <div class="product-list">
            <?php foreach ($products as $prod): ?>
            <div class="product-card">
            <?php if (!empty($prod['image'])): ?>
                <a class="img-vinculo" href="products.php?action=detail&id=<?= $prod['id'] ?>"><img src="public/uploads/<?= $prod['image'] ?>" alt="Imagen del producto"></a>
            <?php endif; ?>
            <h4><?= htmlspecialchars($prod['name']) ?></h4>
            <p class="description-product"><?= htmlspecialchars(substr($prod['description'], 0, 60)) ?>...</p>
            <p class="price-product"><strong>$<?= number_format($prod['price'], 2) ?> COP</strong></p>
            <a class="cart-shopping" href="cart.php?action=add&id=<?= $prod['id'] ?>">Agregar al carrito</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- <img src="./public/img/sci-fi-fantasy-landscape.jpg"> -->




<?php require_once __DIR__ . '/../layout/footer.php'; ?>
