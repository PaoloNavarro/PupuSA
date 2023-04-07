<?php

require_once 'models/conexion.php';

class Categoria {
    private $id_categoria;
    private $descripcion;

    public function __construct($id_categoria = null, $descripcion = null) {
        $this->id_categoria = $id_categoria;
        $this->descripcion = $descripcion;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public static function listarCategorias() {
        $categorias = array();
        try {
            $con = Conexion::getConection();
            $sql = "SELECT * FROM categoria";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria($row['id_categoria'], $row['descripcion']);
                $categorias[] = $categoria;
            }
            $stmt = null;
            $con = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $categorias;
    }

    public static function buscarPorId($id_categoria) {
        try {
            $con = Conexion::getConection();
            $sql = "SELECT * FROM categoria WHERE id_categoria = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':id', $id_categoria, PDO::PARAM_INT);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria($row['id_categoria'], $row['descripcion']);
                return $categoria;
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
