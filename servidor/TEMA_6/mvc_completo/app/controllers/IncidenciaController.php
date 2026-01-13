<?php

namespace cristina\app\controllers;

class HomeController extends Controller
{
    //método estático
     public function index()
    {
        echo "hola desde la página de home";
    }
     public function show($id)
    {
        echo "Mostramos el elemento número $id";
    }
}
?>

