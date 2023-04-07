<?php
require_once "models/usuariomodel.php";

class RegistroController extends Controller {
    
    public function index() {
        $this->RenderView("Home/registro.php");
    }

    public function register() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recibimos los datos del formulario
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $sexo = $_POST["sexo"];
            $rol = $_POST["rol"];
            $password = $_POST["password"];
             // Creamos una instancia del modelo de usuario
             $userModel = new UsuarioModel();

            $user = UsuarioModel::getUserByEmail($correo);
            if($user){
                // El correo ya está registrado, mostrar un mensaje de error
                echo "El correo electrónico ya está registrado. Por favor, utilice otro correo.";
                return;
            }
           

            // Intentamos crear el usuario
            if($userModel->createUser($nombre, $apellido, $correo, $telefono, $direccion, $sexo, $rol, $password)) {
                // Si el usuario se creó correctamente, redireccionamos a la página de inicio de sesión
                header("Location: " . URL . "Home/Login");
                exit();
            } else {
                // Si hubo algún error, mostramos un mensaje de error en la página de registro
                $this->RenderView("Home/registro.php", ["error" => "Error al crear el usuario"]);
            }
        } else {
            // Si no se recibió una petición POST, redireccionamos a la página de registro
            header("Location: " . URL . "Registro/index");
        }
    }
}