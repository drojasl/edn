<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();
$video_actual = getThisFileName();
include_once(VIDEO . $curso_folder . "/curso_config.php");

include_once(VIDEO . "template.php");

include_once(ROOT . "_masInfo.php"); 
?>

<div class="container">
    <div class="text-center mb-4"><h5>Diferentes personas, distintos perfiles, grandes historias</h5></div>
    <div class="row">
        <div class="col-sm">
            <div class="ml-5">
                <h4>Rodrigo Silva</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Rodrigo Silva - Momentos de Renovacion.mp3" type="audio/mpeg">
                </audio> 
                <p><small>Empresario de gran &eacute;xito y amplia trayectoria, dueño de una gran empresa Colombiana con mas de 1.500 empleados "Papas Super Ricas"</small></p>
            </div>
        </div>
        <div class="col-sm">
            <div class="ml-5">
                <h4>Edison Tobon</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Edison Tobon - El problema es la falta de actitud.mp3" type="audio/mpeg">
                </audio> 
                <p><small>Joven de origen humilde, con escasas oportunidades que reciclaba con su madre para sobrevivir</small></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="ml-5">
                <h4>Jorge Franco</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Jorge Franco - Crea una red de profesionales.mp3" type="audio/mpeg">
                </audio> 
                <p><small>Profesional exitoso con especializaciones posgrados, desarrollando una muy pr&oacute;spera carrera, trabajando en multinacionales en Estados Unidos y Europa ocupando cargos gerenciales</small></p>
            </div>
        </div>
        <div class="col-sm">
            <div class="ml-5">
                <h4>Nelson Restrepo</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Nelson Restrepo - La vida como un emprendedor.mp3" type="audio/mpeg">
                </audio> 
                <p><small>No tuvo estudios universitarios. Trabajaba cargando bultos en la plaza de mercado</small></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="ml-5">
                <h4>Sara Vallejo</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Sara Vallejo - Nacimos para Triunfar.mp3" type="audio/mpeg">
                </audio> 
                <p><small>Deportista de alto rendimiento. Campeona mundial de patinaje para Colombia</small></p>
            </div>
        </div>
        <div class="col-sm">
            <div class="ml-5">
                <h4>Leonor Carvajal</h4>
                <audio controls>
                    <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/audios/Leonor Carvajal - Mi historia en el negocio.mp3" type="audio/mpeg">
                </audio> 
                <p><small>Vendedora ambulante y comerciante, se vi&oacute; en quiebra y sin jubilaci&oacute;n a su tercera edad</small></p>
            </div>
        </div>
    </div>
</div>

<?php include_once(ROOT . "datosContacto.php"); ?>