<?php

spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . "/src/" . str_replace("\\", "/", $clase) . ".php";

    if (file_exists($ruta)) {
        require_once $ruta;
    }
});
