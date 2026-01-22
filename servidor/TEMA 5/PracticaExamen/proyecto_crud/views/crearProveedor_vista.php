<?php include "layout/header.php"; ?>

    
    <h1>Añadir producto</h1>
    <form name="myForm" action="" method="post">

      <!-- Campos de texto -->
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" type="text" placeholder="Ingresa el nombre" value="<?= htmlspecialchars($nombre ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['nombre'])): ?>
                                <?= htmlspecialchars($errores['nombre']) ?>
                    </p>
                  <?php endif; ?>
        </span>


        <div class="col">
          <label for="nif">nif</label>
          <input id="nif" name="nif" type="text" placeholder="Ingresa el nif" value="<?= htmlspecialchars($nif ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['nif'])): ?>
                                <?= htmlspecialchars($errores['nif']) ?>
                    </p>
                  <?php endif; ?>
        </span>

        <div class="col">
          <label for="tlf">telefono</label>
          <input id="tlf" name="tlf" type="number" placeholder="Ingresa el tlf" value="<?= htmlspecialchars($tlf ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['tlf'])): ?>
                                <?= htmlspecialchars($errores['tlf']) ?>
                    </p>
                  <?php endif; ?>
        </span>

        <div class="col">
          <label for="email">email</label>
          <input id="email" name="email" type="text" placeholder="Ingresa el email" value="<?= htmlspecialchars($email ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['email'])): ?>
                                <?= htmlspecialchars($errores['email']) ?>
                    </p>
                  <?php endif; ?>
        </span>

        <div class="col">
          <label for="direccion">direccion</label>
          <input id="direccion" name="direccion" type="text" placeholder="Ingresa el direccion" value="<?= htmlspecialchars($direccion ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['direccion'])): ?>
                                <?= htmlspecialchars($errores['direccion']) ?>
                    </p>
                  <?php endif; ?>
        </span>
        


    

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
