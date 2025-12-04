<?php include "layout/header.php"; ?>

<h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
<h2>Lista de Productos</h2>

<?php if (!empty($errores)): ?>
    <p class="notice">
        <?php foreach ($errores as $e) echo htmlspecialchars($e) . "<br>"; ?>
    </p>
<?php endif; ?>

<?php if (!empty($_SESSION['mensaje'])): ?>
    <p class="notice">
        HISTORIAL: <br> <?php 
            foreach ($_SESSION['mensaje'] as $msg) {
                echo htmlspecialchars($msg) . "<br>";
            }
            
        ?>
    </p>
<?php endif; ?>


<?php if (!empty($tabla)): ?>  <!--tabla -->
    <?= $tabla ?>
<?php endif; ?>

<form method="GET" action="insertar.php">
    <button >Añadir producto</button>
</form>

<?php include "layout/footer.php"; ?>
