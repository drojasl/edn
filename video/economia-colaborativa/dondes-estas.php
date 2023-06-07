<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();
$video_actual = getThisFileName();
include_once(VIDEO . $curso_folder . "/curso_config.php");

include_once(VIDEO . "template.php");

include_once(ROOT . "_masInfo.php"); 
?>

<div class="container">
        <div class="ml-5">
        <h4>La par&aacute;bola del acueducto</h4>
        <audio controls>
            <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Jose Bobadilla - El acueducto.mp3" type="audio/mpeg">
        </audio> 
        <p><small>Relato que explica la diferencia entre un negocio propio y negocio con sistema</small></p>
    </div>
</div>
