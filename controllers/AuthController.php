<?php
require_once "models/usuariomodel.php";

class AuthController extends Controller {
    
    public function index(){
        if(isset($_SESSION["user"])){
            header("Location: /MyFood");
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

            if($userModel->getUserByEmailAndPassword($usuario, $contrasena)) {
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

    public function logout(){
        session_destroy();
        header("Location: " . URL);
    }

}
