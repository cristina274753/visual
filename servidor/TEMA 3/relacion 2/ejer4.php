<?php

    $nota="";

    if(isset($_GET["nota"])){
        $nota=$_GET("nota");


    }else {
        $nota=rand(0,10);
    }

    if ($nota<5) {
        echo "suspenso";
    }elseif ($nota===5 && $nota<7) {
        echo "aprobado";
    }elseif ($nota<9 && $nota>=7) {
        echo "notable";
    }elseif ($nota>7 && $nota<=10) {
        echo "sobresaliente";
    }

    if (floor($nota)===$nota) {
        echo "nota redondeada";
    }else {
        echo "nota no redondeada";
    }

?>