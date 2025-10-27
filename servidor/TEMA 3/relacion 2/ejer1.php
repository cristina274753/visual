<?php

    $temperatura=rand(-5,45);

    if ($temperatura>=30) {
        echo "hace calor: $temperatura";
    }elseif ($temperatura>15) {
        echo "hace frio: $temperatura";
    } else {
        echo "el clima es templado: $temperatura";
    }

    

?>