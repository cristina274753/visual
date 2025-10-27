<?php

    function numRand() {

        $num=rand(1,100);

        if ($num%2) {
           return $mensaje= "par";
        }else {
            return $mensaje= "impar";
        }

    }

?>