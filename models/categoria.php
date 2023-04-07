<?php

require_once 'models/conexion.php';

class Categoria {
    
    // propiedades
    private $idCategoria;
    private $descripcion;
    private $estado;
    
    // constructor
    public function __construct($idCategoria=null, $descripcion=null, $estado=null) {
        $this->idCategoria = $idCategoria;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }
    
    // getters y setters
    public function getIdCategoria() {
        return $this->idCategoria;
    }
    
    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    // método para agregar una nueva categoría
    public static function agregarCategoria($descripcion, $estado) {
        try {
            $con = Conexion::getConection();
            $sql = "INSERT INTO categoria (descripcion, estado) VALUES (:descripcion, :estado)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
            $stmt->execute();
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    // método para modificar una categoría existente
    public static function modificarCategoria($idCategoria, $descripcion, $estado) {
        try {
            $con = Conexion::getConection();
            $sql = "UPDATE categoria SET descripcion = :descripcion, estado = :estado WHERE id_categoria = :id_categoria";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
            $stmt->bindParam(':id_categoria', $idCategoria, PDO::PARAM_INT);
            $stmt->execute();
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public static function editarCategoria($id_categoria) {
        try {
            $con = Conexion::getConection();
            $sql = "SELECT * FROM categoria WHERE id_categoria = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':id', $id_categoria, PDO::PARAM_INT);
            $stmt->execute();
    
            $categoria = null;
            if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria();
                $categoria->setIdCategoria($row['id_categoria']);
                $categoria->setDescripcion($row['descripcion']);
                $categoria->setEstado($row['estado']);
            }
    
            $stmt = null;
            $con = null;
    
            return $categoria;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    
    // método para obtener todas las categorías
    public static function listarCategorias() {
        $categorias = array();
        try {
            $con = Conexion::getConection();
            $sql = "SELECT id_categoria, descripcion, estado FROM categoria";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria($row['id_categoria'], $row['descripcion'], $row['estado']);
                $categorias[] = $categoria;
            }
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $categorias;
    }

    
    public function actualizarEstado($id_categoria, $nuevo_estado) {
        try {
            $con = Conexion::getConection();
            $sql = "UPDATE categoria SET estado = :nuevo_estado WHERE id_categoria = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':nuevo_estado', $nuevo_estado, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id_categoria, PDO::PARAM_INT);
            $stmt->execute();
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
}


?>
