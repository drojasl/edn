<?php
@session_start();
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>datos_contacto.css">
<div class="text-center m-5" style="color:white">_</div>
<div id='datosContactoEmp'>
<?php
    include_once(CLASSES . "Empresario.php");
    $empresario = null;
    if(isset($_SESSION['Empresario'])){
        $empresario = unserialize($_SESSION['Empresario']);
        $codigo_acceso = $_SESSION['Acceso'];
    }
    if($empresario){
?>
        <div class="container">
            <b>¿Necesitas m&aacute;s informaci&oacute;n? Cont&aacute;ctanos:</b><br>
            <div class="row">
                <div class="col-sm-12 col-md-4" style="flex-wrap: nowrap">
                    <?php echo $empresario->nombres . " " . $empresario->apellidos ?>
                </div>
                <div class="col-sm-12 col-md-4" style="flex-wrap: nowrap">
                    <?php
                        echo ($empresario->whatsapp) ? "<a target='_blank' href='https://wa.me/{$empresario->celular}'>$empresario->celular</a>" : $empresario->celular;
                        echo ($empresario->whatsapp) ? "<img src='".IMAGES_WEB."/wasape.png'>" : "";
                    ?>
                </div>
                <div class="col-sm-12 col-md-4" style="flex-wrap: nowrap">
                    <a href="mailto:<?php echo $empresario->email ?>"><?php echo $empresario->email ?></a>
                </div>
            </div>
        </div>
<?php
    }
?>
</div>