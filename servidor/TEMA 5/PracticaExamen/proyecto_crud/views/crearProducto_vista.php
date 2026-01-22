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
          <label for="descripcion">Descripcion</label>
          <input id="descripcion" name="descripcion" type="text" placeholder="Ingresa alguna descripcion" value="<?= htmlspecialchars($descrripcio ?? '') ?>">
        </div>
        


        <div class="col">
          <label for="precio">precio</label>
          <input id="precio" name="precio" type="number" placeholder="Ingresa el precio" value="<?= htmlspecialchars($precio ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['precio'])): ?>
                                <?= htmlspecialchars($errores['precio']) ?>
                    </p>
                  <?php endif; ?>
        </span>
     


      <div><!--categorias coger id para tabla productos  -->

          <label for="categoria">categoria</label>
          
            <select id="categoria" name="categoria">

            <option value="">-- Selecciona una categoría --</option>

              <?php foreach($categorias as $ctg):  ?>

              <option value="<?php echo $ctg['id_categoria'] ?>" <?php echo ($ctg['id_categoria']==$categoria) ? "selected" : ""  ?> >      <?php echo $ctg['nombre'] ?></option>
              
              <?php endforeach;  ?>
            </select>
      </div>

      <span class="error">
                            <?php
                            if (!empty($errores['categoria'])): ?>
                                <?= htmlspecialchars($errores['categoria']) ?>
                    </p>
                  <?php endif; ?>
        </span>



        <div class="col">
          <label for="sku">SKU</label>
          <input id="sku" name="sku" type="text" placeholder="Ingresa el sku unico" value="<?= htmlspecialchars($sku ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['sku'])): ?>
                                <?= htmlspecialchars($errores['sku']) ?>
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
