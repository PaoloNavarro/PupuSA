<?php

    function mostrarEstadoCategoria(Categoria $categoria) {
    if($categoria->getEstado() == 1) {
        $html = '
            <form method="post" action="'.URL.'Admin/cambiarEstadoCategoria">
                <input type="hidden" name="id_categoria" value="'.$categoria->getIdCategoria().'">
                <input type="hidden" name="estado" value="1">
                <button type="submit" class="btn btn-success">Disponible</button>
            </form>
        ';
    } else {
        $html = '
            <form method="post" action="'.URL.'Admin/cambiarEstadoCategoria">
                <input type="hidden" name="id_categoria" value="'.$categoria->getIdCategoria().'">
                <input type="hidden" name="estado" value="2">
                <button type="submit" class="btn btn-danger">No Disponible</button>
            </form>
        ';
    }
    
    return $html;
}

?>