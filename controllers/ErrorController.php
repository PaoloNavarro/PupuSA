<?php

class ErrorController extends Controller
{
    public function __construct()
    {
    }

    public function Index()
    {
        $this->RenderView("Error/Index");

    }
}
