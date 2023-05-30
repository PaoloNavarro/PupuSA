<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

<div class="container">
  <h1 class="mt-3" style="color: #c43f3f;">Editar perfil</h1>
  <hr>
  <?php if (isset($_SESSION['msg'])) { ?>
    <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>" role="alert">
        <?php echo $_SESSION['msg']; ?>
    </div>
    <?php
        unset($_SESSION['msg'], $_SESSION['msg_type']);
    } ?>


<div class="row d-flex justify-content-center"">
  <div class="col-md-12">
    <form action="<?php echo URL ?>Usuario/actualizarPerfil" method="post" class="form-inline">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo URL ?>Usuario/actualizarPerfil" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre_usuario" class="mb-2 mt-3">Nombre:</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="<?php echo $viewData['usuario']['nombre_usuario']; ?>" value="<?php echo $viewData['usuario']['nombre_usuario']; ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="apellido_usuario" class="mb-2 mt-3">Apellido:</label>
                <input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="<?php echo $viewData['usuario']['apellido_usuario']; ?>" value="<?php echo $viewData['usuario']['apellido_usuario']; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="correo" class="mb-2 mt-3">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="<?php echo $viewData['usuario']['correo']; ?>" value="<?php echo $viewData['usuario']['correo']; ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="telefono" class="mb-2 mt-3">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="<?php echo $viewData['usuario']['telefono']; ?>" value="<?php echo $viewData['usuario']['telefono']; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="direccion" class="mb-2 mt-3">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="<?php echo $viewData['usuario']['direccion']; ?>" value="<?php echo $viewData['usuario']['direccion']; ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sexo" class="mb-2 mt-3">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo" required>
                  <option value="">Selecciona una opción</option>
                  <option value="Masculino" <?php if ($viewData['usuario']['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                  <option value="Femenino" <?php if ($viewData['usuario']['sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-3" title="Guardar cambios">
            Guardar Cambios <i class="fa fa-save"></i>
          </button>
        </form>
      </div>
    </div>

    
    </form>
  </div>
</div>

  
</div>

<!-- Agregamos los scripts de Bootstrap -->
<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>
