<?php
require_once "models/usuariomodel.php";

class AuthController extends Controller {
    
    public function index(){
        if(isset($_SESSION["user"])){
            header("Location: ". URL);
        } else {
            $this->RenderView("Home/login.php");
        }
    }

    public function login(){
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];

            $userModel = new UsuarioModel();
            $user = $userModel->getUserByEmail($usuario);

            if($user && password_verify($contrasena, $user['password'])) {
                $userId = $user['id_usuario']; // Obtener el ID del usuario
                $_SESSION["user_id"] = $userId; // Guardar el ID del usuario en la sesión
                $_SESSION["user"] = $usuario;
    
                if($userModel->isAdmin($usuario)) {
                    $_SESSION["user_type"] = "admin";
                    header("Location:" . URL ."Admin");
                } else {
                    $_SESSION["user_type"] = "normal";
                    header("Location:" . URL ."");
                }
                exit(); // Agregamos exit() para detener la ejecución del script después de redireccionar
            } else {
                $this->RenderView("Home/login", ["error" => "Usuario o contraseña incorrectos"]);
            }
        } else {
            header("Location: ". URL ."");

        }
    }
    public function redirectToHome() {
        header("Location: " . URL);
        exit();
    }
    public function logout(){
        session_destroy();
        $this->redirectToHome();
    }

}
