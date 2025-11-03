<?php




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">

</head>
<body>
        <h1>temperaturas</h1>
        <form id="myForm" action="ejer1resultado.php" method="get">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">temperatura</label>
              <input id="temp" name="temp" type="number" placeholder="Ingresa la temperatura " required>
            </div>
    
          <!-- Acciones -->
          <div class="actions">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
    
        </form>
    
</body>
</html>