<?php
require_once "models/usuariomodel.php";
require_once "models/pedido.php";


class UsuarioController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {

        $this->RenderView("Usuario/Index");
    }

    public function Perfil()
    {
        $id_usuario=$_SESSION["user_id"];
        $usuario = UsuarioModel::obtenerPorId($id_usuario);
        $this->RenderView("Usuario/Perfil",['usuario' => $usuario]);
    }

    public function Pedido()
    {
        $id_usuario = $_SESSION["user_id"];
        $fecha = isset($_POST['fecha_pedido']) ? $_POST['fecha_pedido'] : date('Y-m-d');
        $id_estado = isset($_POST['id_estado']) ? $_POST['id_estado'] : '';
       

        $pedido = new Pedido();
        $pedidos = $pedido->obtenerPedidosPorUsuario($id_usuario, $fecha, $id_estado);
       
        $this->RenderView("Usuario/Pedido",['pedidos' => $pedidos]);
    }
    

    public function cambioC()
    {
        // Mostrar vista de cambio de contraseña
        $this->RenderView("Usuario/cambioC");
    }
    public function cambiarContrasena()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contrasena_actual = $_POST['contrasena_actual'];
            $nueva_contrasena = $_POST['nueva_contrasena'];
            $confirmar_contrasena = $_POST['confirmar_contrasena'];
    
            $usuario = new UsuarioModel();
            $usuario_valido = $usuario->validarUsuario($_SESSION["user_id"], $contrasena_actual);
            if (!$usuario_valido) {
                $_SESSION["mensaje"] = "La contraseña actual es incorrecta";
                $_SESSION["mensaje_tipo"] = "alert-danger";
                header("Location: " . URL . "Usuario/cambiarContrasena");
                exit();
            }
    
            if ($nueva_contrasena != $confirmar_contrasena) {
                $_SESSION["mensaje"] = "Las contraseñas no coinciden";
                $_SESSION["mensaje_tipo"] = "alert-danger";
                header("Location: " . URL . "Usuario/cambiarContrasena");
                exit();
            }
    
            $resultado = $usuario->actualizarContrasena($_SESSION["user_id"], $nueva_contrasena);
            if ($resultado) {
                $_SESSION["mensaje"] = "Contraseña actualizada exitosamente";
                $_SESSION["mensaje_tipo"] = "alert-success";
                header("Location: " . URL . "Usuario/cambiarContrasena");
                exit();
            } else {
                $_SESSION["mensaje"] = "Error al actualizar la contraseña";
                $_SESSION["mensaje_tipo"] = "alert-danger";
                header("Location: " . URL . "Usuario/cambiarContrasena");
                exit();
            }
        } else {
            $this->RenderView("Usuario/cambioC");
           
        }
    }
    
    
    public function editPerfil()
    {
        $id_usuario=$_SESSION["user_id"];
        $usuario = UsuarioModel::obtenerPorId($id_usuario);

        $this->RenderView("Usuario/editPerfil",['usuario' => $usuario]);
    }
    public function actualizarPerfil()
    {
        $idUsuario = $_SESSION["user_id"];
        $nombreUsuario = $_POST['nombre_usuario'];
        $apellidoUsuario = $_POST['apellido_usuario'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $sexo = $_POST['sexo'];
    
        $usuario = new UsuarioModel();
        $usuario->actualizarPerfil($idUsuario, $nombreUsuario, $apellidoUsuario, $correo, $telefono, $direccion, $sexo);
    
        header("Location: " . URL . "Usuario/perfil");
    }
    

   

    
   

}
