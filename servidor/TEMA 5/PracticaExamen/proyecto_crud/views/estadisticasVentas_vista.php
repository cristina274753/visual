<?php include "layout/header.php"; ?>

    
    <h1>estadisticas ventas</h1>

    <h2>Ventas totales</h2>
    <p>num: </p>
    <p>total precio: </p>


    <h2>ventas por producto</h2>
    <?php if (!empty($tablaProductos)): ?>  <!--tabla -->
        <?= $tablaProductos ?>
    <?php endif; ?>


    <h2>ventas por categorias</h2>
    <p>categoria que da mas ingresos: </p>
    <?php if (!empty($tablaCategorias)): ?>  <!--tabla -->
        <?= $tablaCategorias ?>
    <?php endif; ?>

    <h2>ventas popr cliente</h2>
    <p>numero de pedidos por cliente</p>
    <p>cuanto ha gastado en total cada cliente</p>
    <?php if (!empty($tablaCliente)): ?>  <!--tabla -->
        <?= $tablaCliente ?>
    <?php endif; ?>


    <h2>pedidos pendientes</h2>
    <p>num: <?php echo $pendientes ?></p>

    <h2>estado de los pedidos</h2>
    <p>estado de cada pedido</p>
    <?php if (!empty($tablaPedidos)): ?>  <!--tabla -->
        <?= $tablaPedidos ?>
    <?php endif; ?>

    


<?php include "layout/footer.php"; ?>
