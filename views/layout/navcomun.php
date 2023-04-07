<nav class="navbar navbar-expand-lg bg-light mb-3 navbar-fixed">
        
    <div class="container">
        <a class="navbar-brand" href="<?=URL?>">PupuSA</a>
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
                        <li class="nav-item">
                        <a class="nav-link" href="<?=URL?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?=URL?>Food">Comida</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link"  href="<?=URL?>Home/Nosotros">Nosotros</a>

                        </li>
                    </ul>
                    <?php require_once VIEW_LAYOUT_PATH . 'iniciada.php' ?>

                    
                </div>
            </div>
    </div>
</nav>