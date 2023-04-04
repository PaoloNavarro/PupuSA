<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<h2>Ingrese los datos de su tarjeta de crédito y la dirección de envío</h2>
<form action="<?php echo URL . 'Pago/procesar_tarjeta'; ?>" method="POST">
    <div>
        <label for="numero_tarjeta">Número de tarjeta:</label>
        <input type="text" name="numero_tarjeta" id="numero_tarjeta">
    </div>
    <div>
        <label for="nombre_titular">Nombre del titular:</label>
        <input type="text" name="nombre_titular" id="nombre_titular">
    </div>
    <div>
        <label for="fecha_vencimiento">Fecha de vencimiento:</label>
        <input type="text" name="fecha_vencimiento" id="fecha_vencimiento">
    </div>
    <div>
        <label for="codigo_seguridad">Código de seguridad:</label>
        <input type="text" name="codigo_seguridad" id="codigo_seguridad">
    </div>
    <div>
        <label for="direccion_envio">Dirección de envío:</label>
        <input type="text" name="direccion_envio" id="direccion_envio">
    </div>
    <button class="btn btn-success" type="submit">Procesar pago</button>
</form>

