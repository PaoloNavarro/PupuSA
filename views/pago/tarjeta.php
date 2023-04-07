<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

    <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
            <h4>Información de Tarjeta de Crédito</h4>
            </div>
            <div class="card-body">
            <form>
                <div class="form-group">
                <label for="nombre">Nombre del Titular de la Tarjeta</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group">
                <label for="numero">Número de Tarjeta de Crédito</label>
                <input type="text" class="form-control" id="numero" placeholder="Ingrese el número">
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fecha">Fecha de Vencimiento</label>
                    <input type="text" class="form-control" id="fecha" placeholder="MM/AA">
                </div>
                <div class="form-group col-md-6">
                    <label for="cvv">Código de Seguridad (CVV)</label>
                    <input type="text" class="form-control" id="cvv" placeholder="Ingrese el CVV">
                </div>
                <div class="form-group">
                <label for="nombre">direccion de envio:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Lugar de envio:">
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Comprar</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>

<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>
