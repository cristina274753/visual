<?php

    $frase="php es un lenguaje divertido y poderoso";

    $nuevaFrase=str_replace("divertido", "facil",$frase);

    echo  $frase;
    echo $nuevaFrase;

    $fraseModificada=str_replace(
        ["php", "java"],
        ["poderoso","versatil"],
        $frase
    );

?>