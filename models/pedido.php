<?php
require_once 'models/conexion.php';

class Pedido
{
    private $id_pedido;
    private $total_pagar;
    private $fecha_pedido;

    public function __construct($id_pedido = null, $total_pagar = null, $fecha_pedido = null)
    {
        $this->id_pedido = $id_pedido;
        $this->total_pagar = $total_pagar;
        $this->fecha_pedido = $fecha_pedido;
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

    public function guardar()
    {
        $con = Conexion::getConection();
        $sql = "INSERT INTO pedidos (total_pagar, fecha_pedido) VALUES (:total_pagar, :fecha_pedido)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':total_pagar', $this->total_pagar, PDO::PARAM_STR);
        $stmt->bindValue(':fecha_pedido', $this->fecha_pedido, PDO::PARAM_STR);
        $stmt->execute();
        $this->id_pedido = $con->lastInsertId();
        $stmt = null;
        $con = null;
    }
    public function listarPedidos($fecha = null)
    {
        $con = Conexion::getConection();

        if ($fecha === null) {
            $fecha = date('Y-m-d');
        }

        $sql = "SELECT * FROM pedidos WHERE fecha_pedido = :fecha_pedido";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':fecha_pedido', $fecha, PDO::PARAM_STR);
        $stmt->execute();

        $resultados = array();

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pedido = new Pedido();
            $pedido->setIdPedido($fila['id_pedido']);
            $pedido->setTotalPagar($fila['total_pagar']);
            $pedido->setFechaPedido($fila['fecha_pedido']);
            $resultados[] = $pedido;
        }

        $stmt = null;
        $con = null;

        return $resultados;
    }

}

?>
