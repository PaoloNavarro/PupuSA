<?php

require_once "models/conexion.php";

class UsuarioModel {
     
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
        $stmt->bindParam(':password', $password, PDO::PARAM_INT);

        // Ejecutamos la consulta
        $result = $stmt->execute();

        // Cerramos la conexión
        $stmt->closeCursor();
        $con = null;

        // Retornamos true si se creó el usuario o false si hubo algún error
        return $result;
    }
    
}
