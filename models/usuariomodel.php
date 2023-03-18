<?php

require_once "models/Conexion.php";

class UsuarioModel {
     

    
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
    
}
