<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<title></title>
<?php
    include_once(VIDEO . "videoLogic.php");
    include_once(ROOT . "validarCodigoAcceso.php");
    include_once(CLASSES . "Prospecto.php");
    include_once(VIDEO . "_header.php");

    include_once(CLASSES . "Estadisticas.php");
    $objProspecto = array_key_exists('Prospecto', $_SESSION) ? unserialize($_SESSION['Prospecto']) : null;
    Estadisticas::controlarAccesoVideo($curso_config['etapa'], $curso_folder, $video_actual, ($objProspecto) ? $objProspecto->id : null);

    // Calcular la ruta del video
    $ruta_video = ROOT_WEBFOLDER . "../videos-curso/" . $curso_folder . "/" . $video_actual . ".mp4";
    $videos_seleccionados = unserialize($_SESSION['videos']['seleccionados']);

    // Si la ruta del video esta marcada como URL desde el curso_config
    if(isset($curso_config['rutas'][$video_actual]['URL'])){
        $url = $curso_config['rutas'][$video_actual]['URL'];
        $ruta_video = $url;
    }
    // Si la ruta del video esta marcada para ser reemplazada con el array de $videos_seleccionados
    if(isset($curso_config['rutas'][$video_actual]['REPLACE'])){
        $replace = $curso_config['rutas'][$video_actual]['REPLACE'];
        if(array_key_exists($replace, $videos_seleccionados)){
            $archivo_video = $videos_seleccionados[$replace]->archivo;
            $ruta_video = ROOT_WEBFOLDER . "../videos-curso/" . $curso_folder . "/" . $archivo_video;
    
            // Si es una URL
            if(strpos($archivo_video, 'http') === 0){
                $ruta_video = $archivo_video;
            }
        }
    }
?>
</head>

<body>
<div id="flashMsn"></div>
<header>
    <img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png">
</header>

<?php include_once(VIDEO . "progressbar.php"); ?>

<section id="wrapper">
    <?php
    $archivo_video_DB = "";
    if(isset($curso_config['rutas'][$video_actual]['DB_YOUTUBE'])){
        $replace = $curso_config['rutas'][$video_actual]['DB_YOUTUBE'];
        if(array_key_exists($replace, $videos_seleccionados)){
            $archivo_video_DB = $videos_seleccionados[$replace]->archivo;
        }
    }
    $titulo = $curso_config['videos'][$video_actual];
    if(isset($curso_config['rutas'][$video_actual]['YOUTUBE']) || isset($curso_config['rutas'][$video_actual]['DB_YOUTUBE'])){
        $ruta_video = ($archivo_video_DB) ? $archivo_video_DB : $curso_config['rutas'][$video_actual]['YOUTUBE'];
        $video_id = substr($ruta_video, strrpos($ruta_video, '/') + 1);
        $video_speed = isset($curso_config['rutas'][$video_actual]['SPEED']) ? $curso_config['rutas'][$video_actual]['SPEED'] : 1;
        $video_start = isset($curso_config['rutas'][$video_actual]['START']) ? $curso_config['rutas'][$video_actual]['START'] : 0;
        echo "<h3 class='text-center'><span class='video-titulo'>" . $titulo . "</span></h3>";
        include_once(VIDEO . "youtube.php");
    }
    else{
    ?>
        <h3 class="text-center"><span class="video-titulo"><?php echo $titulo ?></span></h3>
        <div class="videoContainer">
            <video id="myVideo" controls autoplay preload="auto" poster="<?php echo IMAGES_WEB ?>conferencia.jpg" width="100%" >
            <source src="<?php echo $ruta_video ?>" type="video/mp4" />
                <p>Tu navegador no soporta video</p>
            </video>
            <div class="caption"><?php echo $curso_config['videos'][$video_actual] ?></div>
            <div class="control">
                <div class="btmControl">
                    <div class="btnPlay videoBtn" title="Play/Pause video"><span class="videoIcon-play"></span></div>
                    <div class="videoProgress-bar">
                        <div class="videoProgress">
                            <span class="bufferBar"></span>
                            <span class="timeBar"></span>
                        </div>
                    </div>
                    <div class="volume" title="Set volume">
                        <span class="volumeBar"></span>
                    </div>
                    <div class="sound sound2 videoBtn" title="Mute/Unmute sound"><span class="videoIcon-sound"></span></div>
                    <div class="btnFS videoBtn" title="Switch to full screen"><span class="videoIcon-fullscreen"></span></div>
                </div>
            </div>
        </div>
        <script>
            var vid = document.getElementById("myVideo");
            vid.playbackRate = 1.2;
        </script>
    <?php
    }
    ?>
</section>
<?php include_once(VIDEO . "/footer_btns.php"); ?>