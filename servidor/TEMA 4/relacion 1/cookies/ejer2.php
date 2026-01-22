<?php

    $color="";

    if (isset ($_COOKIE["color"])){
            $color=$_COOKIE["color"];
    }


    if($_SERVER['REQUEST_METHOD']==="POST" ) {

        $color=$_POST["color"];

        setcookie("color", "$color", time()+ (60*60));
    }


    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: <?php
                                   echo $color;
                                ?>
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <p>escoge un color: </p>
        <input type="color" id="color" name="color" value="#f6b73c" />
        <input type="submit">	

    </form>
</body>
</html>