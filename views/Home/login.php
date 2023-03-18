<?php
if(isset($_SESSION["user"])){
    header("Location: /MyFood");
    exit;
}
?>

<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

<link rel="stylesheet" href="<?= URL . "public/css/login.css" ?>">
    <main role="main" class="container container-content">
                <div class="row">
                    <div id="login" class="col-lg-4 offset-lg-4 col-md-6 offset-md-3
                        col-12">
                        <div class="welcome-text">
                            <h2>Bienvenido</h2>
                        </div>
             
                        <img class="img-fluid mx-auto d-block rounded"
                            src="/MyFood/public/img/loginPIC.png" style="height:200px;" />
                    <div class="content">   
              
                        <form method="POST" class="form" action="<?=URL?>auth/login">
                 
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input id="correo" name="usuario"
                                    class="form-control" type="email"
                                    placeholder="Correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <label for="palabraSecreta">Contraseña</label>
                                <input  id="palabraSecreta" name="contrasena"
                                    class="form-control" type="password"
                                    placeholder="Contraseña" required>
                            </div>
                        
                            
                                <div class="row mt-3 cont-button">
                                        <input id="bton" name="btningresar"
                                        class="btn btn-primary" type="submit"
                                        placeholder="Ingresar" value="INICIAR SESION">
                                    
                                        <input id="resgistbtn" name="resgistbtn"
                                        class="btn btn-info" data-bs-toggle="modal" data-bs-target="#btnregis"
                                        type="buton" placeholder="Ingresar" value="REGISTRO">
                                    
                                        <input id="resgistbtn" name="resgistbtn"
                                        class="btn btn-info" data-bs-toggle="modal" data-bs-target="#btrRecupe"
                                        type="buton"
                                        placeholder="Olvide mi contraseña" value="OLVIDE MI CONTRASEÑA">
                                </div>

                        </form>
                    </div>
                </div>
