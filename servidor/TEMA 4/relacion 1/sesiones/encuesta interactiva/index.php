




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
        <h1>encuesta interactiva</h1>
        <form name="myForm" action="p1.php" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="nombre">Nombre</label>
              <input id="nombre" name="nombre" type="text" placeholder="Ingresa tu nombre" required>
            </div>
          </div>
    
         
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>
    
</body>
</html>