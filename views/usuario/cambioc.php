<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

<div class="container">
  <h1>Cambio de Contraseña</h1>
  <hr>
  <?php if (isset($_SESSION["mensaje"]) && isset($_SESSION["mensaje_tipo"])): ?>
    <div class="alert <?php echo $_SESSION["mensaje_tipo"]; ?> mt-3 mb-0">
        <?php echo $_SESSION["mensaje"]; ?>
    </div>
    <?php unset($_SESSION["mensaje"]); unset($_SESSION["mensaje_tipo"]); ?>
<?php endif; ?>

  <div class="row">
    <div class="col-md-6">
      <form method="post" action="<?php echo URL ?>Usuario/cambiarContrasena">
        <div class="form-group">
          <label for="contrasena_actual">Contraseña Actual:</label>
          <input type="password" name="contrasena_actual" id="contrasena_actual" class="form-control" placeholder="Ingrese su contraseña actual" required>
        </div>
        <div class="form-group">
          <label for="nueva_contrasena">Nueva Contraseña:</label>
          <input type="password" name="nueva_contrasena" id="nueva_contrasena" class="form-control" placeholder="Ingrese su nueva contraseña" required>
        </div>
        <div class="form-group">
          <label for="confirmar_contrasena">Confirmar Contraseña:</label>
          <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control" placeholder="Confirme su nueva contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
      </form>
    </div>
  </div>
</div>

<!-- Agregamos los scripts de Bootstrap -->
<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>

