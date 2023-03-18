<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/food.css" ?>">
<!-- INSERTAR CONTENIDO -->

<head>
    <title>Productos</title>
</head>
<body>
    <h1>Listado de productos</h1>
   
    <table>
        <tr>
        <th>Imagen</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            
            <th>Cantidad</th>
      <th>Acciones</th>
        </tr>
        <?php foreach ($viewData['productos'] as $producto) { ?>
    <tr>
        <td><img src="<?php echo $producto->getImageUrl(); ?>" alt="<?php echo $producto->getNombre(); ?>" style="width: 25px;"></td>
        <td><?php echo $producto->getIdProducto(); ?></td>
        <td><?php echo $producto->getNombre(); ?></td>
        <td><?php echo $producto->getPrecio(); ?></td>
        <td>
          <form action="<?=URL?>carrito/agregarProducto" method="post">
            <input type="hidden" name="id_producto" value="<?php echo $producto->getIdProducto(); ?>">
            <input type="number" name="cantidad" value="1" min="1" max="10">
            
        </td>
        <td>
            <button type="submit">Agregar al carrito</button>
          </form>
        </td>
    </tr>
<?php } ?>


        


</body>
<!-- FIN CONTENIDO -->

<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>
    
