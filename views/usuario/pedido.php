<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

<div class="container">
  <h1 class="pt-3">Mis pedidos</h1>
  
  <hr>
  <?php if (isset($_SESSION['success_pedido'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success_pedido']; ?>
        </div>
    <?php } ?>
    <?php unset($_SESSION['error_pedido'], $_SESSION['success_pedido']); ?>
  <div class="row">
      <form method="post" action="<?php echo URL . 'Usuario/Pedido'; ?>">
            <div class="form-group col-md-4">
                <label for="fecha_pedido">Fecha:</label>
                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" value="<?php echo $fechaActual; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="id_estado">Estado:</label>
                <select id="id_estado" name="id_estado" class="form-control">
                    <option value="">Todos</option>
                    <option value="1">En proceso</option>
                    <option value="2">Finalizado</option>
                    <option value="3">Cancelado</option>
                </select>
            </div>
            <div class="pt-3">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
      </form>
    <div class="col-md-12">
      <?php if (empty($viewData['pedidos'])): ?>
        <p>No tienes pedidos activos en este momento</p>
      <?php else: ?>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($viewData['pedidos'] as $pedido): ?>
              <tr>
                <td><?php echo $pedido->getIdPedido(); ?></td>
                <td><?php echo $pedido->getFechaPedido(); ?></td>
                <td><?php echo $pedido->getEstadoPedido(); ?></td>
                <td>
                  <form method="post" action="<?php echo URL . 'Admin/DetallePedido'; ?>">
                                  <input type="hidden" name="id_pedido" value="<?php echo $pedido->getIdPedido(); ?>">
                                  <button type="submit" class="btn btn-info">Ver Detalle</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>

</div>

<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>
