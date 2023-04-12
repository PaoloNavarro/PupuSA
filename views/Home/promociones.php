<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/food.css" ?>">
<link rel="stylesheet" href="<?= URL . "public/css/cardfood.css" ?>">
<!-- INSERTAR CONTENIDO -->


<body>

    <div class="container pt-2">


    <?php if(isset($_SESSION["user"])) { ?>
    <!-- código para agregar al carrito -->
    <?php } else { ?>
        <div class="text-center alert alert-info" role="alert">
             <h5>Debes iniciar sesión para agregar las promociones.</h5>
        </div>
    <?php } ?>







        <div class="container pt-2 mt-3">

            <div class="products">
                
                <?php foreach ($viewData['productos'] as $producto) { ?>
                    <?php if($producto->getEstado() == 1) { ?>
                        <div class="product">
                            <div class="image">
                                <img class="imgt" src="<?php echo $producto->getImageUrl(); ?>" alt="">
                            </div>
                            <div class="namePrice">
                                <h3><?php echo $producto->getNombre(); ?></h3>
                                <span><?php echo "$ ".$producto->getPrecio(); ?></span>
                            </div>
                            <p class="mb-5"><?php echo $producto->getDescripcionProd(); ?></p>
                            <?php if(isset($_SESSION["user"])) { ?>
                                <form method="POST" action="<?php echo URL . 'Carrito/agregarProducto'; ?>">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->getIdProducto(); ?>">
                                    <div class="bay">
                                        <div style="display: flex; align-items: center;">
                                            <div class="stars">
                                                <input type="number" name="cantidad" value="1" min="1" max="10">
                                            </div>
                                            <button type="submit">Agregar al carrito</button>
                                        </div>
                                    </div>

                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
                
                
            </div>
        </div>
    </div>                            

</body>
<!-- FIN CONTENIDO -->

<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>
    
