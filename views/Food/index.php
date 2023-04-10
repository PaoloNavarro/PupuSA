<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/food.css" ?>">
<link rel="stylesheet" href="<?= URL . "public/css/cardfood.css" ?>">
<!-- INSERTAR CONTENIDO -->


<body>

    <div class="container pt-2">

    <div class="row">
        <h1 class="text-center">Listado de productos</h1>

        <form method="GET" action="<?php echo URL . 'Food/'; ?>" class="mb-4 form-inline col">
            <div class="form-group d-flex">
                <label for="categoria" class="sr-only">Categoría:</label>
                <select name="categoria" class="form-control">
                    <option value="">Todas las categorías</option>
                    <?php foreach ($viewData['categorias'] as $categoria) { ?>
                        <option value="<?php echo $categoria->getIdCategoria(); ?>"><?php echo $categoria->getDescripcion(); ?></option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-primary ms-2 ml-2 ml-auto">Filtrar</button>
            </div>
        </form>
    </div>


    <?php if(isset($_SESSION["user"])) { ?>
    <!-- código para agregar al carrito -->
    <?php } else { ?>
        <div class="alert alert-info" role="alert">
            Debes iniciar sesión para agregar productos al carrito.
            <a class="btn btn-primary ml-2" href="<?php echo URL . 'Home/Login'; ?>">Iniciar sesión</a>
        </div>
    <?php } ?>







        <div class="container pt-2">

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
    
