<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>
<link rel="stylesheet" href="<?= URL . "public/css/carrito.css" ?>">

<body>

    <h1 class="text-center">Carrito de compras</h1>

    <div class="table-responsive container pt-2">



    <table class="table table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Precio total</th>
                    <th>Eliminar</th>
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
                        <td>
                            <form action="<?php echo URL . 'Carrito/eliminarProducto'; ?>" method="POST">
                                <input type="hidden" name="id_producto" value="<?php echo $item['producto']->getIdProducto(); ?>">
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total:</td>
                    <td><?php echo $total; ?></td>
                </tr>
            </tfoot>
        </table>
        <form action="<?php echo URL . 'comprar'; ?>" method="POST">
            <h2>Opciones de pago</h2>
            <div>
                <input type="radio" name="pago" value="tarjeta" id="pago-tarjeta">
                <label for="pago-tarjeta">Tarjeta de crédito</label>
            </div>
            <div>
                <input type="radio" name="pago" value="paypal" id="pago-paypal">
                <label for="pago-paypal">PayPal</label>
            </div>
            <div>
                <input type="radio" name="pago" value="efectivo" id="pago-efectivo">
                <label for="pago-efectivo">Efectivo</label>
            </div>
            <button class="btn btn-success" type="submit">Comprar</button>
        </form>

          



    </div>

</body>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>




