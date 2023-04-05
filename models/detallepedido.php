<?php
require_once 'models/conexion.php';

class DetallePedido {
    private $idDetalle;
    private $idProducto;
    private $idPedido;
    private $idUsuario;
    private $idEstadoPedido;
    private $cantidad;


    public function __construct($idDetalle=null, $idProducto=null, $idPedido=null, $idUsuario=null, $idEstadoPedido=null, $cantidad=null) {
        $this->idDetalle = $idDetalle;
        $this->idProducto = $idProducto;
        $this->idPedido = $idPedido;
        $this->idUsuario = $idUsuario;
        $this->idEstadoPedido = $idEstadoPedido;
        $this->cantidad = $cantidad;

    }

    public function getIdDetalle() {
        return $this->idDetalle;
    }

    public function setIdDetalle($idDetalle) {
        $this->idDetalle = $idDetalle;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdEstadoPedido() {
        return $this->idEstadoPedido;
    }

    public function setIdEstadoPedido($idEstadoPedido) {
        $this->idEstadoPedido = $idEstadoPedido;
    }
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    // Métodos para interactuar con la base de datos

    public function guardarDetallePedido() {
        // Obtener la conexión a la base de datos
        $con = Conexion::getConection();
    
        // Verificar si se pudo establecer la conexión
        if ($con == "ERROR") {
            return false; // Retorna false si no se pudo conectar a la base de datos
        }
    
        try {
            // Preparar la consulta SQL
            $query = "INSERT INTO detalle_pedido (id_producto, id_pedido, id_usuario, id_estado_pedido, cantidad) 
            VALUES (?, ?, ?, ?, ?)";
            $stmt = $con->prepare($query);
    
            // Asignar los valores a los parámetros de la consulta
            $stmt->bindParam(1, $this->idProducto);
            $stmt->bindParam(2, $this->idPedido);
            $stmt->bindParam(3, $this->idUsuario);
            $stmt->bindParam(4, $this->idEstadoPedido);
            $stmt->bindParam(5, $this->cantidad);

    
            // Ejecutar la consulta
            $result = $stmt->execute();
    
            // Cerrar la conexión
            $con = null;
    
            return $result; // Retorna true si se guardó correctamente, false si hubo un error
    
        } catch (Exception $e) {
            // Mostrar el mensaje de error
            echo "Error: " . $e->getMessage();
    
            return false; // Retorna false si hubo un error
        }
    }
    

    // Otros métodos para consultar, actualizar o eliminar detalles de pedido si es necesario

}
?>
