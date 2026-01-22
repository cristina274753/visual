<!-- 
    Página de gestión de equipo de héroes
    Autor: P.Lluyot
    Examen-2 de DWES - Curso 2025-2026
-->

<?php

session_start();
require_once 'datos.php';


$errores=[];
$mensaje="";
$nombre=""; //nombre del usuario del login

$listaHeroes="";
$id="";

$numEquipo=0;




$costeTotal=0;


if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirigir a la página principal si no existe usuario
    exit();
}

if (!isset($_SESSION['equipo']) ) {
        $_SESSION['equipo'] = [];
}

if(!empty($_SESSION['equipo'])){
    //$costeTotal+=$heroe['coste'];

    foreach($_SESSION['equipo'] as $e){


        foreach(HEROES as $heroe){

                if($heroe['id']==$e){
                    $costeTotal+=$heroe['coste'];

                }
        }
    }

}

//contar herroes eb el array
$numEquipo=count($_SESSION['equipo']);



if (!isset($_SESSION['presupuesto']) ) {
    $_SESSION['presupuesto'] = 440;
}


//generar cartas heroes y poner id para pagina stats
    foreach(HEROES as $heroe){

        

        if(in_array($heroe['id'], $_SESSION['equipo'])){  //si el id esta en el array

           $listaHeroes.="

            <div class='rounded-lg shadow-xl overflow-hidden relative h-[420px] group'>
                            <!-- ring-4 ring-offset-2 ring-indigo-500 -->
                            <img class='w-full h-full object-cover' src='img/".$heroe['imagen']."' alt='Nombre del héroe'>
                            <div class='absolute inset-0 p-3 flex flex-col justify-end text-white transition duration-300 ease-in-out'>
                                <div class='p-2 rounded-lg bg-black/40 group-hover:bg-black/50 transition duration-300'>
                                    <div>
                                        <h3 class='text-xl font-extrabold border-b-2 border-indigo-400 pb-1 mb-1'>".$heroe['nombre']."</h3>
                                        <p class='text-base font-medium text-indigo-200 mb-2'>".$heroe['clase']."</p>
                                    </div>
                                    <div class='text-xs space-y-1 mb-3'>
                                        <p><strong>Ataque: </strong>".$heroe['ataque']."</p>
                                        <p><strong>Defensa: </strong>".$heroe['defensa']."</p>
                                        <p><strong>Magia: </strong>".$heroe['magia']."</p>
                                    </div>
                                    <p class='text-center font-bold text-indigo-300 text-lg mb-2'>Coste: ".$heroe['coste']."</p>
                                    <form action='' method='post'> <!--completa el formulario (puedes cambiarlo si quieres pasar el id_heroe en el botón)-->
                                        <input type='hidden' name='id_heroe' value='".$heroe['id']."'>
                                        <button type='submit' name='eliminar' class='w-full py-1 px-3 bg-red-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-red-700 transition duration-150' value='eliminar'>Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
        ";

        }else{

            $listaHeroes.="
            
            <div class='rounded-lg shadow-xl overflow-hidden relative h-[420px] group'>
                            <!-- ring-4 ring-offset-2 ring-indigo-500 -->
                            <img class='w-full h-full object-cover' src='img/".$heroe['imagen']."' alt='Nombre del héroe'>
                            <div class='absolute inset-0 p-3 flex flex-col justify-end text-white transition duration-300 ease-in-out'>
                                <div class='p-2 rounded-lg bg-black/40 group-hover:bg-black/50 transition duration-300'>
                                    <div>
                                        <h3 class='text-xl font-extrabold border-b-2 border-indigo-400 pb-1 mb-1'>".$heroe['nombre']."</h3>
                                        <p class='text-base font-medium text-indigo-200 mb-2'>".$heroe['clase']."</p>
                                    </div>
                                    <div class='text-xs space-y-1 mb-3'>
                                        <p><strong>Ataque: </strong>".$heroe['ataque']."</p>
                                        <p><strong>Defensa: </strong>".$heroe['defensa']."</p>
                                        <p><strong>Magia: </strong>".$heroe['magia']."</p>
                                    </div>
                                    <p class='text-center font-bold text-indigo-300 text-lg mb-2'>Coste: ".$heroe['coste']."</p>
                                    <form action='' method='post'> <!--completa el formulario (puedes cambiarlo si quieres pasar el id_heroe en el botón)-->
                                        <input type='hidden' name='id_heroe' value='".$heroe['id']."'>
                                        <button type='submit' name='recluta' class='w-full py-1 px-3 text-white text-sm font-semibold rounded-lg shadow-md transition duration-150 bg-indigo-600 hover:bg-indigo-700' value='reclutar'>Reclutar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
        ";
        }

        
    }


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = ($_POST['id_heroe'] ?? "");

        /* comprobar método del formulario */
        if (isset($_POST['recluta'])) {
            

            //meter en sesion y mensage flash
            if(!in_array($id, $_SESSION['equipo']) ){
                
                $_SESSION['equipo'][]=$id;
                $_SESSION['flash_message'] = "ID GUARDADO EN EQUIPO";

            }else{
                $_SESSION['flash_message'] = "ID NO GUARDADO EN EQUIPO";
            }

            //reatar coste heroe al presupuesto
            $index = array_search($id, $_SESSION['equipo']);
            $_SESSION['presupuesto']-= HEROES['index']['coste'];

        



            header("Location: equipo.php"); // Redirigir a la página principal
            exit();


        }elseif(isset($_POST['eliminar'])){

            //meter en sesion y mensage flash
            $index = array_search($id, $_SESSION['equipo']);

            if ($index !== false) {
                unset($_SESSION['equipo'][$index]);
                $_SESSION['flash_message'] = "ID BORRADO EN EQUIPO";
            }else{

                $_SESSION['flash_message'] = "ID NO BORRADO EN EQUIPO";
            }


            //sumar coste heroe al presupuesto
            $index = array_search($id, $_SESSION['equipo']);
            $_SESSION['presupuesto']+= HEROES['index']['coste'];

            header("Location: equipo.php"); // Redirigir a la página principal
            exit();

        }elseif(isset($_POST['reset'])) {
    
            // Vacía todas las variables
            $_SESSION = [];

            // Destruye la sesión
            session_destroy();
        
            header("Location: index.php");
            exit();

        }
    }



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Equipo de Héroes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 text-slate-800">
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Cabecera con datos del jugador y acciones -->
        <header class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold">Panel del Jugador: <span class="text-indigo-600"> 
                    <?php
                        echo $_SESSION['usuario'];
                    ?>
                </span></h1>
                <p class="text-slate-500">Forma tu equipo gestionando tu presupuesto.</p>
            </div>

            <div class="flex flex-wrap gap-4 w-full sm:w-auto">
                <!-- Paneles de información rápida -->
                <div class="text-center bg-white shadow-md rounded-lg p-3 min-w-[160px]">
                    <span class="text-sm font-semibold text-slate-500">Presupuesto Restante</span>
                    <p class="text-2xl font-bold text-green-600">
                        <?php
                            echo $_SESSION['presupuesto']
                        ?> Puntos</p>
                </div>
                <div class="text-center bg-white shadow-md rounded-lg p-3">
                    <span class="text-sm font-semibold text-slate-500">Héroes</span>
                    <p class="text-2xl font-bold text-back-600">
                        <?php
                            echo $numEquipo;
                        ?>
                    </p>
                </div>
                <div class="text-center bg-white shadow-md rounded-lg p-3">
                    <span class="text-sm font-semibold text-slate-500">Coste Total</span>
                    <p class="text-2xl font-bold text-indigo-600">
                        
                    <?php
                        echo $costeTotal;
                    ?>Puntos</p>
                </div>
                <!-- Acciones principales -->
                <div class="flex flex-col gap-2">
                    <form action="" method="post">
                        <a href="analisis.php" type="submit"name="analisis" class="text-center py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700">Ver Análisis</a>
                        <button href="" type="submit" name="reset" class="text-center py-2 px-4 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700">Reiniciar</button>
                    </form>
                </div>

            </div>
        </header>

        <!-- Sección de héroes reclutados y disponibles -->
        <section>
            <h2 class="text-2xl font-semibold border-b-2 border-slate-300 pb-2 mb-4">Lista de Héroes</h2>
            <!-- distintos tipos de mensaje en función si es de éxito o error -->
            <!-- <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert"> -->
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6 rounded-md" role="alert">
                <p>
                    <?php
                         //comprobar mensaje flash
                            if(isset($_SESSION['flash_message'])){
                                echo $_SESSION['flash_message'];
                                unset($_SESSION['flash_message']);
                            }else{
                                echo "mensaje: ";
                            }
                    ?>
                </p>
            </div>

            <!-- Grid de héroes -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
                <!-- Tarjeta de héroe (ejemplo1 - héroe sin incluir en la lista) -->
                <?php

                    echo $listaHeroes;
                ?>
                
                <!-- Tarjeta de héroe (ejemplo, sin reclutar y sin presupuesto -> deshabilitado) -->
                <div class='rounded-lg shadow-xl overflow-hidden relative h-[420px] group'>
                    <!-- ring-4 ring-offset-2 ring-indigo-500 -->
                    <img class='w-full h-full object-cover' src='img/shadow.png' alt='Nombre del héroe'>
                    <div class='absolute inset-0 p-3 flex flex-col justify-end text-white transition duration-300 ease-in-out'>
                        <div class='p-2 rounded-lg bg-black/40 group-hover:bg-black/50 transition duration-300'>
                            <div>
                                <h3 class='text-xl font-extrabold border-b-2 border-indigo-400 pb-1 mb-1'>Nombre del Héroe</h3>
                                <p class='text-base font-medium text-indigo-200 mb-2'>Clase</p>
                            </div>
                            <div class='text-xs space-y-1 mb-3'>
                                <p><strong>Ataque: </strong>56</p>
                                <p><strong>Defensa: </strong>22</p>
                                <p><strong>Magia: </strong>42</p>
                            </div>
                            <p class='text-center font-bold text-indigo-300 text-lg mb-2'>Coste: 600</p>
                            <form> <!--completa el formulario (puedes cambiarlo si quieres pasar el id_heroe en el botón)-->
                                <input type='hidden' name='id_heroe' value='ID01'>
                                <button type="submit" name="accion" class="w-full py-1 px-3 text-white text-sm font-semibold rounded-lg shadow-md transition duration-150 bg-gray-500 cursor-not-allowed" disabled="" value="reclutar">Reclutar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- Pie de página con autor y curso -->
    <footer class="text-center text-sm text-gray-500 mt-10">
        © 2025 P.Lluyot · Examen de DWES
    </footer>
</body>

</html>