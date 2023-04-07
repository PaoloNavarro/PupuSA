<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

<div class="container">
  <h1>Mis pedidos activos</h1>
  
  <hr>

  <div class="row">
  <form action="<?php echo URL . 'pedido/mis-pedidos'; ?>" method="get" class="mb-3">
        <div class="form-group">
          <label for="estado">Filtrar por estado:</label>
          <select name="estado" id="estado" class="form-control">
            <option value="">Todos</option>
            <option value="En proceso">En proceso</option>
            <option value="Finalizado">Finalizado</option>
            <option value="Cancelado">Cancelado</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
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
              <th>Cambiar Estado</th>
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
