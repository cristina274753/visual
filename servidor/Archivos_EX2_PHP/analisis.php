<!-- 
    Página de análisis del equipo de héroes
    Autor: P.Lluyot
    Examen-2 de DWES - Curso 2025-2026
-->

<?php

session_start();
require_once 'datos.php';

$listaHeroes="";
$sumaATK=0;
$sumaDEF=0;
$sumaMAG=0;

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirigir a la página principal si no existe usuario
    exit();
}

//mostrar las cartas del equipo
foreach($_SESSION['equipo'] as $e){


   foreach(HEROES as $heroe){

    

        if($heroe['id']==$e){

            $sumaATK+=$heroe['ataque'];
            $sumaDEF+=$heroe['defensa'];
            $sumaMAG+=$heroe['magia'];

            
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
                                    
                                </div>
                            </div>
                        </div>
        ";
        }
        
   }
        
    $mediaATK=$sumaATK/count($_SESSION['equipo']);
    $mediaDEF=$sumaDEF/count($_SESSION['equipo']);
    $mediaMAG=$sumaMAG/count($_SESSION['equipo']);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis del Equipo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 text-slate-800">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <!-- cabecera y botón volver -->
        <header class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold">Análisis del Equipo</h1>
                <p class="text-slate-500">Resumen y estadísticas del equipo formado por <span class="font-semibold text-indigo-600"><!-- Nombre del estratega --></span>.</p>
            </div>
            <a href="equipo.php" class="py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">Volver a la Gestión</a>
        </header>

        <!-- SECCIÓN: EQUIPO FINAL -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold border-b-2 border-slate-300 pb-2 mb-4">Composición del Equipo Final</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                <!-- PHP: Bucle para mostrar los héroes del equipo final -->
                <!-- Tarjeta de Héroe (sin botones) -->
                <?php
                    echo $listaHeroes;
                ?>
                
                <!-- Fin de la tarjeta -->
                <!-- PHP: Mensaje si el equipo está vacío -->
                <!-- <div class="col-span-full bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                        <p>No hay héroes en el equipo para analizar.</p>
                    </div> -->
            </div>
        </section>



        <!-- SECCIÓN: ESTADÍSTICAS GLOBALES-->
        <section>
            <h2 class="text-2xl font-semibold border-b-2 border-slate-300 pb-2 mb-4">Estadísticas Globales</h2>

            <!-- PHP: Mostrar esta sección solo si el equipo no está vacío -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Tarjeta de Estadística -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-sm font-semibold text-slate-500 uppercase">Coste Total del Equipo</h3>
                    <!-- PHP: Mostrar coste total -->
                    <p class="text-4xl font-bold text-indigo-600 mt-2">1000 Puntos</p>
                </div>
                <!-- Tarjeta de Estadística -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-sm font-semibold text-slate-500 uppercase">Ataque / Defensa / Magia Total</h3>
                    <!-- PHP: Mostrar estadísticas totales -->
                    <p class="text-2xl font-bold mt-2">ATK: 
                        <?php
                            echo $sumaATK;
                        ?>
                    </p>
                    <p class="text-2xl font-bold mt-1">DEF: 
                        <?php
                            echo $sumaDEF;
                        ?>
                    </p>
                    <p class="text-2xl font-bold mt-1">MAG: 
                        <?php
                            echo $sumaMAG;
                        ?>
                    </p>
                </div>
                <!-- Tarjeta de Estadística -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-sm font-semibold text-slate-500 uppercase">Promedio por Miembro</h3>
                    <!-- PHP: Mostrar estadísticas promedio -->
                    <p class="text-md font-semibold mt-2">Ataque Promedio: 
                        
                    <?php
                            echo number_format($mediaATK,2);
                        ?>
                    </p>
                    <p class="text-md font-semibold mt-1">Defensa Promedio: 
                        <?php
                            echo number_format($mediaDEF,2);
                        ?>
                    </p>
                    <p class="text-md font-semibold mt-1">Magia Promedio: 
                        <?php
                            echo number_format($mediaMAG,2);
                        ?>
                    </p>
                </div>
                <!-- Tarjeta de Estadística -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-sm font-semibold text-slate-500 uppercase text-center mb-3">Recuento por Clase</h3>
                    <!-- PHP: Bucle para mostrar el recuento de clases -->
                    <ul class="space-y-2 text-center">
                        <li class="font-semibold">Caballero <span class="font-bold text-indigo-600 text-lg">1</span></li>
                        <li class="font-semibold">Arquero <span class="font-bold text-indigo-600 text-lg">1</span></li>
                    </ul>
                </div>
            </div>

        </section>

    </div>

</body>

</html>