<?php include "layout/header.php"; ?>

    
    <h1>Añadir categoria</h1>
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
        


      <div><!--categorias coger id para tabla productos  -->

          <label for="padre">categoria</label>
          
            <select id="padre" name="padre">

            <option value="">-- Selecciona una categoría --</option>

              <?php foreach($categorias as $ctg):  ?>

                <?php if($ctg['padre_id']==null): ?>
                    <option value="<?php echo $ctg['id_categoria'] ?>" <?php echo ($ctg['id_categoria']==$categoria) ? "selected" : ""  ?> >      <?php echo $ctg['nombre'] ?></option>
                <?php  endif; ?>
              
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
