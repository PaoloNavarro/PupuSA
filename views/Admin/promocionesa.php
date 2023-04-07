<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>


<body>
    <h1>Guardar promoción</h1>
    <form method="post" action="guardar_promocion.php" enctype="multipart/form-data">
        <label>Título:</label><br>
        <input type="text" name="titulo"><br><br>

        <label>Imagen:</label><br>
        <input type="file" name="imagen"><br><br>

        <label>Precio:</label><br>
        <input type="number" name="precio"><br><br>

        <input type="submit" value="Guardar">
    </form>
</body>
<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
