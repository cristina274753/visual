<?php

    $dia="";

    if (isset($_GET["dia"])) {
        $dia=$_GET("dia");
    }else {
        $dia=rand(1,7);
    }

    echo $dia;

    if ($dia<6) {
        echo "dia laborable";
    }elseif($dia>=6) {
        echo "dia no laborable";
    }else {
        echo "dia incorrecto";
    }

?>