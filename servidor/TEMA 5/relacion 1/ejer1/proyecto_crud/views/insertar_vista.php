<?php include "layout/header.php"; ?>

    
    <h1>Añadir producto</h1>
    <form name="myForm" action="" method="post">

      <!-- Campos de texto -->
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" type="text" placeholder="Ingresa el nombre" >
        </div>
        <div class="col">
          <label for="descripcion">Descripcion</label>
          <input id="descripcion" name="descripcion" type="text" placeholder="Ingresa alguna descripcion" >
        </div>
        <div class="col">
          <label for="precio">precio</label>
          <input id="precio" name="precio" type="number" placeholder="Ingresa el precio" >
        </div>
      </div>


      <!-- Acciones -->
      <div class="actions" style="margin-top:1rem">
        <input type="submit" name="enviar" value="Enviar">
      </div>

    </form>

    <?php
    if (!empty($errores)): ?>
      <p class='notice'>
        <?php foreach ($errores as $e): ?>
          <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
      </p>
    <?php
    elseif (!empty($errores)): ?>
      <p class='notice'><?= htmlspecialchars($errores); ?></p>
    <?php endif; ?>

    <?php
    if (!empty($mensaje)): ?>
      <p class='notice'><?=($mensaje); ?></p>
    <?php endif; ?>


<?php include "layout/footer.php"; ?>
