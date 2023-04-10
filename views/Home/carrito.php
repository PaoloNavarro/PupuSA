<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>
<link rel="stylesheet" href="<?= URL . "public/css/carrito.css" ?>">

<body>

    <h1 class="text-center">Carrito de compras</h1>
    <?php if (isset($_SESSION['error_pedido'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['error_pedido']; ?>
    </div>
    <?php } ?>

    <?php if (isset($_SESSION['success_pedido'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success_pedido']; ?>
        </div>
    <?php } ?>

    <?php unset($_SESSION['error_pedido'], $_SESSION['success_pedido']); ?>

    <div class="table-responsive container pt-2">
    <?php if (empty($viewData['carrito'])) { ?>
        <div class="alert alert-warning" role="alert">
            El carrito está vacío.
        </div>
    <?php } else { ?>
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
        <form action="<?php echo URL . 'Pago/pagar'; ?>" method="POST">
        <h2>Opciones de pago</h2>
        <div>
            <input type="radio" name="pago" value="tarjeta" id="pago-tarjeta">
            <label for="pago-tarjeta">Tarjeta de crédito</label>
        </div>
        <div>
            <input type="radio" name="pago" value="efectivo" id="pago-efectivo">
            <label for="pago-efectivo">Efectivo</label>
        </div>
        <button class="btn btn-success" type="submit">Comprar</button>
    
    </form>
    <?php } ?>

</div>


</body>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>




