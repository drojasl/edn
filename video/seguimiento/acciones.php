<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();
$video_actual = getThisFileName();
include_once(VIDEO . $curso_folder . "/curso_config.php");

include_once(VIDEO . "template.php");
?>
<?php include_once(ROOT . "_masInfo.php"); ?>
<div class="container">
    <div class="text-center mb-4"><h5>Recomendados:</h5></div>
    <div class="row">
        <div class="col-sm">
            <div class="ml-5">
                <h4>Jose Bobadilla</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Jose Bobadilla.- Aprendiendo a soniar.mp3" type="audio/mpeg">
                </audio> 
                <p><small>Conferencia: Aprendiendo a soñar</small></p>
            </div>
        </div>
        <div class="col-sm">
            <div class="ml-5">
                <h4>James Mateus</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/James Mateus - La batalla termino.mp3" type="audio/mpeg">
                </audio> 
                <p><small>Conferencia: La batalla termin&oacute;</small></p>
            </div>
        </div>
    </div>
</div>

<?php include_once(ROOT . "datosContacto.php"); ?>