<?php

     function sumar_digitos($num){
            if (empty($num)) return 0;
            return $num%10 + sumar_digitos(intval($num/10));
        }
        $minum=33123123456;
        echo "suma del numero $minum: ".sumar_digitos($minum);

?>