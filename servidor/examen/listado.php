
<?php
/* ############################## CÓDIGO PHP ################################################*/
$numerosLibrosTotales = 0;
$errores = [];

$numFantasia = 0;
$numNovela = 0;
$numFiccion = 0;


function tablaArrayHTML($libros)
{

    if (empty($libros)) {
        return $mensaje = "<p>No hay libros que mostrar</p>";
    } else {


        $mensaje = "<table> " .
            "<tr><th>Titulo</th><th>Autor</th><th>Año</th><th>Genero</th></tr>";

        foreach ($libros as $libro) {

            $mensaje .= "<tr>
                            <td>{$libro[0]}</td>
                            <td>{$libro[1]}</td>
                            <td>{$libro[2]}</td>
                            <td>{$libro[3]}</td>
                        </tr>";
        }
    }
    $mensaje .= "</table>";

    return $mensaje;
}



function CargarLibros()
{

    $archivo = fopen("libros.csv", "r");
    $libros = [];
    while (($linea = fgetcsv($archivo, 0, ";")) !== false) {
        $libros[] = $linea;
    }
    fclose($archivo);
    return $libros; //da un array

}

// Función para filtrar por género
function filtrarPorGenero($libro, $genero)
{
    return $libro[3] == $genero;
}



$libros = CargarLibros();

$genero = "";

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['enviar'])) {

    $genero = $_GET['genero'] ?? "Todos";

    $libros = CargarLibros();

    if ($genero != "Todos") {
        $libros = array_values(array_filter($libros, function($libro) {
            global $genero;
            return filtrarPorGenero($libro, $genero);
        }));
    }
}

$numerosLibrosTotales = count($libros);


foreach ($libros as $libro) {
    switch ($libro[3]) {
        case "Fantasía":
            $numFantasia++;
            break;
        case "Novela":
            $numNovela++;
            break;
        case "Ciencia ficción":
            $numFiccion++;
            break;
    }
}





?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>P.Lluyot</title>
    <!-- Hoja de estilos principal de simple.css -->
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.min.css'>
    <!-- Hoja de estilos personalizada para la biblioteca -->
    <link rel='stylesheet' href='css/biblioteca.css'>
</head>

<body>
    <!-- Cabecera de la página con título y menú de navegación -->
    <header>
        <h2>📚 Biblioteca Local</h2>
        <nav>
            <a href="index.php">🏠 Página principal</a>
            <a href="alta_libro.php">💾 Registrar libro</a>
            <a href="listado.php" class="active">📋 Listado de libros</a>
        </nav>
    </header>
    <!-- Contenido principal: listado y filtrado de libros -->
    <main>
        <!-- ================= Apartado 5: Formulario de filtrado por género ================ -->
        <form action="" method="get">
            <label for="genero">Filtrar por género:</label>
            <select id="genero" name="genero">
                <option value="Todos" <?= ($genero == "Todos") ? 'selected' : '' ?>>Todos</option>
                <option value="Novela" <?= ($genero == "Novela") ? 'selected' : '' ?>>Novela</option>
                <option value="Ciencia ficción" <?= ($genero == "Ciencia ficción") ? 'selected' : '' ?>>Ciencia ficción</option>
                <option value="Fantasía" <?= ($genero == "Fantasía") ? 'selected' : '' ?>>Fantasía</option>
            </select>
            <button type="submit" name="enviar">Filtrar</button>
        </form>

        <!-- ================= Apartado 3: Tabla HTML de libros ============================= -->
        <?php

        echo tablaArrayHTML($libros);



        ?>
        <!-- Mensaje de notificación o resultado -->
        <p class='notice'>
            <?php
            if (!empty($errores['archivo'])): ?>
                <?= htmlspecialchars($errores['archivo']) ?>
        </p>
    <?php endif; ?>
    </p>

    
    <!-- ================= Apartado 6: Estadísticas de libros ========================== -->
    <p class='notice'><strong>Total de libros registrados</strong>: <?php echo $numerosLibrosTotales ?><br>
        - Fantasia: <?php echo $numFantasia ?><br>
        - Novela: <?php echo $numNovela ?><br>
        - Ciencia Ficcion: <?php echo $numFiccion ?><br>
    </p>

    </main>
    <!-- Pie de página con información del examen y autor -->
    <footer>
        <p><em>Examen-1 de DWES - Curso 2025-2026.</em></p>
        <p>P.Lluyot</p>
    </footer>
</body>

</html>