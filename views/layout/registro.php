<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>



<body>
  <div class="container">
    <div class="row">
    <h1>Registro de usuario</h1>
    <form id="register-form" action="<?php echo URL . 'Registro/register' ?>" method="post" >
      <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required>
        </div>

        <div class="form-group">
          <label for="apellido">Apellido:</label>
          <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido" required>
        </div>

        <div class="form-group">
						<label for="correo">Correo electrónico</label>
						<input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo electrónico" required>
				</div>

        <div class="form-group">
          <label for="telefono">Teléfono:</label>
          <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su teléfono" required>
        </div>

        <div class="form-group">
          <label for="direccion">Dirección:</label>
          <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese su dirección" required>
        </div>

        <div class="form-group">
          <label for="sexo">Sexo:</label>
          <select class="form-control" name="sexo" id="sexo" required>
            <option value="">Seleccione</option>
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>
        <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"){ ?>
          <div class="form-group">
            <label for="rol">Rol:</label>
            <select class="form-control" name="rol" id="rol">
              <option value="">Seleccione</option>
              <option value="1">Administrador</option>
              <option value="2">Usuario</option>
            </select>
          </div>
        <?php } else { ?>
          <input type="hidden" name="rol" value="2">

        <?php } ?>
      

        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese su contraseña" required>
        </div>
        <hr>
        <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Registrarse">
        </div>
      </form>

    </div>

    </div>
</body>







<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>