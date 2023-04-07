<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<body>
    <div class="container">
        <h1>Pedidos por Fecha</h1>
        <form method="post" action="<?php echo URL . 'Admin/Pedidos'; ?>">
            <div class="form-group">
                <label for="fecha_pedido">Fecha:</label>
                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" value="<?php echo $fechaActual; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Total a Pagar</th>
                    <th>Fecha del Pedido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewData['pedidos'] as $pedido) : ?>
                    <tr>
                        <td><?php echo $pedido->getIdPedido(); ; ?></td>
                        <td><?php echo $pedido->getTotalPagar(); ?></td>
                        <td><?php echo $pedido->getFechaPedido(); ?></td>
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
    </div>
</body>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>















