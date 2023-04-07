<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<div class="container">
  <h1 class="mt-5">Agregar categoria</h1>
  <form class="mt-5" action="<?= URL ?>Admin/AgregarCategoria" method="post">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
            </div>    
            <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1">Disponible</option>
                    <option value="2">No disponible</option>
                </select>
                <button type="submit" class="btn btn-primary">Agregar categoria</button>

            </div>
  </form>
</div>
<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>