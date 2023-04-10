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
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

             // Creamos una instancia del modelo de usuario
             $userModel = new UsuarioModel();

            $user = UsuarioModel::getUserByEmail($correo);
            if($user){
                // El correo ya está registrado, mostrar un mensaje de error

                $_SESSION["mensaje"] = "El correo electrónico ya está registrado. Por favor, utilice otro correo.";
                $_SESSION["mensaje_tipo"] = "alert-success";
                $this->RenderView("Layout/Registro");
                exit();

            }
           
            // Intentamos crear el usuario
            if($userModel->createUser($nombre, $apellido, $correo, $telefono, $direccion, $sexo, $rol, $hashed_password)) {
                // Si el usuario se creó correctamente, redireccionamos a la página de inicio de sesión
                header("Location: " . URL . "Home/");
                exit();
            } else {
                // Si hubo algún error, mostramos un mensaje de error en la página de registro
               // $this->RenderView("Home/registro.php", ["error" => "Error al crear el usuario"]);
            }
        } else {
            // Si no se recibió una petición POST, redireccionamos a la página de registro
            header("Location: " . URL . "Registro/index");
        }
    }
}
