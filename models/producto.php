<?php
require_once 'models/conexion.php';

class Producto {
    private $id_producto;
    private $nombre;
    private $precio;
    private $descripcion_prod;
    private $categoria;
    private $image_url;
    private $estado;


    public function __construct($id_producto = null, $nombre = null, $precio = null, $descripcion_prod = null, $categoria = null, $image_url = null, $estado = null) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion_prod = $descripcion_prod;
        $this->categoria = $categoria;
        $this->image_url = $image_url;
        $this->estado = $estado;
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

    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    

    public static function listarProductos() {
        $productos = array();
        try {
            $con = Conexion::getConection();
            $sql = "SELECT p.id_producto, p.nombre, p.precio, p.descripcion_prod, c.descripcion AS categoria, p.image_url, p.estado FROM producto p JOIN categoria c ON p.categoria = c.id_categoria";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto = new Producto($row['id_producto'], $row['nombre'], $row['precio'], $row['descripcion_prod'], $row['categoria'], $row['image_url'], $row['estado']);
                $productos[] = $producto;
            }
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $productos;
    }
    public static function listarProductosByIdCategoria($idCategoria) {
        $productos = array();
        try {
            $con = Conexion::getConection();
            $sql = "SELECT p.id_producto, p.nombre, p.precio, p.descripcion_prod, c.descripcion AS categoria, p.image_url, p.estado FROM producto p JOIN categoria c ON p.categoria = c.id_categoria WHERE p.categoria = ?";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1, $idCategoria, PDO::PARAM_INT);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto = new Producto($row['id_producto'], $row['nombre'], $row['precio'], $row['descripcion_prod'], $row['categoria'], $row['image_url'], $row['estado']);
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
                $producto = new Producto($row['id_producto'], $row['nombre'], $row['precio'], $row['descripcion_prod'], $row['categoria'], $row['image_url'], $row['estado']);
                return $producto;
            }
    
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return null;
    }
    

    public static function agregarProducto($nombre, $precio, $descripcion_prod, $categoria, $image_url, $estado) {
        try {
            $con = Conexion::getConection();
            $sql = "INSERT INTO producto (nombre, precio, descripcion_prod, categoria, image_url, estado) VALUES (:nombre, :precio, :descripcion_prod, :categoria, :image_url, :estado)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion_prod', $descripcion_prod, PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_INT); // Se agrega el parámetro del estado
            $stmt->execute();
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    public static function editarProducto($id_producto) {
        try {
            $con = Conexion::getConection();
            $sql = "SELECT * FROM producto WHERE id_producto = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':id', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
    
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto = new Producto($row['id_producto'], $row['nombre'], $row['precio'], $row['descripcion_prod'], $row['categoria'], $row['image_url'], $row['estado']);
                return $producto;
            }
    
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return null;
    }
    
    public static function actualizarProducto($id_producto, $nombre, $precio, $descripcion_prod, $categoria, $image_url, $estado) {
        try {
            $con = Conexion::getConection();
            $sql = "UPDATE producto SET nombre = :nombre, precio = :precio, descripcion_prod = :descripcion_prod, categoria = :categoria, image_url = :image_url, estado = :estado WHERE id_producto = :id_producto";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion_prod', $descripcion_prod, PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
            $stmt = null;
            $con = null;
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error general: " . $e->getMessage();
        }
    }
    
    
    
    public function actualizarEstado($id_producto, $nuevo_estado) {
        try {
            $con = Conexion::getConection();
            $sql = "UPDATE producto SET estado = :nuevo_estado WHERE id_producto = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nuevo_estado', $nuevo_estado, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
            
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    
}

?>
