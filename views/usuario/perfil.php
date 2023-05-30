<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>


<style>
.navbar-brand{
    background-image: linear-gradient(to right, #F2921D, #A61F69);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: bold;
  font-size: 2.9rem;
}
</style>

<div class="container my-4 mx-auto">
    <div class="text-center">
        <h1 class="navbar-brand">Mi perfil</h1>
        <hr>
        <div style="display: flex; justify-content: center;">
            <img src="../public/img/perfil.png" class="d-block" alt="..." width="100" height="100">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 col-sm-12 mx-auto">
        <div style="display: flex; justify-content: center;">
            <h3>Información personal</h3>
        </div>
            
            <table class="table table-striped">
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

            <div class="text-center">
                <a href="<?php echo URL ?>Usuario/editPerfil" class="btn btn-primary mt-2">
                    <i class="fas fa-user-edit"></i> Editar Información
                </a>

                <a href="<?php echo URL ?>Usuario/cambioC" class="btn btn-primary mt-2">
                    <i class="fas fa-lock"></i> Cambiar Contraseña
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Agregamos los scripts de Bootstrap -->
<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>

