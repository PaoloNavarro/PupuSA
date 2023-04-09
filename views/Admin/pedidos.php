<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<body>
    <div class="container">
        <h1>Pedidos por Fecha</h1>
        <form method="post" action="<?php echo URL . 'Admin/Pedidos'; ?>">
            <div class="form-group col-md-4">
                <label for="fecha_pedido">Fecha:</label>
                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" value="<?php echo $fechaActual; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="id_estado">Estado:</label>
                <select id="id_estado" name="id_estado" class="form-control">
                    <option value="">Todos</option>
                    <option value="1">En proceso</option>
                    <option value="2">Finalizado</option>
                    <option value="3">Cancelado</option>
                </select>
            </div>
            <div class="pt-3">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <hr>

        <table class="table">
                <thead>
                    <tr>
                        <th>Total a Pagar</th>
                        <th>Fecha del Pedido</th>
                        <th>Estado</th>
                        <th>Ver</th>
                        <th>Modificar estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($viewData['pedidos'] as $pedido) : ?>
                        <tr>
                            <td><?php echo $pedido->getTotalPagar(); ?></td>
                            <td><?php echo $pedido->getFechaPedido(); ?></td>
                            <td><?php echo $pedido->getEstadoPedido(); ?></td>
                            <td>
                                <form method="post" action="<?php echo URL . 'Admin/DetallePedido'; ?>">
                                    <input type="hidden" name="id_pedido" value="<?php echo $pedido->getIdPedido(); ?>">
                                    <button type="submit" class="btn btn-info">Ver Detalle</button>
                                </form>
                            </td>
                            <td class="text-center col-2">
                                <form method="post" action="<?php echo URL . 'Admin/CambiarEstado'; ?>">
                                    <div class="form-group">
                                        <label for="id_estado2">Estado:</label>
                                        <select id="id_estado2" name="id_estado2" class="form-control">
                                            <option value="1">En proceso</option>
                                            <option value="2">Finalizado</option>
                                            <option value="3">Cancelado</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id_pedido" value="<?php echo $pedido->getIdPedido(); ?>">
                                    <button type="submit" class="btn btn-success btn-sm">Cambiar estado</button>
                                </form>
                            </td>


                    
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>

    </div>
</body>

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>















