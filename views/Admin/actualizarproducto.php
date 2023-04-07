<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

    <div class="container">
    <h1 class="mt-5">Actualizar Producto</h1>
        <form method="post" action="<?php echo URL . 'Admin/actualizarproducto'?>">
            <input type="hidden" name="id" value="<?php echo $viewData['producto']->getIdProducto(); ?>">
            <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $viewData['producto']->getNombre(); ?>">
            </div>
            <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $viewData['producto']->getPrecio(); ?>">
            </div>
            <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $viewData['producto']->getDescripcionProd(); ?></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <?php foreach($viewData['categorias']  as $categoria): ?>
                        <option value="<?php echo $categoria->getIdCategoria(); ?>"><?php echo $categoria->getDescripcion(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
            <label for="imagen">URL de la imagen</label>
            <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $viewData['producto']->getImageUrl(); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>
