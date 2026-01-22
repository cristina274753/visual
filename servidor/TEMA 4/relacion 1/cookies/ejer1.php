<?php

    $cont=0;

    if (isset ($_COOKIE["cont"])){
        $cont=$_COOKIE["cont"];
    }

    $cont ++;

    setcookie("cont", "$cont", time()+ (60*60));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?php
            echo "contador:". $cont;
        ?>
    </p>
</body>
</html>