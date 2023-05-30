<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/nosotros.css" ?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">

<style>
.container .df{
  display: flex;
  align-items: center;
}

.container img {
  margin-right: 10px;
}
</style>
<!-- INSERTAR CONTENIDO -->
<body>
<section class="about-us">


  <div class="container df">
  <h2 class="section-title">Sobre nosotros</h2>
    <img src="../public/img/logotipo.png" alt="Descripción de la imagen" style="widht:" class="mb-4" data-aos="fade-up">
  </div>
  <div class="container">
    
    <div class="about-content">
      <p class="about-text" data-aos="fade-up">Bienvenidos a nuestra tienda en línea de pupusas. Somos una empresa familiar que se enorgullece de compartir con ustedes el sabor auténtico de las pupusas salvadoreñas.</p>
      <p class="about-text" data-aos="fade-up">Nuestra pasión por la comida nos ha llevado a crear una tienda en línea donde puedas encontrar una gran variedad de pupusas, desde las tradicionales de queso y chicharrón hasta opciones más innovadoras como la pupusa de pollo y espinacas.</p>
      <p class="about-text" data-aos="fade-up">Además, ofrecemos promociones especiales para que puedas disfrutar de nuestras deliciosas pupusas a precios aún más accesibles. Creemos que la buena comida no tiene que ser costosa y trabajamos arduamente para asegurarnos de que siempre puedas disfrutar de un platillo lleno de sabor a un precio justo.</p>
      <p class="about-text" data-aos="fade-up">Nuestro compromiso con la calidad es fundamental en todo lo que hacemos. Utilizamos ingredientes frescos y de alta calidad para nuestras pupusas y nos aseguramos de que cada orden sea preparada con el cuidado y la atención que merece.</p>
      <p class="about-text" data-aos="fade-up">Estamos encantados de poder llevar un pedacito de El Salvador a tu hogar y esperamos que disfrutes nuestras pupusas tanto como nosotros disfrutamos prepararlas. ¡Gracias por confiar en nosotros y por apoyar a los negocios locales!</p>
    </div>
  </div>
</section>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
  <script>
    AOS.init();
  </script>
<!-- FIN CONTENIDO -->

<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>
    
