<?php
require_once 'models/producto.php';

class FoodController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $productos = Producto::listarProductos();

    
        $this->RenderView("Food/Index", ["productos" => $productos]);
    }

}
