<?php

    // Incluir las clases necesarias
    require_once 'models/producto.php';
    require_once 'models/pedido.php';
    require_once 'models/detallepedido.php';

    // Crear un nuevo Pedido
    class PedidoController extends Controller
    {
        public function procesarPedido()
        {
            //defininimos nuestro carrito 
            $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
            
            // Crear un nuevo Pedido
            $pedido = new Pedido();
            $pedido->setTotalPagar($_POST['total_pagar']); // Asignar el total a pagar del formulario
            $pedido->setFechaPedido(date('Y-m-d')); // Asignar la fecha actual como fecha del pedido
            $pedido->setIdUsuario($_SESSION["user_id"]); // Asignar el ID de usuario obtenido de la sesión
            $pedido->setIdEstadoPedido($_POST['id_estado_pedido']);
            $pedido->setUbicacion($_POST['direccion_envio']);
            $pedido->guardar(); // Guardar el Pedido en la base de datos
    
            // Crear los detalles de pedido para cada producto en el carrito
            foreach ($carrito as $item) {
                $detallePedido = new DetallePedido();
                $detallePedido->setIdPedido($pedido->getIdPedido()); // Asignar el ID del pedido creado
                $detallePedido->setIdProducto($item['producto']->getIdProducto()); // Asignar el ID del producto del carrito
                $detallePedido->setCantidad($item['cantidad']); // Asignar la cantidad del producto del carrito
    
                $detallePedido->guardarDetallePedido(); // Guardar el detalle de pedido en la base de datos
            }
    
            // Vaciar el carrito
            // Redirigir al home y vaciar el carrito
                if ($pedido->getIdPedido() === null) {
                    $_SESSION['error_pedido'] = 'No se pudo procesar el pedido, por favor inténtelo de nuevo.';
                } else {
                    $_SESSION['success_pedido'] = '¡El pedido se ha creado exitosamente!';
                    $_SESSION['carrito'] = array();

                }

    
            // Redirigir al home y vaciar el carrito
            $this->RenderView('Home/carrito', array('carrito' => $carrito));
            exit();
        }
    }
    






