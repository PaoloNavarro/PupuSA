<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>
<div class="container">
    <h1 class="my-5">Pedido de <?php echo $viewData['pedidos']->getNombreUsuario(); ?> fecha: <?php echo $viewData['pedidos']->getFechaPedido(); ?> </h1>
    <div class="row">
        <div class="col-md-6">
            <h3>Lugar de envío: <?php echo $viewData['pedidos']->getUbicacion(); ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($viewData['detallesPedido'] as $detalle) : ?>
                        <tr>
                            <td><?php echo $detalle->getNombreProducto(); ?></td>
                            <td><?php echo $detalle->getCantidad(); ?></td>
                            <td><?php echo $detalle->getPrecioProducto(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"): ?>
        <hr>
        <form method="post" action="<?php echo URL . 'Admin/CambiarEstado'; ?>">
            <div class="form-group">
                <label for="id_estado2">Estado:</label>
                <select id="id_estado2" name="id_estado2" class="form-control">
                    <option value="1">En proceso</option>
                    <option value="2">Finalizado</option>
                    <option value="3">Cancelado</option>
                </select>
            </div>
            <input type="hidden" name="id_pedido" value="<?php echo $viewData['pedidos']->getIdPedido(); ?>">
            <button type="submit" class="btn btn-success btn-sm">Cambiar estado</button>
        </form>
    <?php endif; ?>
    <hr>
    <a href="#" onclick="window.print()" class="btn btn-primary btn-sm">Imprimir Pedido</a>
</div>
<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>

