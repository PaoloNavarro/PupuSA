
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PupuSA | <?= $viewData["title"] ?? DEFAULT_TITLE ?></title>

    <!-- Bootstrap V5.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Sweat Alert V2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- PERSONAL CSS -->
    <link rel="stylesheet" href="<?= URL . "public/css/style.css" ?>">
    <link rel="shortcut icon" href="<?= URL . "public/img/logo.png" ?>" type="image/x-icon">
</head>
<body>

<!-- Inicio Navbar -->
<!-- Inicio Navbar -->
<?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"): ?>

<nav class="navbar navbar-expand-lg bg-light mb-3 navbar-fixed">
    <div class="container">
    <a class="navbar-brand" href="./">Administradores</a>

    <div class="collapse navbar-collapse" id="navbarAdmin">
        <div class="d-flex flex-lg-row flex-md-column w-100 justify-content-between">
        <ul class="navbar-nav align-middle">
                <li class="nav-item"><a class="nav-link"  href="<?= URL ?>Admin">Inicio Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= URL ?>Admin/Pedidos">Pedidos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= URL ?>Admin/Register">Registrar Usuario</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= URL ?>Admin/Promociones">Promociones</a></li>
                </li>
            </ul>

        </div>
    </div>

    </div>

</nav>
<?php endif; ?>

<!-- Here -->

<nav class="navbar navbar-expand-lg bg-light mb-3 navbar-fixed">
    
  <div class="container">
    <a class="navbar-brand" href="./">PupuSA</a>
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

                <?php if($viewData['loggedIn']): //Si hay sesión iniciada ?>
                        <ul class="navbar-nav align-middle">
                            <li class="nav-item">
                                <span class="nav-link">Hola: <?= $_SESSION["user"] ?></span>
                            </li>
                            <li class="nav-item">
                                <a href="Auth/Logout" class="nav-link">
                                    <i class="fa-solid fa-sign-out"></i> Cerrar sesión
                                </a>
                            </li>
                        </ul>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>Carrito/VerCarrito">
                                <i class="fa-solid fa-cart-shopping"></i> Ver Carrito
                            </a>
                        </li>
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
            </div>
        </div>
  </div>
</nav>

<style>
    @media (max-width: 991.98px) {
  .half-screen {
    width: 50%;
    max-width: 250px;
  }
}

</style>

<!-- Fin navbar -->
