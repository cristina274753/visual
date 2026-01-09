<?php

namespace cristina\app\controllers;

class HomeController extends controller
{
    //método estático
    static public function index()
    {
        echo "hola desde la página de home";
    }
    static public function show($id)
    {
        echo "Mostramos el elemento número $id";
    }
}
?>