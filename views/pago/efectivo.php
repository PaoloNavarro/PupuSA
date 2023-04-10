<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<div class="container mt-5">
    <h2>Resumen del pedido</h2>
    <?php if (isset($_SESSION['error_pedido'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error_pedido']; ?>
        </div>
    <?php } ?>
    <?php unset($_SESSION['error_pedido'], $_SESSION['success_pedido']); ?>

    <div class="d-flex flex-row justify-content-between align-items-start">
            <div class="flex-fill mr-3">
                <div class="table-responsive">
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
                                    <td>$<?php echo number_format($item['producto']->getPrecio(), 2); ?></td>
                                    <td>$<?php
                                        $precioTotal = $item['producto']->getPrecio() * $item['cantidad'];
                                        echo number_format($precioTotal, 2);
                                        $total += $precioTotal; // sumar al total acumulado
                                        ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right font-weight-bold">TOTAL A PAGAR:</td>
                                <td class="font-weight-bold">$<?php echo number_format($total, 2); ?></td>
                                <input type="hidden" name="total_pagar" value="<?php echo number_format($total, 2); ?>">
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="flex-fill">
                <form action="<?php echo URL . 'Pedido/procesarPedido'; ?>" method="POST">
                    <h2>Ingrese la dirección de envío</h2>
                    <div class="mb-3">
                        <label for="direccion_envio" class="form-label">Dirección de envío:</label>
                        <input type="text" class="form-control" name="direccion_envio" id="direccion_envio" required>
                    </div>
                    <button class="btn btn-success" type="submit" require>Procesar pago en efectivo</button>
                    <input type="hidden" name="id_estado_pedido" value="1">
                </form>
            </div>
    </div>
    

</div>
<?php require_once VIEW_LAYOUT_PATH . 'footer.php' ?>

