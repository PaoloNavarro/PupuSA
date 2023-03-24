<?php
if(isset($_SESSION["user"])){
    header("Location: /Myfood");
    exit;
}
?>

<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<link rel="stylesheet" href="<?= URL . "public/css/login.css" ?>">

    <body>
        <section>
            <div class="form-box">
                <div class="form-value">   
                    
                    <form method="POST" class="form" action="<?=URL?>Auth/login">
                
                        <h2>Login</h2>
                        <!-- Email -->
                        <div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input id="correo" name="usuario" type="email" required>
                                <label for="correo">Email</label>

                        </div>

                        <!-- Contraseña -->
                        <div class="inputbox">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                                <input  id="palabraSecreta" name="contrasena" type="password" required>
                                <label for="">Password</label>
                        </div>

                        <button id="bton" name="btningresar" type="submit">Log in</button>

                        <div class="register" id="resgistbtn" name="resgistbtn">
                            <p>Don't have a account <a href="#">Register</a></p>
                        </div>
                    
                    
                        <!-- <input id="resgistbtn" name="resgistbtn"
                        class="btn btn-info" data-bs-toggle="modal" data-bs-target="#btnregis"
                        type="buton" placeholder="Ingresar" value="REGISTRO">
                    
                        <input id="resgistbtn" name="resgistbtn"
                        class="btn btn-info" data-bs-toggle="modal" data-bs-target="#btrRecupe"
                        type="buton"
                        placeholder="Olvide mi contraseña" value="OLVIDE MI CONTRASEÑA">
                            -->

                    </form>
                </div>
            </div>

        </section>

    </body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php require_once VIEW_LAYOUT_PATH . "footer.php" ?>
