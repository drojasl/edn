<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();
$video_actual = getThisFileName();
include_once(VIDEO . $curso_folder . "/curso_config.php");

include_once(VIDEO . "template.php");
$objEmpresario = unserialize($_SESSION["Empresario"]);
?>
<div class="container">
    <h2><span class='text-secondary'>Usa el siguiente c&oacute;digo para el registro:</span>
    <?php 
        if ($objEmpresario->clave_autoregistro_empresario) {
            echo "<a target='_blank' href='https://www.amway.com.co/IRENew/Reg.aspx?regCode=" . $objEmpresario->clave_autoregistro_empresario . "'>
                <span class='text-primary'> $objEmpresario->clave_autoregistro_empresario </span>
            </a>";
        }
        else {
            echo "<br><span class='ml-3 text-primary'><small><small>Mas abajo encuentras los datos de contacto de <u><i>$objEmpresario->nombres</i></u>.</small></small></span>";
            echo "<br><span class='ml-3 text-primary'><small><small>Comunicate para obtener un c&oacute;digo de registro</small></small></span>";
        }
    ?>
    </h2>
</div>
<?php include_once(ROOT . "datosContacto.php"); ?>