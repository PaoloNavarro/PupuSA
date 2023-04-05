<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<body>
    <h1>Pedidos por Fecha</h1>
    <form method="post" action="">
        <label for="fecha_pedido">Fecha:</label>
        <input type="date" id="fecha_pedido" name="fecha_pedido" value="<?php echo $fechaActual; ?>">
        <button type="submit">Filtrar</button>
    </form>
    <table>
        <tr>
            <th>ID Pedido</th>
            <th>Total a Pagar</th>
            <th>Fecha del Pedido</th>
        </tr>
        <?php foreach ($pedidos as $pedido) : ?>
            <tr>
                <td><?php echo $pedido['id_pedido']; ?></td>
                <td><?php echo $pedido['total_pagar']; ?></td>
                <td><?php echo $pedido['fecha_pedido']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>






