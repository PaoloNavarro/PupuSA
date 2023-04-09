<?php
require_once 'models/conexion.php';

class Pedido
{
    private $id_pedido;
    private $total_pagar;
    private $fecha_pedido;
    private $id_estado_pedido;
    private $id_usuario;
    private $ubicacion;
    private $nombreUsuario;
    private $estadoPedido;



    public function __construct($id_pedido = null, $total_pagar = null, $fecha_pedido = null,$id_estado_pedido=null,$id_usuario=null,$ubicacion=null,
    $nombreUsuario=null,$estadoPedido=null)
    {
        $this->id_pedido = $id_pedido;
        $this->total_pagar = $total_pagar;
        $this->fecha_pedido = $fecha_pedido;
        $this->id_estado_pedido = $id_estado_pedido;
        $this->id_usuario = $id_usuario;
        $this->ubicacion = $ubicacion;
        $this->nombreUsuario = $nombreUsuario;
        $this->estadoPedido = $estadoPedido;


    }
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }
    

    public function getEstadoPedido()
    {
        return $this->estado_pedido;
    }
    
    
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    public function getTotalPagar()
    {
        return $this->total_pagar;
    }

    public function getFechaPedido()
    {
        return $this->fecha_pedido;
    }

    public function getIdEstadoPedido()
    {
        return $this->id_estado_pedido;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    public function setTotalPagar($total_pagar)
    {
        $this->total_pagar = $total_pagar;
    }

    public function setFechaPedido($fecha_pedido)
    {
        $this->fecha_pedido = $fecha_pedido;
    }
    public function setIdEstadoPedido($id_estado_pedido)
    {
        $this->id_estado_pedido = $id_estado_pedido;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }



    public function setEstadoPedido($estado_pedido)
    {
        $this->estado_pedido = $estado_pedido;
    }



    public function guardar()
    {
        $con = Conexion::getConection();
        $sql = "INSERT INTO pedidos (total_pagar, fecha_pedido, id_estado_pedido, id_usuario, ubicacion) 
                VALUES (:total_pagar, :fecha_pedido, :id_estado_pedido, :id_usuario, :ubicacion)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':total_pagar', $this->total_pagar, PDO::PARAM_STR);
        $stmt->bindValue(':fecha_pedido', $this->fecha_pedido, PDO::PARAM_STR);
        $stmt->bindValue(':id_estado_pedido', $this->id_estado_pedido, PDO::PARAM_INT);
        $stmt->bindValue(':id_usuario', $this->id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(':ubicacion', $this->ubicacion, PDO::PARAM_STR);
        $stmt->execute();
        $this->id_pedido = $con->lastInsertId();
        $stmt = null;
        $con = null;
    }
    
    public function listarPedidos($fecha = null, $estado = null)
    {
        $con = Conexion::getConection();
    
        if ($fecha === null) {
            $fecha = date('Y-m-d');
        }
    
        $sql = "SELECT pedidos.*, usuarios.nombre_usuario AS nombre_usuario, estado_pedido.estado AS estado_pedido 
                FROM pedidos 
                INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id_usuario 
                INNER JOIN estado_pedido ON pedidos.id_estado_pedido = estado_pedido.id_estado_pedido
                WHERE pedidos.fecha_pedido = :fecha";
    
        if ($estado !== null) {
            $sql .= " OR pedidos.id_estado_pedido = :id_estado_pedido";
        }
        
        $stmt = $con->prepare($sql);
        
        $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        
        if ($estado !== null) {
            $stmt->bindValue(':id_estado_pedido', $estado, PDO::PARAM_INT);
        }
        
        $stmt->execute();
    
        $resultados = array();
    
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pedido = new Pedido();
            $pedido->setIdPedido($fila['id_pedido']);
            $pedido->setTotalPagar($fila['total_pagar']);
            $pedido->setFechaPedido($fila['fecha_pedido']);
            $pedido->setIdUsuario($fila['id_usuario']);
            $pedido->setNombreUsuario($fila['nombre_usuario']);
            $pedido->setIdEstadoPedido($fila['id_estado_pedido']);
            $pedido->setEstadoPedido($fila['estado_pedido']);
            $resultados[] = $pedido;
        }
    
        $stmt = null;
        $con = null;
    
        return $resultados;
    }
    //cambia pedido en base al id.
    public function actualizarEstado($id_pedido, $id_estado)
    {
        $con = Conexion::getConection();
    
        $sql = "UPDATE pedidos SET id_estado_pedido = :id_estado WHERE id_pedido = :id_pedido";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':id_pedido', $id_pedido, PDO::PARAM_INT);
        $stmt->bindValue(':id_estado', $id_estado, PDO::PARAM_INT);
        $stmt->execute();
    
        $stmt = null;
        $con = null;
    }
    
        

    
    


    public function obtenerPedidoPorId($idPedido)
    {
        $con = Conexion::getConection();

        $sql = "SELECT pedidos.*, usuarios.nombre_usuario AS nombre_usuario, estado_pedido.estado AS estado_pedido FROM pedidos INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id_usuario INNER JOIN estado_pedido ON pedidos.id_estado_pedido = estado_pedido.id_estado_pedido WHERE id_pedido = :id_pedido";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':id_pedido', $idPedido, PDO::PARAM_INT);
        $stmt->execute();

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$fila) {
            return null;
        }

        $pedido = new Pedido();
        $pedido->setIdPedido($fila['id_pedido']);
        $pedido->setTotalPagar($fila['total_pagar']);
        $pedido->setFechaPedido($fila['fecha_pedido']);
        $pedido->setIdUsuario($fila['id_usuario']);
        $pedido->setNombreUsuario($fila['nombre_usuario']);
        $pedido->setIdEstadoPedido($fila['id_estado_pedido']);
        $pedido->setEstadoPedido($fila['estado_pedido']);
        $pedido->setUbicacion($fila['ubicacion']);
        $stmt = null;
        $con = null;

        return $pedido;
    }

    public function obtenerPedidosPorUsuario($id_usuario, $fecha = null, $estado = null)
    {
        $con = Conexion::getConection();
    
        $sql = "SELECT pedidos.*, usuarios.nombre_usuario AS nombre_usuario, estado_pedido.estado AS estado_pedido 
                FROM pedidos 
                INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id_usuario 
                INNER JOIN estado_pedido ON pedidos.id_estado_pedido = estado_pedido.id_estado_pedido
                WHERE ";
    
        if ($fecha !== null && $estado !== null && $fecha !== "" && $estado !== "") {
            $sql .= "pedidos.fecha_pedido = :fecha AND pedidos.id_estado_pedido = :id_estado_pedido";
        } else if ($fecha !== null && $fecha !== "") {
            $sql .= "pedidos.fecha_pedido = :fecha";
        } else if ($estado !== null && $estado !== "") {
            $sql .= "pedidos.id_estado_pedido = :id_estado_pedido";
        } else {
            $sql .= "pedidos.id_usuario = :id_usuario";
        }
    
        $stmt = $con->prepare($sql);
    
        if ($fecha !== null && $estado !== null && $fecha !== "" && $estado !== "") {
            $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->bindValue(':id_estado_pedido', $estado, PDO::PARAM_INT);
        } else if ($fecha !== null && $fecha !== "") {
            $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        } else if ($estado !== null && $estado !== "") {
            $stmt->bindValue(':id_estado_pedido', $estado, PDO::PARAM_INT);
        } else {
            $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        }
    
        $stmt->execute();
    
        $resultados = array();
    
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pedido = new Pedido();
            $pedido->setIdPedido($fila['id_pedido']);
            $pedido->setTotalPagar($fila['total_pagar']);
            $pedido->setFechaPedido($fila['fecha_pedido']);
            $pedido->setIdUsuario($fila['id_usuario']);
            $pedido->setNombreUsuario($fila['nombre_usuario']);
            $pedido->setIdEstadoPedido($fila['id_estado_pedido']);
            $pedido->setEstadoPedido($fila['estado_pedido']);
            $resultados[] = $pedido;
        }
    
        $stmt = null;
        $con = null;
    
        return $resultados;
    }
    

    


    


}

?>
