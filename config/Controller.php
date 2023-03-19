<?php

class Controller 
{
    protected $loggedIn;
    

    public function __construct()
    {
        session_start();
        $this->loggedIn = $this->isLoggedIn();
    }
    
    protected function isLoggedIn() {
        return isset($_SESSION["user"]);
    }
    
    public function RenderView($view = 'Index' , $viewData = array()){

        $view = strtolower($view);
        // Agrega la variable $loggedIn al arreglo $viewData
        $viewData['loggedIn'] = $this->loggedIn;
        echo($view);
        if (file_exists("views/{$view}.php")) {
            require_once "views/{$view}.php";
        }
    }
}
