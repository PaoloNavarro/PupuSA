<?php
require_once 'models/conexion.php';

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
            $sql = "SELECT p.id_producto, p.nombre, p.precio, p.descripcion_prod, c.descripcion AS categoria, p.image_url FROM producto p JOIN categoria c ON p.categoria = c.id_categoria;
            ";
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

    public static function agregarProducto($nombre, $precio, $descripcion_prod, $categoria, $image_url) {
        try {
            $con = Conexion::getConection();
            $sql = "INSERT INTO producto (nombre, precio, descripcion_prod, categoria, image_url) VALUES (:nombre, :precio, :descripcion_prod, :categoria, :image_url)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion_prod', $descripcion_prod, PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR);
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
    
    public static function actualizarProducto($id_producto, $nombre, $precio, $descripcion_prod, $categoria, $image_url) {
        try {
            $con = Conexion::getConection();
            $sql = "UPDATE producto SET nombre = :nombre, precio = :precio, descripcion_prod = :descripcion_prod, categoria = :categoria, image_url = :image_url WHERE id_producto = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion_prod', $descripcion_prod, PDO::PARAM_STR);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
            $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR);
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
