<nav class="navbar navbar-expand-lg bg-light mb-3 navbar-fixed">
        
    <div class="container">
        <a class="navbar-brand" >Administrador</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Opciones del menu -->
        <div class="offcanvas offcanvas-start half-screen" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="navbarNavLabel">Menú</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body justify-content-between">
                <ul class="navbar-nav align-middle">
                    <li class="nav-item"><a class="nav-link"  href="<?= URL ?>Admin">Inicio Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>Admin/Pedidos">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URL ?>Admin/Register">Usuarios</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="promocionesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Promociones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="promocionesDropdown">
                            <li><a class="dropdown-item" href="<?= URL ?>Admin/PromocionesA">Ver promociones</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>Admin/PromocionesA">Agregar promoción</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>Admin/PromocionesE">Editar promoción</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                            <li><a class="dropdown-item" href="<?= URL ?>Food/">Ver productos</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>Admin/ProductoA">Agregar producto</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>Admin/ProductoE">Editar producto</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                            <li><a class="dropdown-item" href="<?= URL ?>Admin/Acategoria">Agregar categoria</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>Admin/Ecategoria">Editar categoria</a></li>
                        </ul>
                    </li>
                </ul>
                <?php require_once VIEW_LAYOUT_PATH . 'iniciada.php' ?>
            </div>
        </div>
    </div>
</nav>