<?php

    function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1); 
    }
}

// Ejemplos de uso
echo "Factorial de 5: " . factorial(5) . "<br>"; // 120
echo "Factorial de 7: " . factorial(7) . "<br>"; // 5040

?>