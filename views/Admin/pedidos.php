<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<body>
    <h1>Pedidos por Fecha</h1>
    <form method="post" action="<?php echo URL . 'Admin/Pedidos'; ?>">
        <label for="fecha_pedido">Fecha:</label>
        <input type="date" id="fecha_pedido" name="fecha_pedido" value="<?php echo $fechaActual; ?>">
        <button type="submit">Filtrar</button>
    </form>
    <table>
        <tr>
            <th>ID Pedido</th>
            <th>Total a Pagar</th>
            <th>Fecha del Pedido</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($viewData['pedidos'] as $pedido) : ?>
            <tr>
                <td><?php echo $pedido->getIdPedido(); ; ?></td>
                <td><?php echo $pedido->getTotalPagar(); ?></td>
                <td><?php echo $pedido->getFechaPedido(); ?></td>
                <td>
                    <form method="post" action="<?php echo URL . 'Admin/DetallePedido'; ?>">
                        <input type="hidden" name="id_pedido" value="<?php echo $pedido->getIdPedido(); ?>">
                        <button type="submit">Ver Detalle</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
</table>

</body>
<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>














