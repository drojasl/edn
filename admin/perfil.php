<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(ADMIN . "validarAccesoEmpresario.php");
include_once(CLASSES . "Click.php");

$empresario = unserialize($_SESSION['EmpresarioLogueado']);
$clicks = Click::getAllClicks();

$error = "";
$msn = "";
if(isset($_GET['err'])){
    $error = $_GET['err'];
}
if(isset($_GET['msn'])){
    $msn = $_GET['msn'];
}
?>
<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(ADMIN . "_header.php");
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>perfil.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>perfil.js"></script>
</head>

<body>
    <div id="flashMsn"></div>
    <div class="container">
        <header class="row">
            <div class="col-sm-12 col-md-6"><img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png"></div>
            <div class="col-sm-12 col-md-6"><?php include_once(ADMIN . "_logout.php"); ?></div>
        </header>
        <div class="row">
            <section class="col-sm-12"><?php include_once(ADMIN . "_mainMenu.php");; ?></section>
            <section class="col-sm-12 secContent">
                <div class="wrapper">
                    <?php 
                        if($msn == 'ok'){
                            echo "<div class='form-success'>Los datos se actualizaron correctamente</div>";
                        }
                    ?>
                    <form class="form-signin" method="POST" action="actualizarPerfil.php">
                        <h2 class="form-signin-heading">Actualiza tus datos</h2>
                        <input type="hidden" name="id" value="<?php echo $empresario->id ?>">
                        <div>
                            <img src="../images/persona.png" class="imageIcon">
                            <input type="text" class="form-control" name="nombres" placeholder="Nombres" required="" autofocus="" value="<?php echo $empresario->nombres ?>" />
                        </div>
                        <div>
                            <img src="../images/persona.png" class="imageIcon">
                            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required="" autofocus="" value="<?php echo $empresario->apellidos ?>" />
                        </div>
                        <div>
                            <img src="../images/mail.png" class="imageIcon">
                            <input type="email" class="form-control" name="email" placeholder="Correo" required="" autofocus="" value="<?php echo $empresario->email ?>" />
                        </div>
                        <div>
                            <img src="../images/wasape.png" class="imageIcon">
                            <input type="text" class="form-control" name="celular" placeholder="Celular" required="" autofocus="" value="<?php echo $empresario->celular ?>" title="Use el indicativo de pa&iacute;s. Ejemplo +573001234567"/>
                        </div>
                        <label class="checkbox">
                            <input type="checkbox" name="whatsapp" <?php echo ($empresario->whatsapp) ? "checked" : "" ?>><h4>WhatsApp?</h4>
                        </label>
                        <hr>
                        <label class="checkbox">
                            <input type="checkbox" name="changePass" id="changePass"><h4>Cambiar password</h4>
                        </label>
                        <div class="dvChangePass">
                            <div>
                                <img src="../images/codigo_acceso3.png" class="imageIcon">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="" autofocus="" value="" disabled="disabled" />
                            </div>
                            <div>
                                <img src="../images/codigo_acceso3.png" class="imageIcon">
                                <input type="password" class="form-control" name="repassword" placeholder="Confirme password" required="" autofocus="" value="" disabled="disabled" />
                            </div>
                        </div>
                        <hr>
                        <div>
                            <img src="../images/codigo_acceso.png" class="imageIcon">
                            <input type="text" class="form-control numbersOnly" name="codigo_amway" placeholder="Codigo Amway" required="" autofocus="" value="<?php echo $empresario->codigo_amway ?>" />
                        </div>
                        <div>
                            <img src="../images/codigo_acceso.png" class="imageIcon">
                            <input type="text" class="form-control" name="clave_autoregistro_empresario" placeholder="Clave auto registro empresario" autofocus="" value="<?php echo $empresario->clave_autoregistro_empresario ?>" />
                            <img src="../images/question.png" class="questionHelp" title="Clave de Auto Registro Empresario. Se puede encontrar en la Oficina virtual / Obtener claves de autoregistro">
                        </div>
                        <div>
                            <img src="../images/codigo_acceso.png" class="imageIcon">
                            <input type="text" class="form-control" name="clave_autoregistro_cliente" placeholder="Clave auto registro cliente" autofocus="" value="<?php echo $empresario->clave_autoregistro_cliente ?>" />
                            <img src="../images/question.png" class="questionHelp" title="Clave de Auto Registro de Cliente. Se puede encontrar en la Oficina virtual / Obtener claves de autoregistro">
                        </div>
                        <div>
                            <img src="../images/codigo_acceso.png" class="imageIcon">
                            <input type="text" class="form-control" name="mi_tienda_digital" placeholder="Link a Mi Tienda Digital Amway" autofocus="" value="<?php echo $empresario->mi_tienda_digital ?>" />
                            <img src="../images/question.png" class="questionHelp" title="Puedes crear tu pagina personalizada en Oficina virtual / Mi Tienda Digital">
                        </div>
                        <hr>
                        <div>
                            <img src="../images/click2.png" class="imageIcon">
                            <select class="form-control" name="click_id">
                                <?php
                                    if($empresario->click_id == 0){
                                        echo "<option value=''>--Seleccione--</option>";
                                    }
                                    foreach($clicks as $click){
                                        $selected = ($click['id'] == $empresario->click_id) ? "selected='selected'" : "";
                                        echo "<option value=". $click['id'] ." $selected>". $click['organizadores'] ." - ". $click['departamento_ciudad'] ." - ". $click['nombre'] ."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="" value="true">
                        <?php
                        if($error == 'noMatch'){
                            echo "<div class='form-error'>El password y la confirmaci&oacute;n no coinciden</div>";
                        }
                        if($error == 'dupl'){
                            echo "<div class='form-error'>El codigo Amway ya se encuentra registrado <a href='login.php'>Inicia sesi&oacute;n</a></div>";
                        }
                        ?>
                        <button id="btnSubmitForm" class="btn btn-lg btn-primary btn-block" type="submit">Actualizar datos</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
    </footer>
</body>

</html>
<script>
    selMenuActivo("perfil");
</script>