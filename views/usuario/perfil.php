<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

<div class="container">
  <h1>Mi perfil</h1>
  <hr>


  <div class="row">
    <div class="col-md-6">
      <h3>Información personal</h3>
      <table class="table">
        <tr>
          <th>Nombre:</th>
          <td><?php echo $viewData['usuario']['nombre_usuario']; ?></td>
        </tr>
        <tr>
          <th>Apellido:</th>
          <td><?php echo $viewData['usuario']['apellido_usuario']; ?></td>
        </tr>
        <tr>
          <th>Correo:</th>
          <td><?php echo $viewData['usuario']['correo']; ?></td>
        </tr>
        <tr>
          <th>Teléfono:</th>
          <td><?php echo $viewData['usuario']['telefono']; ?></td>
        </tr>
        <tr>
          <th>Dirección:</th>
          <td><?php echo $viewData['usuario']['direccion']; ?></td>
        </tr>
        <tr>
          <th>Sexo:</th>
          <td><?php echo $viewData['usuario']['sexo']; ?></td>
        </tr>
      </table>
      <a href="<?php echo URL ?>Usuario/editPerfil" class="btn btn-primary">Editar Información</a>
      <a href="<?php echo URL ?>Usuario/cambioC" class="btn btn-primary">Cambiar Contraseña</a>

    </div>
  </div>
</div>

<!-- Agregamos los scripts de Bootstrap -->
<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>

