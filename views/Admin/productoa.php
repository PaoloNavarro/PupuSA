<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<div class="container">
  <h1 class="mt-5">Agregar Producto</h1>
  <form class="mt-5" action="<?= URL ?>Admin/agregarproducto" method="post">
    <div class="form-group">
      <label for="nombre">Nombre del producto:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="form-group">
      <label for="precio">Precio:</label>
      <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
    </div>

    <div class="form-group">
      <label for="descripcion">Descripción:</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>
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
      <label for="image_url">URL de la imagen:</label>
      <input type="text" class="form-control" id="image_url" name="image_url" required>
    </div>
    <input type="hidden" name="estado" value="1">


    <button type="submit" class="btn btn-primary">Agregar producto</button>
  </form>
</div>
<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>


