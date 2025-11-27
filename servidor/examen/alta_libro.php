<!-- 
    Página de alta de libros de la Biblioteca Local
    Autor: P.Lluyot
    Examen-1 de DWES - Curso 2025-2026
-->
<?php
/* ############################## CÓDIGO PHP ################################################*/

$titulo = "";
$autor = "";
$anio = "";
$genero = "";

$errores = [];
$mensaje = "";



/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {


    /* recoger datos */

    $titulo = htmlspecialchars(trim($_POST['titulo'] ?? ""));
    $autor = htmlspecialchars(trim($_POST['autor'] ?? ""));
    $anio = trim($_POST['anio'] ?? "");
    $genero = $_POST['genero'] ?? "";



    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($titulo === "") {
        $errores['titulo'] = "titulo es obligatorio";
    }

    if ($autor === "") {
        $errores['autor'] = "autor es obligatorio";
    }

    if ($anio === "") {
        $errores['anio'] = "anio es obligatorio";
    } elseif ($anio > 2100 || $anio < 1800) {
        $errores['anio'] = "el anio tiene que estar entre 1800 y 2100";
    }

    if ($genero === "") {
        $errores['genero'] = "el genero es obligatorio";
    } elseif (!in_array($genero, ["Novela", "Ciencia ficción", "Fantasía"])) {
        $errores['genero'] = "opcion invalida";
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {
        $mensaje = "registro realizado con exito<br>";


        /*apartado 2*/

        $archivo = fopen("libros.csv", "a+"); /*abre archivo para escritura y lectura*/

        $libros = [
            $titulo,
            $autor,
            $anio,
            $genero
        ];


        if (fputcsv($archivo, $libros, ";")) {
            $mensaje .= "registro completado";
        } else {
            $errores['guardarDatos'] = "error al guardar datos";
        }

        fclose($archivo);
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
            <a href="alta_libro.php" class="active">💾 Registrar libro</a>
            <a href="listado.php">📋 Listado de libros</a>
        </nav>
    </header>
    <!-- Contenido principal: formulario de alta de libros -->
    <main>
        <form action="" method="post">
            <p>
                <!-- Campo para el título del libro -->
                <label for="titulo">Título del libro</label>
                <input type="text" id="titulo" name="titulo" size="40" value="<?= htmlspecialchars($titulo ?? '') ?>">
                <span class="error">
                    <?php
                    if (!empty($errores['titulo'])): ?>
                        <?= htmlspecialchars($errores['titulo']) ?>
            </p>
        <?php endif; ?>
        </span>



        <!-- Campo para el autor del libro -->
        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" size="40" value="<?= htmlspecialchars($autor ?? '') ?>">
        <span class="error">
            <?php
            if (!empty($errores['autor'])): ?>
                <?= htmlspecialchars($errores['autor']) ?>
                </p>
            <?php endif; ?>
        </span>

        <!-- Campo para el año de publicación -->
        <label for="anio">Año de publicación</label>
        <input type="number" id="anio" name="anio" value="<?= htmlspecialchars($anio ?? '') ?>">
        <span class="error">
            <?php
            if (!empty($errores['anio'])): ?>
                <?= htmlspecialchars($errores['anio']) ?>
                </p>
            <?php endif; ?>
        </span>

        <!-- Campo para el género del libro -->
        <label for="genero">Género</label>
        <select id="genero" name="genero">
            <option value="">Selecciona un género</option>
            <option value="Novela" <?= ($genero == "Novela") ? 'selected' : '' ?>>Novela</option>
            <option value="Ciencia ficción" <?= ($genero == "Ciencia ficción") ? 'selected' : '' ?>>Ciencia ficción</option>
            <option value="Fantasía" <?= ($genero == "Fantasía") ? 'selected' : '' ?>>Fantasía</option>
        </select>
        <span class="error">
            <?php
            if (!empty($errores['genero'])): ?>
                <?= htmlspecialchars($errores['genero']) ?>
                </p>
            <?php endif; ?>
        </span>
        </p>
        <!-- Botón para enviar el formulario -->
        <button type="submit" name="registrar">
            💾 Registrar Libro
        </button>
        </form>




        <!-- Mensaje de notificación o resultado -->
        <p class='notice'>
            <?php
            if (!empty($mensaje)): ?>
                <?= ($mensaje); ?>
            <?php endif; ?>
        </p>
    </main>
    <!-- Pie de página -->
    <footer>
        <p><em>Examen-1 de DWES - Curso 2025-2026.</em></p>
        <p>P.Lluyot</p>
    </footer>
</body>

</html>