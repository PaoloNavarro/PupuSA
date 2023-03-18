<?php if (!empty($carrito)): ?>
  <table>
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Subtotal</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($carrito as $id_producto => $producto): ?>
        <tr>
          <td><?php echo $producto['producto']->nombre; ?></td>
          <td><?php echo $producto['cantidad']; ?></td>
          <td>$<?php echo number_format($producto['producto']->precio, 2); ?></td>
          <td>$<?php echo number_format($producto['producto']->precio * $producto['cantidad'], 2); ?></td>
          <td>
            <form method="post" action="<?=URL?>carrito/eliminarProducto">
              <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
              <button type="submit">Eliminar</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">Total</td>
        <td>$<?php echo number_format($total, 2); ?></td>
        <td></td>
      </tr>
    </tfoot>
  </table>
  <form>
    <label for="direccion">Dirección de envío:</label>
    <textarea name="direccion" id="direccion" cols="30" rows="5"></textarea>
    <br>
    <label for="forma_pago">Forma de pago:</label>
    <select name="forma_pago" id="forma_pago">
      <option value="tarjeta_credito">Tarjeta de crédito</option>
      <option value="paypal">PayPal</option>
      <option value="efectivo">Efectivo</option>
    </select>
  </form>
<?php else: ?>
  <p>No hay productos en el carrito</p>
<?php endif; ?>
