<?php if($viewData['loggedIn']): //Si hay sesión iniciada ?>
                            <ul class="navbar-nav align-middle">
                                <li class="nav-item">
                                    <a class="nav-link dropdown d-none d-lg-block" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                        <i class="fa-regular fa-user "></i> <span></span> Usuario
                                    </a>
                                    <!-- Lista de opciones -->
                                    <div class="dropdown d-none d-lg-block">                      
                                        <ul class="dropdown-menu">
                                            <li class="nav-item text-start fw-light fw-bold fs-6">
                                                <span class="dropstyle"><?= $_SESSION["user"] ?></span>

                                            </li>
                                            <li class="nav-item text-start fw-light ">
                                                <a href="<?php echo URL; ?>Usuario/perfil" class="dropstyle  ">
                                                    <i class="fas fa-user"></i> Mi perfil
                                                </a>
                                            </li>
                                            <li class="nav-item text-start fw-light ">
                                                <a href="<?php echo URL; ?>Usuario/pedido" class="dropstyle  ">
                                                    <i class="fas fa-clipboard-list"></i> Mis pedidos
                                                </a>
                                            </li>
                                            <hr>

                                            <li class="nav-item text-start fw-light ">
                                                <a href="<?php echo URL; ?>Auth/logout" class="dropstyle  ">
                                                    <i class="fa-solid fa-sign-out"></i> Cerrar sesión
                                                </a>
                                            </li>
                                        </ul>
                                    </div>                  
                                
                                </li>

                                <li class="nav-item text-start d-lg-none">
                                    <span class="nav-link"><?= $_SESSION["user"] ?></span>

                                </li>
                                
                               


                            <?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"){ ?>
                                <li class="nav-item"><a class="nav-link" href="<?= URL ?>Admin/Pedidos">Pedidos</a></li>          
                               
                            <?php } else { ?>
                                <a class="nav-link" href="<?= URL ?>Carrito/VerCarrito">
                                        <i class="fa-solid fa-cart-shopping"></i> Carrito
                                        <?php if (isset($_SESSION['carrito'])): ?>
                                         <span class="badge bg-danger"><?= count($_SESSION['carrito']) ?></span>
                                        <?php endif; ?>
                                </a>
                                
                            <?php } ?>
                            
<?php else: //Si no hay sesión iniciada ?>
                        <ul class="navbar-nav align-middle">
                            <!-- Pantallas grandes  - ocultar -->
                            <li class="nav-item registrar-btn d-none d-lg-block">
                                <a href="<?=URL?>Home/Login" class="nav-link">
                                    <i class="fa-solid fa-user"></i> Ingresar / Registrarse
                                </a>                  

                            </li>
                            <!-- Pantallas pequeñas login - mostrar -->
                            <li class="nav-item d-lg-none">
                                <a href="<?=URL?>Home/Login" class="nav-link">
                                    Ingresar / Registrarse
                                </a>
                                
                            </li>

                            
                            
                        </ul>
<?php endif; ?>