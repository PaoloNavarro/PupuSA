<?php

require_once "models/conexion.php";

class UsuarioModel {
    private $id_usuario;
    private $nombre_usuario;
    private $apellido_usuario;
    private $correo;
    private $telefono;
    private $direccion;
    private $sexo;
    private $rol;
    private $password;

    public function __construct($id_usuario=null, $nombre_usuario=null, $apellido_usuario=null, $correo=null, $telefono=null, $direccion=null, $sexo=null, $rol=null, $password=null) {
        $this->id_usuario = $id_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->apellido_usuario = $apellido_usuario;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->sexo = $sexo;
        $this->rol = $rol;
        $this->password = $password;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getNombreUsuario() {
        return $this->nombre_usuario;
    }

    public function setNombreUsuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function getApellidoUsuario() {
        return $this->apellido_usuario;
    }

    public function setApellidoUsuario($apellido_usuario) {
        $this->apellido_usuario = $apellido_usuario;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
     
    public static function getUserByEmail($correo) {
        // Obtenemos la instancia de la conexión a la base de datos
        $con = Conexion::getConection();    
        // Preparamos la consulta SQL
        $query = "SELECT * FROM usuarios WHERE correo = :correo";
    
        // Preparamos la sentencia
        $stmt = $con ->prepare($query);
    
        // Vinculamos los parámetros
        $stmt->bindParam(":correo", $correo);
    
        // Ejecutamos la consulta
        $stmt->execute();
    
        // Obtenemos el resultado
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Retornamos el resultado (o null si no se encontró ningún registro)
        return $result ? $result : null;
    }

    // Método para obtener el ID del usuario logeado en la sesión
    public static function getLoggedUserId() {
        // Verificamos si el usuario ha iniciado sesión
        if (isset($_SESSION['usuario_id'])) {
            // Retornamos el ID del usuario almacenado en la sesión
            return $_SESSION['usuario_id'];
        } else {
            // Si el usuario no ha iniciado sesión, retornamos null o puedes manejarlo de acuerdo a tus necesidades
            return null;
        }
    }
    
    
    public static function getUserByEmailAndPassword($email, $password) {
        // Obtenemos la conexión a la base de datos
        $con = Conexion::getConection();
        // Preparamos la consulta
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE correo = :email AND password = :password");

        // Asignamos los valores a los parámetros
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        // Ejecutamos la consulta
        $stmt->execute();

        // Obtenemos los resultados
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        // Obtener el ID del usuario
        $userId = $usuario['id'];

        // Cerramos la conexión
        $stmt->closeCursor();
        $con = null;

        // Retornamos el usuario obtenido o null si no se encontró ninguno
        return $usuario ?: null;
    }

    public function isAdmin($email)
    {
        $con = Conexion::getConection();
        $stmt = $con->prepare("SELECT rol FROM usuarios WHERE correo = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $stmt->closeCursor();
        $con = null;
    
        return $row['rol'] == 1;
    }

    //metodo registro de usuario
    public static function createUser($nombre, $apellido, $correo, $telefono, $direccion, $sexo, $rol, $password) {
        // Obtenemos la conexión a la base de datos
        $con = Conexion::getConection();
        var_dump($password);
        // Preparamos la consulta
        $stmt = $con->prepare("INSERT INTO usuarios (nombre_usuario, apellido_usuario, correo, telefono, direccion, sexo, rol, password) VALUES (:nombre, :apellido, :correo, :telefono, :direccion, :sexo, :rol, :password)");

        // Asignamos los valores a los parámetros
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_INT);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        // Ejecutamos la consulta
        $result = $stmt->execute();

        // Cerramos la conexión
        $stmt->closeCursor();
        $con = null;

        // Retornamos true si se creó el usuario o false si hubo algún error
        return $result;
    }

    public static function obtenerPorId($id_usuario) {
        // Obtenemos la instancia de la conexión a la base de datos
        $con = Conexion::getConection();
    
        // Preparamos la consulta SQL
        $query = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
    
        // Preparamos la sentencia
        $stmt = $con->prepare($query);
    
        // Vinculamos los parámetros
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    
        // Ejecutamos la consulta
        $stmt->execute();
    
        // Obtenemos el resultado
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Cerramos la conexión
        $stmt->closeCursor();
        $con = null;
    
        // Retornamos el resultado (o null si no se encontró ningún registro)
        return $result ?: null;
    }
    public function actualizarPerfil($id_usuario, $nombre_usuario, $apellido_usuario, $correo, $telefono, $direccion, $sexo)
    {
        $con = Conexion::getConection();
    
        if (!$con) {
            return false;
        }
    
        $query = "UPDATE usuarios SET nombre_usuario=:nombre_usuario, apellido_usuario=:apellido_usuario, correo=:correo, telefono=:telefono, direccion=:direccion, sexo=:sexo WHERE id_usuario=:id_usuario";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':apellido_usuario', $apellido_usuario);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':sexo', $sexo);
        return $stmt->execute();
    }

    public function validarUsuario($id_usuario, $contrasena)
    {
        $con = Conexion::getConection();
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contrasena, $usuario['password'])) {
            return $usuario;
        } else {
            return null;
        }
}


    public function actualizarContrasena($id_usuario, $nueva_contrasena)
    {
        $con = Conexion::getConection();
        $nueva_contrasena = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
        $query = "UPDATE usuarios SET password=:nueva_contrasena WHERE id_usuario=:id_usuario";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nueva_contrasena', $nueva_contrasena);
        return $stmt->execute();
    }


    
    
    
}
