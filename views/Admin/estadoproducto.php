<?php

    function mostrarEstadoProducto(Producto $producto) {
    if($producto->getEstado() == 1) {
        $html = '
            <form method="post" action="'.URL.'Admin/cambiarEstadoProducto">
                <input type="hidden" name="id_producto" value="'.$producto->getIdProducto().'">
                <input type="hidden" name="estado" value="1">
                <button type="submit" class="btn btn-success">Disponible</button>
            </form>
        ';
    } else {
        $html = '
            <form method="post" action="'.URL.'Admin/cambiarEstadoProducto">
                <input type="hidden" name="id_producto" value="'.$producto->getIdProducto().'">
                <input type="hidden" name="estado" value="2">
                <button type="submit" class="btn btn-danger">No Disponible</button>
            </form>
        ';
    }
    
    return $html;
}

?>
