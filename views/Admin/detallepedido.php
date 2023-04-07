<table>
    <tr>
        <th>ID Pedido</th>
        <th>ID Producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Subtotal</th>
    </tr>
    <?php foreach ($viewData['detallesPedido'] as $detalle) : ?>
        <tr>
            <td><?php echo $detalle->getIdProducto(); ?></td>
            <td><?php echo $detalle->getIdPedido(); ?></td>
            <td><?php echo $detalle->getIdUsuario(); ?></td>
            <td><?php echo $detalle->getCantidad(); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
