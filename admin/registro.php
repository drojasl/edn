<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "Click.php");

$error = "";
if(isset($_GET['err'])){
    $error = $_GET['err'];
}
$clicks = Click::getAllClicks();
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
                <form class="form-signin" method="POST" action="registrarEmpresario.php">
                    <h2 class="form-signin-heading">Introduce tus datos</h2>
                    <div>
                        <img src="../images/persona.png" class="imageIcon">
                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" required="" autofocus="" />
                    </div>
                    <div>
                        <img src="../images/persona.png" class="imageIcon">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required="" autofocus="" />
                    </div>
                    <div>
                        <img src="../images/mail.png" class="imageIcon">
                        <input type="email" class="form-control" name="email" placeholder="Correo" required="" autofocus="" />
                    </div>
                    <div>
                        <img src="../images/wasape.png" class="imageIcon">
                        <input type="text" class="form-control" name="celular" placeholder="Celular" required="" autofocus="" title="Use el indicativo de pa&iacute;s. Ejemplo +573001234567"/>
                    </div>
                    <label class="checkbox ml-2">
                        <input type="checkbox" name="whatsapp"><h4>WhatsApp?</h4>
                    </label>
                    <hr>
                    <div>
                        <img src="../images/codigo_acceso3.png" class="imageIcon">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" autofocus="" />
                    </div>
                    <div>
                        <img src="../images/codigo_acceso3.png" class="imageIcon">
                        <input type="password" class="form-control" name="repassword" placeholder="Confirme password" required="" autofocus="" />
                    </div>
                    <hr>
                    <div>
                        <img src="../images/codigo_acceso.png" class="imageIcon">
                        <input type="text" class="form-control numbersOnly" name="codigo_amway" placeholder="Codigo Amway" required="" autofocus="" />
                        <label class="checkbox ml-2">
                            <input type="checkbox" name="cotitular"><h4>Soy cotitular</h4>
                        </label>
                    </div>
                    <div>
                        <img src="../images/codigo_acceso.png" class="imageIcon">
                        <input type="text" class="form-control" name="clave_autoregistro_empresario" placeholder="Clave auto registro empresario" autofocus="" />
                        <img src="../images/question.png" class="questionHelp" title="Clave de Auto Registro Empresario. Se puede encontrar en la Oficina virtual / Obtener claves de autoregistro">
                    </div>
                    <div>
                        <img src="../images/codigo_acceso.png" class="imageIcon">
                        <input type="text" class="form-control" name="clave_autoregistro_cliente" placeholder="Clave auto registro cliente" autofocus="" />
                        <img src="../images/question.png" class="questionHelp" title="Clave de Auto Registro de Cliente. Se puede encontrar en la Oficina virtual / Obtener claves de autoregistro">
                    </div>
                    <div>
                            <img src="../images/codigo_acceso.png" class="imageIcon">
                            <input type="text" class="form-control" name="mi_tienda_digital" placeholder="Link a Mi Tienda Digital Amway" autofocus="" />
                            <img src="../images/question.png" class="questionHelp" title="Puedes crear tu pagina personalizada en Oficina virtual / Mi Tienda Digital">
                        </div>
                    <hr>
                    <div>
                        <img src="../images/click2.png" class="imageIcon">
                        <select class="form-control" name="click_id">
                            <?php
                                foreach($clicks as $click){
                                    echo "<option value=". $click['id'] ." $selected>". $click['organizadores'] ." - ". $click['departamento_ciudad'] ." - ". $click['nombre'] ."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="" value="true">
                    <?php
                    if($error == 'noMatch'){
                        echo "<div class='form-error text-center'>El password y la confirmaci&oacute;n no coinciden</div>";
                    }
                    if($error == 'dupl'){
                        echo "<div class='form-error text-center'>El codigo Amway ya se encuentra registrado <a href='login'>Inicia sesi&oacute;n</a></div>";
                    }
                    ?>
                    <button id="btnSubmitForm" class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
                </form>
            </section>
        </div>
        <footer class="row">
            <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
        </footer>
    </div>
</body>

</html>