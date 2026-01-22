<?php include "layout/header.php"; ?>

<h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>




<!-- clientes -->

<?php if($_SESSION['rol']=='cliente'):  ?>
    <h2>Bienvenido a tu area personal</h2>

    <h3>Mis pedidos </h3>
    <?php if (!empty($tablaPedidosClientes)): ?>  <!--tabla -->
        <?= $tablaPedidosClientes ?>
    <?php endif; ?>


    <h3>Hacer pedido</h3>

    <a class="button" href="crearPedido.php">pedir</a>
<?php endif; ?>




<!-- pantalla de inicio diferente para admin, usuario o vendedor -->

<?php if($_SESSION['rol']=='admin'  ):  ?>

    <h2>Panel de administrador</h2>

    <!-- resumen del sistema: -->

        <!-- total productos -->
         <!-- categorias -->
          <!-- usuarios activod -->
           <!-- pedidos pendientes -->


    <h3>Resumen del sistema</h3>
    <ul>
      
        <ul>
          <li>total productos  <?php echo $totalProductos ?></li>
          <li>categorias:  <?php echo $totalCategorias ?></li>
          <li>usuarios activos: <?php echo $totalUsuariosActivos ?></li>
          <li>pedidos pendientes: <?php echo $totalPedidosPendientes ?></li>
        </ul>
      
    </ul>
<?php endif; ?> 


    <!-- gestion de productos  GESTOR -->
     
    <!-- ver listado -->
     <!-- crear producto -->
      <!-- reporte de stock critico -->

    <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='gestor'):  ?>

        <h3>Gestion de productos</h3>

        <a class="button" href="listadoProductos.php">ver listado</a>
        <a class="button" href="crearProducto.php">crear producto</a>
        <a class="button" href="critico.php">reporte de stock critico</a>
    
    <?php  endif; ?>
    <!-- stock -->

    <!-- movimientos recientes -->
     <!-- ajustar inventario -->



     <!-- categorias  GESTOR-->

     <!-- ver categoriaas -->
      <!-- crear categorias -->

    <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='gestor'):  ?>
        <h3>Gestion de categorias</h3>

        <a class="button" href="listadoCategorias.php">ver categorias</a>
        <a class="button" href="crearCategoria.php">crear categorias</a>

    <?php  endif; ?>
    <!-- proveedores -->

    <!-- listado -->
     <!-- añadir proveedores -->

     <?php if($_SESSION['rol']=='admin'):  ?>

     <h3>Gestion de proovedores</h3>

    <a class="button" href="listadoProovedores.php">ver proveedores</a>
    <a class="button" href="crearProveedor.php">crear proveedor</a>

    <?php endif;  ?>


     <!-- pedidos GESTOR-->

     <!-- listado -->
    <!-- ver pedidos pendientes -->
    <!-- estadisticas ventas -->

    <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='gestor'):  ?>
        <h3>Gestion de pedidos pendientes</h3>

        <a class="button" href="listadoPedidospendientes.php">pedidos pendientes</a>

        <?php if($_SESSION['rol']=='admin'  ):  ?>
            <a class="button" href="estadisticasVentas.php">estadisticas ventas</a>
        <?php endif; ?>

    <?php endif; ?>

    <!-- valoraciones -->

    <!-- revisar comentarios recientes -->
    
    
    
    
     
     
     
    
    
      
     
     
    
    
      
     
    
    
           
          
         
        
    




<?php if (!empty($errores)): ?>
    <p class="notice">
        <?php foreach ($errores as $e) echo htmlspecialchars($e) . "<br>"; ?>
    </p>
<?php endif; ?>

<?php if ($mensaje!=''): ?>
    <p class="notice"><?=htmlspecialchars($mensaje) ?></p>
<?php endif; ?>


<?php if (!empty($tabla)): ?>  <!--tabla -->
    <?= $tabla ?>
<?php endif; ?>





<?php include "layout/footer.php"; ?>
