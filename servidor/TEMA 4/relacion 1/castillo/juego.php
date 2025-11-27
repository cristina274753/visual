<?php

    session_start();

    

     if (!isset($_SESSION['nombre'])){
        //si no existe la variable de sesión del usuario
        header("Location: index.php");
        exit();
    }

    // Si ya terminó la partida
    if ($_SESSION['turno'] > 5) {
        header("Location: fin.php");
        exit();
    }

    $personajes = [
  'nombre' => [
    'Sir Montague', 'Lady Rowena', 'Milo el Mudo', 'Griselda la Roja',
    'Hugo el Herrero', 'Tilda la Panadera', 'Fray Martín', 'Doña Beatriz',
    'Iñigo de Valverde', 'Aldara la Curandera', 'Roldán el Juglar', 'Gunnar el Mercenario',
    'Catalina la Mercader', 'Bruno el Carpintero', 'Sofía la Herbolaria', 'Lope el Mensajero'
  ],
  'profesion' => [
    'panadero', 'mercader', 'juglar', 'espía', 'heraldo',
    'herrero', 'soldado', 'carpintero', 'médico', 'armero',
    'agricultor', 'monje', 'curandera', 'cazador', 'tabernero',
    'trovador', 'guardia', 'albañil', 'campesino', 'pregonero'
  ],
  'motivo' => [
    'trae pan para la cocina real',
    'desea comerciar con los nobles',
    'quiere cantar una balada',
    'busca refugio de una tormenta',
    'tiene un mensaje urgente del rey',
    'viene a ofrecer sus servicios de herrería',
    'requiere atención médica para un familiar',
    'trae tablones para reparar la puerta norte',
    'quiere vender hierbas y ungüentos',
    'trae víveres desde la aldea vecina',
    'dice haber visto bandidos cerca del puente',
    'pide acceso al archivo para investigar linajes',
    'trae una carta sellada para el castellano',
    'busca trabajo como centinela',
    'viene a entregar un tributo atrasado',
    'dice que persiguen lobos su ganado',
    'trae noticias de un convoy retrasado',
    'quiere audiencia para proponer un trato',
    'viene a bendecir la capilla del castillo',
    'reclama una deuda con la armería'
  ]
];

$mensaje="";

$nombre= $_SESSION['nombre'];
$turno= $_SESSION['turno'];
$puntos= $_SESSION['puntos'];
$aciertos= $_SESSION['aciertos'];
$fallos= $_SESSION['fallos'];

//la 1 vez
        $pNombre = $personajes['nombre'][ array_rand($personajes['nombre']) ];
        $pProfes = $personajes['profesion'][ array_rand($personajes['profesion']) ];
        $pMotivo = $personajes['motivo'][ array_rand($personajes['motivo']) ];    
        $pImpostor= rand(0, 1);




    if ($_SERVER['REQUEST_METHOD']=== 'POST'){

        if(isset($_POST['pasar'])){

            if($pImpostor==false){

                $_SESSION['puntos'] += 10;
                $_SESSION['aciertos']++;
            }else{

                $_SESSION['puntos'] -= 5;
                $_SESSION['fallos']++;
            }

            $mensaje.= "puntos: ".  $_SESSION['puntos'];
            $mensaje.= "<br>aciertos: ".  $_SESSION['aciertos'];
            $mensaje.= "<br>fallos: ".  $_SESSION['fallos'];
            $mensaje.= "<br>turno: ". $_SESSION['turno'];


        }elseif(isset($_POST['rechazar'])){

            if($pImpostor!==false){

                $_SESSION['puntos'] += 10;
                $_SESSION['aciertos']++;
            }else{

                $_SESSION['puntos'] -= 5;
                $_SESSION['fallos']++;
            }

            $mensaje.= "puntos: ".  $_SESSION['puntos'];
            $mensaje.= "<br>aciertos: ".  $_SESSION['aciertos'];
            $mensaje.= "<br>fallos: ".  $_SESSION['fallos'];
            $mensaje.= "<br>turno: ". $_SESSION['turno'];

        }

        $_SESSION['turno']++;

        if ($_SESSION['turno'] > 5) {
            header("Location: fin.php");
            exit();
        }


        $pNombre = $personajes['nombre'][ array_rand($personajes['nombre']) ];
        $pProfes = $personajes['profesion'][ array_rand($personajes['profesion']) ];
        $pMotivo = $personajes['motivo'][ array_rand($personajes['motivo']) ];    
        $pImpostor= rand(0, 1);

        

        
    }

 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
</head>
<body>
    <form method="post">

        <h1>Personaje</h1>

        <p>Nombre <?php echo $pNombre ?></p>
        <p>Profesion <?php echo $pProfes ?></p>
        <p>Motivo <?php echo $pMotivo ?></p>
        <p>Impostor <?php echo ($pImpostor ? "true" : "false") ?></p>

        <button type="submit" name="pasar" value="pasar">Dejar pasar</button>
        <button type="submit" name="rechazar" value="rechazar">Rechazar entrada</button>
    </form>

  <p class='notice'>
    <?php echo $mensaje; ?>
</p>
</body>
</html>