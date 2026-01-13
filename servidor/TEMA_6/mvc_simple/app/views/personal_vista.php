<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personal</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>

<h1>Listado del Personal</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Puntuación</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personal as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nombre'] ?></td>
                <td><?= $p['apellidos'] ?></td>
                <td><?= $p['edad'] ?></td>
                <td><?= $p['puntuacion'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
