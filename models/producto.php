<?php
require_once 'Conexion.php';

class Producto {
    private $id_producto;
    private $nombre;
    private $precio;
    private $descripcion_prod;
    private $categoria;
    private $image_url;

    public function __construct($id_producto = null, $nombre = null, $precio = null, $descripcion_prod = null, $categoria = null,$image_url = null) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion_prod = $descripcion_prod;
        $this->categoria = $categoria;
        $this->image_url = $image_url; // asignar el valor de la nueva propiedad

    }
    public function getImageUrl() {
        return $this->image_url;
    }

    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDescripcionProd() {
        return $this->descripcion_prod;
    }

    public function setDescripcionProd($descripcion_prod) {
        $this->descripcion_prod = $descripcion_prod;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public static function listarProductos() {
        $productos = array();
        try {
            $con = Conexion::getConection();
            $sql = "SELECT * FROM producto";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto = new Producto($row['id_producto'], $row['nombre'], $row['precio'], $row['descripcion_prod'], $row['categoria'], $row['image_url']);
                $productos[] = $producto;
            }
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $productos;
    }
    public static function buscarPorId($id_producto) {
        try {
            $con = Conexion::getConection();
            $sql = "SELECT * FROM producto WHERE id_producto = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':id', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
    
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto = new Producto($row['id_producto'], $row['nombre'], $row['precio'], $row['descripcion_prod'], $row['categoria'], $row['image_url']);
                return $producto;
            }
    
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return null;
    }
    
}

?>
