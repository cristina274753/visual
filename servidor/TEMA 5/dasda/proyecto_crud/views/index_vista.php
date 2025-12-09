<?php include "layout/header.php"; ?>

<h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
<h2>Lista de Productos</h2>

<?php if (!empty($errores)): ?>
    <p class="notice">
        <?php foreach ($errores as $e) echo htmlspecialchars($e) . "<br>"; ?>
    </p>
<?php endif; ?>

<?php if ($mensaje!=''): ?>
    <p class="notice"><?=htmlspecialchars($mensaje) ?></p>
<?php endif; ?>


<?php if (!empty($tabla)): ?>  <!--tabla -->
    <?= $tabla ?>
<?php endif; ?>



<?php if($_SESSION['rol']=='admin'): ?>
<form method="GET" action="insertar.php">
    <button >Añadir producto</button>
</form>
<?php endif;  ?>

<?php include "layout/footer.php"; ?>
