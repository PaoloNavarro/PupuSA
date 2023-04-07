<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
    <div class="container">
    <h1 class="my-5">Pedido de <?php echo $viewData['pedidos']->getNombreUsuario(); ?></h1>
    <div class="row">
        <div class="col-md-6">
        <h3>Lugar de envío:<?php echo $viewData['pedidos']->getUbicacion(); ?></h3>
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
    </div>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>


