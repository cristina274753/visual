<?php include "layout/header.php"; ?>

<h2>Login</h2>

<form action="" method="POST">
    <input type="text" name="usuario" placeholder="Usuario" value="<?= htmlspecialchars($usuario) ?>" >
    <input type="password" name="password" placeholder="Contraseña" value="<?= htmlspecialchars($password) ?>" >
    <button type="submit">Entrar</button>

    <p style="color:red">
        <?php if (!empty($errores)): ?>
      
        <?php foreach ($errores as $e): ?>
          <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
      <?php endif; ?>
    
</form>

<?php include "layout/footer.php"; ?>
