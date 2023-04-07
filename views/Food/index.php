<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/food.css" ?>">
<link rel="stylesheet" href="<?= URL . "public/css/cardfood.css" ?>">
<!-- INSERTAR CONTENIDO -->


<body>
    <div class="container pt-2">

        <h1 class="text-center">Listado de productos</h1>
        <form method="GET" action="<?php echo URL . 'Food/'; ?>" class="mb-4 form-inline">
    <div class="form-group mr-2">
        <label for="categoria" class="sr-only">Categoría:</label>
        <select name="categoria" class="form-control">
            <option value="">Todas las categorías</option>
            <?php foreach ($viewData['categorias'] as $categoria) { ?>
                <option value="<?php echo $categoria->getIdCategoria(); ?>"><?php echo $categoria->getDescripcion(); ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary ml-2">Filtrar</button>
</form>







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
                            <p><?php echo $producto->getDescripcionProd(); ?></p>
                            <?php if(isset($_SESSION["user"])) { ?>
                                <form method="POST" action="<?php echo URL . 'Carrito/agregarProducto'; ?>">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->getIdProducto(); ?>">
                                    <div class="stars">
                                        <input type="number" name="cantidad" value="1" min="1" max="10">
                                    </div>
                                    <div class="bay">
                                        <button type="submit">Agregar al carrito</button>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <p>Debes iniciar sesión para agregar productos al carrito.</p>
                                <a href="<?php echo URL . 'Home/Login'; ?>">Iniciar sesión</a>
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
    
