<?php

session_start();

// Vacía todas las variables
    $_SESSION = [];

    // Destruye la sesión
    session_destroy();

    header("Location: index.php");
    exit();


?>