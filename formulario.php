<?php
@session_start();
include_once(dirname(__FILE__) . "/config/dirConfig.php");

include_once(CLASSES . "Empresario.php");
$codigo_acceso = "";
$empresario_id = "";
$empresario = null;
if(isset($_SESSION['Empresario'])){
    $empresario = unserialize($_SESSION['Empresario']);
    $codigo_acceso = $_SESSION['Acceso'];
    $empresario_id = $empresario->id;
}
else{
    if(isset($_SESSION['Acceso'])){
        $codigo_acceso = $_SESSION['Acceso'];
    }
    else if(isset($_COOKIE['Acceso'])){
        $codigo_acceso = $_COOKIE['Acceso'];
    }
    if($codigo_acceso){
        $empresario = new Empresario();
        $acceso = $empresario->validarAcceso($codigo_acceso);
        if($acceso){
            $_SESSION['Acceso'] = $codigo_acceso;
            $_SESSION['Empresario'] = serialize($empresario);
        }
    }
}
$error = "";
if(isset($_GET['err'])){
    $error = $_GET['err'];
}
if($error == 'code'){
    $empresario_id = "";
    $codigo_acceso = "";
}
?>
<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<meta charset="UTF-8">
<?php
include_once(ROOT . "_header.php");
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>formulario.css">
<script type="text/javascript" src="<?php echo JS_WEB ?>formulario.js"></script>

</head>

<body>
<div id="flashMsn"></div>
<header>
    <img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png">
</header>
<section>
  <div class="wrapper">
    <form class="form-signin" method="POST" action="guardarDatos.php">
        <h2 class="form-signin-heading">Introduce tus datos</h2>
        <?php
        if($empresario_id){
            echo '<input type="hidden" class="form-control" name="empresario_id" placeholder="Codigo de acceso al curso" required="" autofocus="" value="'.$empresario_id.'" readonly="readonly"/>';
        }
        if($codigo_acceso){
            echo '<input type="hidden" class="form-control" name="codigo_acceso" value="'.$codigo_acceso.'" readonly="readonly"/>';
        }else{
            echo '<div>
                    <img src="'.IMAGES_WEB.'codigo_acceso3.png" class="imageIcon">
                    <input type="text" class="form-control" name="codigo_acceso" placeholder="Codigo de acceso al curso" required="" autofocus=""/>
                </div>';
        }
        ?>
        <div>
            <img src="<?php echo IMAGES_WEB ?>persona.png" class="imageIcon">
            <input type="text" class="form-control" name="nombre" placeholder="Tu nombre completo" required="" autofocus="" />
        </div>
        <div>
            <img src="<?php echo IMAGES_WEB ?>pais2.png" class="imageIcon">
            <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" required="" autofocus="" />
        </div>
        <div>
            <img src="<?php echo IMAGES_WEB ?>ciudad.png" class="imageIcon">
            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" required="" autofocus="" />
        </div>
        <div>
            <img src="<?php echo IMAGES_WEB ?>mail.png" class="imageIcon">
            <input type="email" class="form-control" name="correo" placeholder="Correo" required="" autofocus="" />
        </div>
        <div>
            <img src="<?php echo IMAGES_WEB ?>wasape.png" class="imageIcon">
            <input type="text" class="form-control" name="celular" placeholder="Celular" required="" autofocus="" title="Use el indicativo de pa&iacute;s. Ejemplo +573001234567"/>
        </div>
        <br>
        <hr>
        <label class="checkbox">
            <input type="checkbox" value="acepto" id="chkAcepto" name="acepto"><h5>Autorizaci&oacute;n de contacto</h5>
            <div class="ml-4">
                <small><small>Tu informaci&oacute;n no ser&aacute; compartida con nadie externo a La Escuela de Negocios</small></small>
            </div>
        </label>
        <?php 
            if($error == 'acepta'){
                echo "<div class='form-error'><img src='images/check.png'>Es necesario aceptar el contacto</div>";
            }
            if($error == 'code'){
                echo "<div class='form-error'><img src='images/codigo_acceso3.png'>El codigo ingresado no es v&aacute;lido</div>";
            }
        ?>
        <button id="btnSubmitForm" class="btn btn-lg btn-primary btn-block" type="submit">Quiero conocer el proyecto</button>
    </form>
  </div>
</section>
<div id="validarCodigoAcceso">
    <?php include_once(ROOT . "datosContacto.php"); ?>
</div>
</body>

</html>