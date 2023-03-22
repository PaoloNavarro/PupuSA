<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/food.css" ?>">
<link rel="stylesheet" href="<?= URL . "public/css/cardfood.css" ?>">
<!-- INSERTAR CONTENIDO -->


<body>
<h1>Listado de productos</h1>

    <div class="container pt-2">

        <div class="products">
            
            <?php foreach ($viewData['productos'] as $producto) { ?>
                <div class="product">
                    <div class="image">
                        <img src="<?php echo $producto->getImageUrl(); ?>" alt="">
                    </div>
                    <div class="namePrice">
                        <h3><?php echo $producto->getNombre(); ?></h3>
                        <span><?php echo $producto->getPrecio(); ?></span>
                    </div>
                    <p><?php echo $producto->getDescripcionProd(); ?></p>
                    <form method="POST" action="<?php echo URL . 'Carrito/agregarProducto'; ?>">

                        <input type="hidden" name="id_producto" value="<?php echo $producto->getIdProducto(); ?>">
                        <div class="stars">
                            <input type="number" name="cantidad" value="1" min="1" max="10">
                        </div>
                        <div class="bay">
                            <button type="submit">Agregar al carrito</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            
            
        </div>
    </div>

        


</body>
<!-- FIN CONTENIDO -->

<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>
    
