<?php

    function imprimeArray($array)  {
        
        $mensaje="<pre>".print_r($array,true)."</pre>";

        return $mensaje;
    }

?>