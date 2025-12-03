<?php include "layout/header.php"; ?>

<h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
<h2>Lista de Productos</h2>

<?php if (!empty($errores)): ?>
    <p class="notice">
        <?php foreach ($errores as $e) echo htmlspecialchars($e) . "<br>"; ?>
    </p>
<?php endif; ?>

<?php if (!empty($mensaje)): ?>  <!--tabla -->
    <p class="notice"><?= $mensaje ?></p>
<?php endif; ?>

<form method="GET">
    <button name="anadir" value="1">Añadir producto</button>
</form>

<?php include "layout/footer.php"; ?>
