<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/registro.css" ?>">



<body>
    <section>
      <div class="form-box mt-4">
        <!-- Formulario de registro de usuario -->
        <form id="register-form" class="form" action="<?php echo URL . 'Registro/register' ?>" method="post" >
          
          <!-- Titulo  -->
          <h2>Registro de usuario</h2>
          <?php if (isset($_SESSION["mensaje"]) && isset($_SESSION["mensaje_tipo"])): ?>
              <div class="alert <?php echo $_SESSION["mensaje_tipo"]; ?> mt-3 mb-0">
                  <?php echo $_SESSION["mensaje"]; ?>
              </div>
              <?php unset($_SESSION["mensaje"]); unset($_SESSION["mensaje_tipo"]); ?>
          <?php endif; ?>
          
           <div class="row">
               <!-- Nombre -->
            <div class="inputbox">
              <i class="fa-regular fa-user"></i>
              <input type="text" name="nombre" id="nombre" required>
              <label for="nombre">Nombre:</label>
            </div>

            <!-- Apellido -->
            <div class="inputbox">
              <i class="fa-regular fa-user"></i>
              <input type="text" name="apellido" id="apellido" required>
              <label for="apellido">Apellido:</label>
            </div>
           </div>

           <div class="row">
              <!-- email -->
              <div class="inputbox">
                <i class="fa-regular fa-user"></i>
                  <input type="email"  id="correo" name="correo"  required>
                  <label for="correo">Correo electrónico</label>
              </div>
              <!-- telefono -->
              <div class="inputbox">
              <i class="fa-solid fa-mobile-screen"></i>
                <input type="text"  name="telefono" id="telefono" required>
                <label for="telefono">Teléfono:</label>
              </div>
           </div>

           <div class="row">
              <!-- direccion -->
              <div class="inputbox">
                <i class="fa-regular fa-address-book"></i>
                <input  type="text" name="direccion" id="direccion"  required>
                <label for="direccion">Dirección:</label>
              </div>

              <!-- password -->
              <div class="inputbox">
              <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password"  required>
                <label for="password">Contraseña:</label>
              </div>
           </div>

            

            <div class="row">
              <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-select" name="sexo" id="sexo" required>
                  <option value="">Seleccione</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>


            <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"){ ?>
              <div class="row">
                <div class="form-group">
                  <label for="rol">Rol:</label>
                  <select class="form-select" name="rol" id="rol">
                    <option value="">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>
                </div>
              </div>
            <?php } else { ?>
              <input type="hidden" name="rol" value="2">

            <?php } ?>
          

            

            <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit"  id="bton" value="Registrarse">
            </div>
          </form>
    </section>
</body>







<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>