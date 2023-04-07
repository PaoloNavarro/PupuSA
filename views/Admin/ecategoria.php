<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<div class="container">
  <h1 class="mt-5">Listado de categorias</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th style="display:none;" scope="col">#</th>    
        <th scope="col">Descripción</th>
        <th scope="col">Estado</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($viewData['categorias'] as $categoria): ?>
      <tr>
        <th style="display:none;" scope="row"><?php echo $categoria->getIdCategoria(); ?></th>
        <td><?php echo $categoria->getDescripcion(); ?></td>
          <td>
              <?php require_once 'estadocategoria.php'; ?>
              <?php echo mostrarEstadoCategoria($categoria); ?>
          </td>
        <td>
        <form method="post" action="<?php echo URL . 'Admin/editarcategoria'?>">
          <input type="hidden" name="id_categoria" value="<?php echo $categoria->getIdCategoria(); ?>">
          <button type="submit" class="btn btn-primary">Editar</button>
        </form>

        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>
