<?php include "layout/header.php"; ?>


<h1>Actualizar producto</h1>

<form name="myForm" action="" method="POST">

    <label>Nombre</label>
    <input id="nombre" name="nombre" type="text" value="<?= htmlspecialchars($nombre) ?>" required>

    <label>Descripción</label>
    <input id="descripcion" name="descripcion" type="text" value="<?= htmlspecialchars($descripcion) ?>">

    <label>Precio</label>
    <input id="precio" name="precio" type="number" step="0.01" value="<?= htmlspecialchars($precio) ?>" required>

    <button type="submit" name="enviar">Actualizar</button>
</form>


<?php if (!empty($errores)): ?>
    <p class='notice'>
        <?php foreach ($errores as $e): ?>
            <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
    </p>
<?php endif; ?>

<?php include "layout/footer.php"; ?>

