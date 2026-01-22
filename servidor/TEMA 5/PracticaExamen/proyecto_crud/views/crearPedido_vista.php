<?php include "layout/header.php"; ?>

    
    <h1>crear pedido</h1>
    <form name="myForm" action="" method="post">

      <!-- Campos de texto -->
      <div class="row">
        
        


        <div class="col">
          <label for="cantidad">cantidad</label>
          <input id="cantidad" name="cantidad" type="number" placeholder="Ingresa la cantidad" value="<?= htmlspecialchars($cantidad ?? '') ?>" >
        </div>
        <span class="error">
                            <?php
                            if (!empty($errores['cantidad'])): ?>
                                <?= htmlspecialchars($errores['cantidad']) ?>
                    </p>
                  <?php endif; ?>
        </span>
     


      <div><!--categorias coger id para tabla productos  -->

          <label for="producto">producto</label>
          
            <select id="producto" name="producto">

            <option value="">-- Selecciona un producto --</option>

              <?php foreach($productos as $ctg):  ?>

              <option value="<?php echo $ctg['id_producto'] ?>" <?php echo ($ctg['id_producto']==$producto) ? "selected" : ""  ?> >      <?php echo $ctg['nombre'] ?></option>
              
              <?php endforeach;  ?>
            </select>
      </div>

      <span class="error">
                            <?php
                            if (!empty($errores['producto'])): ?>
                                <?= htmlspecialchars($errores['producto']) ?>
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
