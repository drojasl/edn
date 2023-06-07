<?php
include_once(dirname(__FILE__) . "/config/dirConfig.php");
$codigoInvalido = false;
$error = "";
if(isset($_GET['err'])){
    $error = $_GET['err'];
}
if($error == 'code'){
    $codigoInvalido = true;
}
?>
<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(ROOT . "_header.php");
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>button.css">
<link rel="stylesheet" href="<?php echo CSS_WEB ?>form_acceso.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>formCodigoAcceso.js"></script>

</head>

<body>
<section id="wrapper" class="fondo_medio">
    <form action="<?php echo ROOT_WEBFOLDER ?>validarCodigoAccesoBD.php" method="POST" class="form_acceso" data-ajax="false">
        <h1>INGRESA EL CODIGO DE ACCESO</h1>
        <img src="<?php echo IMAGES_WEB ?>codigo_acceso3.png" class="imageIcon">
        <input id="codigo_acceso" type="text" name="codigo_acceso" placeholder="Codigo de Acceso" maxlength="15">
        <input id="return_to" type="hidden" name="return_to" value=<?php echo isset($return_to) ? $return_to : 'emprende.php' ?>>
        <section class="buttonSec">
            <button id="btnIngreso" type="button" value="emprende">INGRESAR</button>
        </section>
        <?php
            if($codigoInvalido){
                echo "<div class='error'>El codigo ingresado no se encuentra activado<br>Comun&iacute;quese con la persona que le brind&oactue; acceso al curso</div>";
            }
        ?>
    </form>
</section>
</body>

</html>