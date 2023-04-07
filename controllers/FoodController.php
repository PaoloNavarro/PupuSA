<?php
require_once 'models/producto.php';
require_once 'models/categoria.php';


class FoodController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        if (isset($_GET['categoria'])) {
            $idCategoria = $_GET['categoria'];
            if ($idCategoria == "") {
                $productos = Producto::listarProductos();
            } else {
                $productos = Producto::listarProductosByIdCategoria($idCategoria);
            }
        } else {
            $productos = Producto::listarProductos();
        }
        
        $categorias = Categoria::listarCategorias();

        $data = [
            'productos' => $productos,
            'categorias' => $categorias
        ];

        $this->RenderView("Food/Index", $data);
    }

    

}
