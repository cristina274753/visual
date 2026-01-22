<?php include "layout/header.php"; ?>


<h1>Actualizar producto</h1>

<form name="myForm" action="" method="POST">

    <div>
        <label>Nombre</label>
    <input id="nombre" name="nombre" type="text" value="<?= htmlspecialchars($nombre) ?>" >
    </div>
    
    <span class="error">
                            <?php
                            if (!empty($errores['nombre'])): ?>
                                <?= htmlspecialchars($errores['nombre']) ?>
                    </p>
                  <?php endif; ?>
        </span>



    <label>Descripción</label>
    <input id="descripcion" name="descripcion" type="text" value="<?= htmlspecialchars($descripcion) ?>">

    <div>
        <label>Precio</label>
    <input id="precio" name="precio" type="number" step="0.01" value="<?= htmlspecialchars($precio) ?>" >
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

                <?php foreach ($arrCategorias as $categoria): ?>

                    <option 
                        value="<?= $categoria['id_categoria'] ?>" 
                        <?= ($categoria['id_categoria'] == $categoriaSeleccionada) ? "selected" : "" ?>
                    >
                        <?= htmlspecialchars($categoria['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

      </div>




    <button type="submit" name="enviar">Actualizar</button>
</form>


<?php if (!empty($errores)): ?>
    <p class='notice'>
        <?php foreach ($errores as $e): ?>
            <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
    </p>
<?php endif; ?>

<?php include "layout/footer.php"; ?>

