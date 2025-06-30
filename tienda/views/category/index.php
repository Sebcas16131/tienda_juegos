<?php require_once 'views/layout/header.php'; ?>
<div class="container-category-principal">
    <div class="container-cart-categoty">
    <h2>Lista de categorías</h2>
    <a href="categories.php?action=create">Crear nueva categoría</a>
    
        <div class="container-list-categorys">
            <?php foreach ($categories as $cat): ?>
                <p>- <?= htmlspecialchars($cat['name']) ?> </p>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container-cart-categoty2">
        <img src="public/img/mortalkombat.jpeg">
        <div class="container-texts-category">
            <h3>Acción</h3>
            <p>Sumérgete en la adrenalina pura con nuestra categoría de juegos de acción. 
            Aquí encontrarás títulos llenos de combates intensos, persecuciones emocionantes y desafíos 
            que pondrán a prueba tus reflejos. ¡Prepárate para no parar ni un segundo!</p>
        </div>
    </div>
     <div class="container-cart-categoty2">
        <img src="public/img/thelastofus2.jpg">
        <div class="container-texts-category">
            <h3>Horror</h3>
            <p>Entra si te atreves… Los juegos de horror te sumergen en atmósferas oscuras, 
                criaturas aterradoras y momentos que te pondrán los pelos de punta. Prepárate para el suspenso, 
                el miedo y lo inesperado. ¿Podrás sobrevivir?</p>
        </div>
    </div>
     <div class="container-cart-categoty2">
        <img src="public/img/FC25-2.jpeg">
        <div class="container-texts-category">
            <h3>Deportes</h3>
            <p>Vive la emoción del deporte con los mejores juegos de fútbol, baloncesto, carreras y más. 
                Demuestra tus habilidades, compite como un profesional y lleva a tu equipo a la victoria. 
                ¡La cancha, la pista o el estadio te esperan!</p>
        </div>
    </div>
    <div class="container-cart-categoty2">
        <img src="public/img/gta5.jpg">
        <div class="container-texts-category">
            <h3>Juegos de aventura</h3>
            <p>Explora mundos increíbles, resuelve misterios y vive historias inolvidables. 
                En los juegos de aventura, cada paso te lleva a nuevas sorpresas y desafíos. 
                ¡La diversión comienza donde empieza el viaje!</p>
        </div>
    </div>
    <div class="container-cart-categoty2">
        <img src="public/img/slider-agg-products2.jpeg">
        <div class="container-texts-category">
            <h3>Estrategia</h3>
            <p>Pon a prueba tu mente y tu capacidad de planificación. En los juegos de estrategia, cada decisión cuenta: construye imperios, 
                lidera ejércitos o administra recursos para alcanzar la victoria. ¡Demuestra tu inteligencia táctica!</p>
        </div>
    </div>


</div>




<?php require_once 'views/layout/footer.php'; ?>
