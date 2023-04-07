<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>



    <body>
        <h1>Registro de usuario</h1>
        <form action="<?php echo URL . 'Registro/register' ?>" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br><br>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" required><br><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" id="correo" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" required><br><br>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" required><br><br>

            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" required>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
                <option value="Otro">Otro</option>
            </select><br><br>

            <label for="rol" >Rol:</label>
            <select name="rol" id="rol">
            <option value="1">Administrador</option>
            <option value="2" >Usuario</option>
            </select>


            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required><br><br>

            <input type="submit" name="submit" value="Registrarse">
        </form>
    </body>




<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>