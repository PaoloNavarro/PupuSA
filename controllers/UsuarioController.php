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
        /*$id_usuario = $_SESSION["user_id"];
        $pedidos_activos = PedidoModel::obtenerPedidosPorIdUsuario($id_usuario, 'activo');
        $pedidos_historial = PedidoModel::obtenerPedidosPorIdUsuario($id_usuario, 'completado');
        $this->RenderView("Usuario/Pedido", ['pedidos_activos' => $pedidos_activos, 'pedidos_historial' => $pedidos_historial]);*/
        $id_usuario = $_SESSION["user_id"];
          // llamamos al modelo Pedido y creamos una instancia
        $pedido = new Pedido();

          // llamamos al método obtenerPedidoPorId y pasamos el id del pedido como argumento
        $pedidos = $pedido->obtenerPedidosPorUsuario($id_usuario);

       
        $this->RenderView("Usuario/Pedido",['pedidos' => $pedidos]);
    }
   
    
   

}
