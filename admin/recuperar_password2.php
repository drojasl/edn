<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "BD.php");
include_once(CLASSES . "Empresario.php");

$error = "";
if(isset($_GET['err'])){
    $error = $_GET['err'];
}
$codigo_amway = BD::blockSQLInjection($_POST['codigo_amway']);
if(isset($_POST["cotitular"]) && $_POST["cotitular"] == "on"){
    $codigo_amway .= "C";
}
$email = BD::blockSQLInjection($_POST['email']);
$celular = BD::blockSQLInjection($_POST['celular']);
$empresario = new Empresario();

if(!$empresario->validateEmpresarioData($codigo_amway, $email, $celular)) {
    header("Location: recuperar_password?err=noMatch");
    return;
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
                <form class="form-signin" method="POST" action="recoveryPass.php">
                    <div>
                        <input type="hidden" class="form-control numbersOnly" name="codigo_amway" value="<?php echo $codigo_amway ?>" />
                        <input type="hidden" class="form-control" name="email" value="<?php echo $email ?>" />
                        <input type="hidden" class="form-control" name="celular" value="<?php echo $celular ?>" />
                    </div>
                    <h4>Nueva Contrase&ntilde;a</h4>
                    <div>
                        <img src="../images/codigo_acceso3.png" class="imageIcon">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" autofocus="" />
                    </div>
                    <div>
                        <img src="../images/codigo_acceso3.png" class="imageIcon">
                        <input type="password" class="form-control" name="repassword" placeholder="Confirme password" required="" autofocus="" />
                    </div>
                    <hr>
                    <input type="hidden" name="" value="true">
                    <?php
                    if($error == 'noMatch'){
                        echo "<div class='form-error text-center'>El password y la confirmaci&oacute;n no coinciden</div>";
                    }
                    ?>
                    <button id="btnSubmitForm" class="btn btn-lg btn-primary btn-block" type="submit">Actualizar Contrase&ntilde;a</button>
                </form>
            </section>
        </div>
        <footer class="row">
            <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
        </footer>
    </div>
</body>

</html>