<?php

class HomeController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {

        $this->RenderView("Home/Index");
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
        $this->RenderView("Home/Registro");
    }
    
    public function Carrito()
    {
        
    }

}
