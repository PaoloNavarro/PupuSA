<nav class="navbar navbar-expand-lg bg-light navbar-fixed">
        
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

                        <li>
                        <a class="nav-link"  href="<?=URL?>Home/promociones">Promociones</a>
                        </li>
                        
                        <?php if ($viewData['loggedIn']): ?>
                            <li>
                                <ul class="navbar-nav align-middle">
                                    <li class="nav-item dropdown d-block d-lg-none">
                                        <a class="nav-link dropdown-toggle" href="#" id="mobileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-regular fa-user"></i> <span></span> Usuario
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="mobileDropdown">
                                            <a class="dropdown-item" href="<?php echo URL; ?>Usuario/perfil">
                                                <i class="fas fa-user"></i> Mi perfil
                                            </a>
                                            <a class="dropdown-item" href="<?php echo URL; ?>Usuario/pedido">
                                                <i class="fas fa-clipboard-list"></i> Mis pedidos
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?php echo URL; ?>Auth/logout">
                                                <i class="fa-solid fa-sign-out"></i> Cerrar sesión
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"){ ?>
                                
                                
                            
                                
                            <?php } ?>
                        <?php else: ?>
                            <!-- Additional code to be executed if the user is not logged in -->
                        
                        <?php endif; ?>


                        
                    </ul>
                    <?php require_once VIEW_LAYOUT_PATH . 'iniciada.php' ?>

                    
                </div>
            </div>
    </div>
</nav>