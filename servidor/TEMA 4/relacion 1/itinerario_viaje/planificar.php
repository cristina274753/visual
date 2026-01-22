<?php

session_start();

    if(!isset($_SESSION['viaje'])){
        header("Location: index.php");
        exit();
    }

    $cabezera="
    
        <h1>Planificando tu viaje a: ". $_SESSION['viaje']['destino']." (". $_SESSION['viaje']['dias'] ." dias)</h1>
    ";

    $formDias="";
    for($i=1; $i<=$_SESSION['viaje']['dias']; $i++){

        $formDias.="<option value='dia ". $i ."'>dia ". $i ."</option>";
    }

    

$formulario="

    <h1>planifica</h1>
            <form name='myForm' action='' method='post'>
        
              <!-- Campos de texto -->
              <div class='row'>
                <div class='col'>
                  <label for='act'>Nombre</label>
                  <input id='act' name='act' type='text' >
                </div>
              </div>

              <div style='margin-top:1rem'>
                <label for='dias'>Dias</label>
                <select id='dias' name='dias' >
                <option value=''>Selecciona un dia</option>
                ". $formDias ."
                </select>
            </div>
        
              
              <!-- Acciones -->
              <div class='actions' style='margin-top:1rem'>
                <input type='submit' name='enviar' value='Enviar'>
                <input type='submit' name='reset' value='resetear'>

              </div>
        
            </form>
";

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    
    $dia = ($_POST['dias'] ?? "");
    $act = htmlspecialchars(trim($_POST['act'] ?? ""));
    
    $_SESSION['viaje']['itinerario'][$dia][] = $act;




}

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    
    // Vacía todas las variables
    $_SESSION = [];

    // Destruye la sesión
    session_destroy();
   
    header("Location: index.php");
    exit();

}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['borrar'])) {
    

    /* recoger datos */
    $dia = trim($_GET['dia'] ?? "");
    $act = trim($_GET['activ'] ?? "");


    $index = array_search($act, $_SESSION['viaje']['itinerario'][$dia]);

    if ($index !== false) {
        unset($_SESSION['viaje']['itinerario'][$dia][$index]);
    }

}

//vista

$vistaDias="";
foreach($_SESSION['viaje']['itinerario'] as $iti=>$actividades){

    $vistaDias.="<p>". $iti ." </p>";

     if (empty($actividades)) {
        $vistaDias .= "<ul> <li>Sin actividades</li></ul>";

    } else{

        foreach($_SESSION['viaje']['itinerario'][$iti] as $acts){

            $vistaDias.="<ul>

                <li>". $acts ." <form action='' method='get'> 
                <input type='hidden' name='dia' value='$iti'>
                <input type='hidden' name='activ' value='$acts'>
                <input type='submit' name='borrar' value='borrar'></form></li>
                </ul>
            ";
        }
    }

    

}
$vista="

    <h2> Destino: ". $_SESSION['viaje']['destino'] ." </h2>
    <p>Dias: ". $_SESSION['viaje']['dias'] ." </p>
    ". $vistaDias ."


";




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
    <header>
        <?php
            echo $cabezera;
        ?>
    </header>

    <main >
        
        <?php
            echo $formulario;
        ?>    
    
    </main>

       <?php
            echo $vista;
        ?>  

           <?php
           if (!empty($errores)): ?>
             <p class='notice'>
               <?php foreach ($errores as $e): ?>
                 <?= htmlspecialchars($e) ?><br>
               <?php endforeach; ?>
             </p>
           <?php
           elseif (!empty($mensaje)): ?>
             <p class='notice'><?= htmlspecialchars($mensaje); ?></p>
           <?php endif; ?> 
        

</body>
</html>