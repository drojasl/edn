<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "Click.php");

$error = "";
if(isset($_GET['err'])){
    $error = $_GET['err'];
}
?>
<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(ADMIN . "_header.php");
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>registro.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>registro.js"></script>

</head>

<body>
    <div id="flashMsn"></div>
    <div class="container">
        <header class="row">
            <div class="col-sm-12 col-md-6"><img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png"></div>
            <div class="col-sm-12 col-md-6"><div class='login-sec'>Ya tienes cuenta? <a href="login">Ingresa aquí</a></div></div>
        </header>
        <div class="row">
            <section class="col-sm-12 secContent">
                <form class="form-signin" method="POST" action="recuperar_password2.php">
                    <h4>Ingresa tus datos como los registraste</h4>
                    <div>
                        <img src="../images/codigo_acceso.png" class="imageIcon">
                        <input type="text" class="form-control numbersOnly" name="codigo_amway" placeholder="Codigo Amway" required="" autofocus="" />
                        <label class="checkbox ml-2">
                            <input type="checkbox" name="cotitular"><h4>Soy cotitular</h4>
                        </label>
                    </div>
                    <hr>
                    <div>
                        <img src="../images/mail.png" class="imageIcon">
                        <input type="email" class="form-control" name="email" placeholder="Correo" required="" autofocus="" />
                    </div>
                    <div>
                        <img src="../images/wasape.png" class="imageIcon">
                        <input type="text" class="form-control" name="celular" placeholder="Celular" required="" autofocus="" title="Use el indicativo de pa&iacute;s. Ejemplo +573001234567"/>
                    </div>
                    <hr>

                    <?php
                    if($error == 'noMatch'){
                        echo "<div class='form-error text-center'>Los datos ingresados no coinciden</div>";
                    }
                    ?>
                    <button id="btnSubmitForm" class="btn btn-lg btn-primary btn-block" type="submit">Validar mis datos</button>
                </form>
            </section>
        </div>
        <footer class="row">
            <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
        </footer>
    </div>
</body>

</html>