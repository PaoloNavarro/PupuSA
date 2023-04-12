<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<!-- INSERTAR CONTENIDO -->
<link rel="stylesheet" href="<?= URL . "public/css/inicio.css" ?>">

<!-- INSERTAR CONTENIDO -->
<body>
    
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="container pt-2">

<div class="products">
    
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="1000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php $count = 0; ?>
    <?php foreach ($viewData['productos'] as $producto) { ?>
      <?php if($producto->getEstado() == 1 && $count < 3) { ?>
        <div class="carousel-item <?php if($count == 0) { echo 'active'; } ?>">
          <img src="<?php echo $producto->getImageUrl(); ?>" class="d-block" alt="">
        </div>
        <?php $count++; ?>
      <?php } ?>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
          
</div>
  
</div>


    <div class="container mt-5">
        <div class="row">
            <div class="col text-center mb-4">
            <img src="public/img/pu1.jpg" class="rounded" alt="...">
            </div>
            <div class="col text-center">
            <img src="public/img/pu2.jpg" class="rounded" alt="...">
            </div>
        </div>
    </div>


    
</body>
<!-- FIN CONTENIDO -->

<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>
    
