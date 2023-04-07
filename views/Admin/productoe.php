<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<div class="container">
  <h1 class="mt-5">Listado de Productos</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Descripción</th>
        <th scope="col">Categoría</th>
        <th scope="col">URL de la imagen</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($viewData['productos'] as $producto): ?>
      <tr>
        <th scope="row"><?php echo $producto->getIdProducto(); ?></th>
        <td><?php echo $producto->getNombre(); ?></td>
        <td><?php echo $producto->getPrecio(); ?></td>
        <td><?php echo $producto->getDescripcionProd(); ?></td>
        <td><?php echo $producto->getCategoria(); ?></td>
        <td><?php echo $producto->getImageUrl(); ?></td>
        <td>
        <form method="post" action="<?php echo URL . 'Admin/editarproducto'?>">
          <input type="hidden" name="id_producto" value="<?php echo $producto->getIdProducto(); ?>">
          <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>
