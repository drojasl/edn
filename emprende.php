<?php
include_once(dirname(__FILE__) . "/config/dirConfig.php");
include_once(ROOT . "validarCodigoAcceso.php");
$curso_asociado = $_SESSION['cursoAsociado'];
?>

<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(ROOT . "_header.php");
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>video.css">
<script type="text/javascript" src="<?php echo JS_WEB ?>video.js"></script>
</head>

<body>
<div id="flashMsn"></div>
<header>
    <img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png">
</header>
<section id="wrapper">
	<div class="videoContainer">
        <video id="myVideo" controls autoplay preload="auto" poster="images/conferencia.jpg" width="100%" >
        <source src="<?php echo ROOT_WEBFOLDER ?>../videos-curso/<?php echo $curso_asociado ?>/intro.mp4" type="video/mp4" />
            <p>Tu navegador no soporta video</p>
		</video>
		<div class="caption">Bienvenido a La Escuela de Negocios</div>
		<div class="control">
			<div class="btmControl">
				<div class="btnPlay videoBtn" title="Play/Pause video"><span class="videoIcon-play"></span></div>
				<div class="videoProgress-bar">
					<div class="videoProgress">
						<span class="bufferBar"></span>
						<span class="timeBar"></span>
					</div>
				</div>
				<!--<div class="volume" title="Set volume">
					<span class="volumeBar"></span>
				</div>-->
				<div class="sound sound2 videoBtn" title="Mute/Unmute sound"><span class="videoIcon-sound"></span></div>
				<div class="btnFS videoBtn" title="Switch to full screen"><span class="videoIcon-fullscreen"></span></div>
			</div>
		</div>
	</div>
</section>
<section>
<?php include_once(ROOT . "gridActividadPrincipal.php") ?>
</section>
<?php include_once(ROOT . "datosContacto.php"); ?>
</body>

</html>