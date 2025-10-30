<?php

    $nombre="";



    if($_SERVER['REQUEST_METHOD']==="POST" ) {

        $nombre=$_POST["nombre"];

        setcookie("nombre", "$nombre", time()+ (15*60));
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: 
                <?php
                    if (isset ($_COOKIE["nombre"])) {
                        echo "none";
                    }
                ?>
        }
    </style>
</head>
<body>

    <?php

        if (isset ($_COOKIE["nombre"])){
                $nombre=$_COOKIE["nombre"];
                echo "hola $nombre";
        }

    ?>

    <form action="" method="POST">
        <p>indica tu nombre: </p>
        <input type="text" id="nombre" name="nombre"  />
        <input type="submit">	

    </form>
</body>
</html>