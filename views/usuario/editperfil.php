<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

<div class="container">
  <h1>Editar perfil</h1>
  <hr>

  <div class="row">
    <div class="col-md-6">
      <form action="<?php echo URL ?>Usuario/actualizarPerfil" method="post">
        <div class="form-group">
          <label for="nombre_usuario">Nombre:</label>
          <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="<?php echo $viewData['usuario']['nombre_usuario']; ?>" value="<?php echo $viewData['usuario']['nombre_usuario']; ?>" required>
        </div>
        <div class="form-group">
          <label for="apellido_usuario">Apellido:</label>
          <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="<?php echo $viewData['usuario']['apellido_usuario']; ?>" value="<?php echo $viewData['usuario']['apellido_usuario']; ?>" required>
        </div>
        <div class="form-group">
          <label for="correo">Correo:</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="<?php echo $viewData['usuario']['correo']; ?>" value="<?php echo $viewData['usuario']['correo']; ?>" required>
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="<?php echo $viewData['usuario']['telefono']; ?>" value="<?php echo $viewData['usuario']['telefono']; ?>" required>
        </div>
        <div class="form-group">
          <label for="direccion">Dirección:</label>
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="<?php echo $viewData['usuario']['direccion']; ?>" value="<?php echo $viewData['usuario']['direccion']; ?>" required>
        </div>
        <div class="form-group">
          <label for="sexo">Sexo:</label>
          <select class="form-control" id="sexo" name="sexo" required>
            <option value="">Selecciona una opción</option>
            <option value="Masculino" <?php if ($viewData['usuario']['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option value="Femenino" <?php if ($viewData['usuario']['sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </form>
    </div>
  </div>
</div>

<!-- Agregamos los scripts de Bootstrap -->
<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>
