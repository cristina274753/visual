<?php include "layout/header.php"; ?>

<h2>Login</h2>

<form action="" method="POST">
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Entrar</button>

    <p style="color:red"><?= $errores ?></p>
</form>

<?php include "layout/footer.php"; ?>
