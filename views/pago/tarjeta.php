<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>


<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          <h4 class="col-md-6 offset-md-3 text-center">Información de Tarjeta de Crédito</h4>
          <?php if (isset($_SESSION['error_pedido'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error_pedido']; ?>
          </div>
          <?php } ?>
          <?php unset($_SESSION['error_pedido'], $_SESSION['success_pedido']); ?>
        </div>
        <div class="card-body">
          <form action="<?php echo URL . 'Pedido/procesarPedidoT'; ?>" method="POST">
            <!-- tabla de resumen de pedido -->
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
            <!-- tarjeta de credito -->
            <div class="form-group">
              <label for="nombre" class="mb-2 mt-2">Nombre del Titular de la Tarjeta</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
            </div>
            <div class="form-group">
              <label for="numero" class="mb-2 mt-2">Número de Tarjeta de Crédito</label>
              <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingrese el número" required maxlength="19" pattern="^\d{4}\s?\d{4}\s?\d{4}\s?\d{4}$" oninput="formatCreditCardNumber(this)">
              <small>Formato esperado: xxxx xxxx xxxx xxxx</small>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="fecha" class="mb-2 mt-2">Fecha de Vencimiento</label>
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="mes" required>
                      <option value="" class="mb-2 mt-2">Mes</option>
                      <?php for ($i = 1; $i <= 12; $i++) { ?>
                      <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', $i); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="anio" required>
                      <option value="" class="mb-2 mt-2">Año</option>
                      <?php for ($i = date('Y'); $i <= date('Y') + 50; $i++) { ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="cvv" class="mb-2 mt-2">Código de Seguridad (CVV)</label>
                <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Ingrese el CVV" required maxlength="3" pattern="\d{3}">
              </div>
            </div>
            <div class="form-group">
              <label for="ubicacion" class="mb-2 mt-2">Dirección de Envío:</label>
              <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ingrese la dirección de envío" required>
            </div>

            <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <input type="hidden" name="id_estado_pedido" value="1">
                     <button type="submit" class="btn btn-primary mt-3">Comprar</button>
                </div>
            </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>



<script>
    // Función para agregar espacios automáticamente cada 4 caracteres en el campo de número de tarjeta de crédito
    function formatCreditCardNumber(el) {
        var value = el.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        var matches = value.match(/\d{4,16}/g);
        var match = matches && matches[0] || '';
        var parts = [];
        for (i=0, len=match.length; i<len; i+=4) {
            parts.push(match.substring(i, i+4));
        }
        if (parts.length) {
            el.value = parts.join(' ');
        } else {
            el.value = value;
        }
    }
</script>
