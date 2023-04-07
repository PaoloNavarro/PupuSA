<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
    <h2>Resumen del pedido</h2>
    <form action="<?php echo URL . 'Pedido/procesarPedido'; ?>" method="POST">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0; // variable para acumular el total
                foreach ($viewData['carrito'] as $item) { ?>
                    <tr>
                        <td><?php echo $item['producto']->getNombre(); ?></td>
                        <td><?php echo $item['cantidad']; ?></td>
                        <td><?php echo $item['producto']->getPrecio(); ?></td>
                        <td><?php
                            $precioTotal = $item['producto']->getPrecio() * $item['cantidad'];
                            echo $precioTotal;
                            $total += $precioTotal; // sumar al total acumulado
                            ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">TOTAL A PAGAR</td>
                    <td><?php echo $total; ?></td>
                    <input type="hidden" name="total_pagar" value="<?php echo $total; ?>">
                </tr>
            </tfoot>
        </table>

        <input type="hidden" name="id_estado_pedido" value="1">

        <h2>Ingrese la dirección de envío</h2>
        <div>
            <label for="direccion_envio">Dirección de envío:</label>
            <input type="text" name="direccion_envio" id="direccion_envio">
        </div>
        <button class="btn btn-success" type="submit">Procesar pago en efectivo</button>
    </form>
