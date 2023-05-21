<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<body>
    <div class="container">
        <div class="row">
        <div class="col-8">
            <h1 class="mb-4">Editar promoción</h1>
            <form method="post" action="guardar_promocion.php" enctype="multipart/form-data">

                <div class="form-group col-md-12 mb-4" >
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" class="form-control">
                </div>

                <div class="form-group col-md-12 mb-4">
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen" class="form-control-file">
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" class="form-control">
                </div>

                <input type="submit" value="Guardar" class="btn btn-primary">
            </form>
        </div>
        </div>
    </div>
</body>
<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

