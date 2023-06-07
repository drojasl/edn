<?php
include_once(dirname(__FILE__) . "/config/dirConfig.php");
include_once(ROOT . "validarCodigoAcceso.php");
include_once(CLASSES . "Empresario.php");
include_once(CLASSES . "Video.php");
$empresario = unserialize($_SESSION['Empresario']);
?>

<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(VIDEO . "_header.php");

    $linkExterno = false;
    if(isset($_COOKIE['linkExterno'])){
        $video_id = $linkExterno = $_COOKIE['linkExterno'];
        $video_speed = 1;
        $video_start = 0;
    }
    if(isset($_GET['ext'])){
        $video_id = $linkExterno = $_GET['ext'];
        $video_speed = 1;
        $video_start = 0;
        setcookie("linkExterno", $video_id, time() + COOKIE_LIFETIME, '/');
    }
    else{
        if(isset($_SESSION['videos']['seleccionados'])){
            $videos = unserialize($_SESSION['videos']['seleccionados']);
        }
        else if(isset($_COOKIE['videoLogic'])){
            $vid = isset($_COOKIE['Plan']) ? $_COOKIE['Plan'] : "";
            if($vid){
                $video = new Video();
                $video->seleccionarVideoBiblioteca_Id($vid);
                $videos[$video->tipo] = $video;
            }
        }
        else{
            header("Location: emprende");
            return;
        }
        if(!isset($videos)){
            header("Location: end");
        }
        if(array_key_exists('Plan', $videos)){
            $videoSeleccionado = (is_array($videos['Plan'])) ? $videos['Plan'][0] : $videos['Plan'];
        }
    }
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>video.css">
<link rel="stylesheet" href="<?php echo CSS_WEB ?>invitacion.css">
<script type="text/javascript" src="<?php echo JS_WEB ?>video.js"></script>
</head>

<body>
<div id="flashMsn"></div>
<header>
    <img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png">
</header>
<section>

    <div class="nextEvent">
        <?php
            include_once(CLASSES . "Click.php");
            $click = new Click();
            $click->getClickInfo($empresario->click_id);
            $fecha_actual = strtotime(date("Y-m-d"));
            $fecha_evento = strtotime($click->fecha_evento);
            if($fecha_actual <= $fecha_evento){
                echo "<h5>Fecha del evento: </h5><h5>$click->fecha_evento</h5>";
                echo "<h4>Favor confirmar asistencia al ";
                echo $empresario->celular;
                echo ($empresario->whatsapp) ? "<img class='imgWasape' src='images/wasape.png'>" : "";
                echo " Para la reserva del cupo</h4>";
                echo "<img src='uploads/click/".$empresario->click_id.".jpg'>";
            }
        ?>
    </div>

    <h5><?php echo ($linkExterno) ? "Presentaci&oacute;n Plan de Negocios" : $videoSeleccionado->nombre ?></h5>
    <div class="text-center d-none">
        <a target="_blank" href="https://laescueladenegocios.co/evento_calendario.php">
            <img class="imageIconMid" src="<?php echo IMAGES_WEB ?>google-calendar-logo.jpg">
            <br>
            Agendate para la siguiente presentaci&oacute;n en vivo
        </a>
    </div>
    <section id="wrapper">
        <?php
            $linkExterno = true;
            if($linkExterno){
                echo "<br>";
                $video_speed = 1;
                $video_start = 0;
                include_once(VIDEO . "youtube.php");
            }
            else{
        ?>
            <div class="videoContainer">
                <video id="myVideo" controls autoplay preload="auto" poster="<?php echo IMAGES_WEB ?>conferencia.jpg" width="100%" >
                <source src="<?php echo $videoSeleccionado->archivo ?>" type="video/mp4" />
                    <p>Tu navegador no soporta video</p>
                </video>
                <div class="caption">Plan de Negocios</div>
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
        <?php
            }
        ?>
    </section>
    <footer>
        <section class="buttonSec">
            <button id="btnNext" type="button" value="<?php echo VIDEO_WEB ?>seguimiento/">CONOCE MÁS</button>
        </section>
    </footer>
    <?php include_once(ROOT . "datosContacto.php"); ?>
</section>
</body>

</html>