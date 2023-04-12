<?php
require_once 'models/producto.php';
require_once 'models/categoria.php';

class HomeController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {

        $productos = Producto::listarProductosByIdCategoria("5");

        $data = [
            'productos' => $productos
        ];

        $this->RenderView("Home/Index",$data);
    }

    public function Nosotros()
    {
        $this->RenderView("Home/Nosotros");
    }

    public function Login()
    {
        $this->RenderView("Home/Login");
    }
    public function Registro()
    {
        $this->RenderView("Layout/Registro");
    }

    public function Promociones()
    {
        $productos = Producto::listarProductosByIdCategoria("5");

        $data = [
            'productos' => $productos
        ];

        $_SESSION['productovista'] = "promociones";

        $this->RenderView("home/promociones",$data);
    }

    
    
    //Checar al final si realmente se utiliza carrito
    public function Carrito()
    {
        
    }

}
