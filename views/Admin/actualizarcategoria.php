<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

    <div class="container">
    <h1 class="mt-5">Actualizar categoria</h1>
        <form method="post" action="<?php echo URL . 'Admin/actualizarcategoria'?>">
            <input type="hidden" name="id" value="<?php echo $viewData['categorias']->getIdCategoria(); ?>">
            <div class="form-group">
            <label for="nombre">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $viewData['categorias']->getDescripcion(); ?>">
            </div>    
            <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1"<?php echo ($viewData['categorias']->getEstado() == 1) ? ' selected' : ''; ?>>Disponible</option>
                    <option value="2"<?php echo ($viewData['categorias']->getEstado() == 2) ? ' selected' : ''; ?>>No disponible</option>
                </select>
                <button type="submit" class="btn btn-primary">Actualizar</button>

            </div>
        </form>
    </div>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>