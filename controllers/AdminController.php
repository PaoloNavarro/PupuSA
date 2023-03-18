<?php
class AdminController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {

        $this->RenderView("Admin/Index");
    }

    public function Pedidos()
    {
        $this->RenderView("Admin/Pedidos");
    }

    public function Register()
    {
        $this->RenderView("Admin/Register");
    }

}