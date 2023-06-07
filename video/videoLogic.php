<?php
@session_start();
include_once(dirname(__FILE__) . "/../config/dirConfig.php");

unset($_SESSION['videos']);
include_once(ROOT . "validarCodigoAcceso.php");
include_once(CLASSES . "Video.php");
include_once(CLASSES . "BD.php");

$videos = array();

$vids = (isset($_SESSION['codeVids']) && $_SESSION['codeVids']) ? explode("-", $_SESSION['codeVids']) : "";

$actividades = "";
if(isset($_POST) && !empty($_POST)){
    $edad = (isset($_POST['edad'])) ? BD::blockSQLInjection($_POST['edad']) : "";
    $genero = (isset($_POST['genero'])) ? BD::blockSQLInjection($_POST['genero']) : "";
    $actividades = (isset($_POST['actividades'])) ? explode(",", $_POST['actividades']) : [];
    unset($actividades[0]);
    BD::blockSQLInjectionForm($actividades);

    $_SESSION['datosProspecto']['edad'] = $edad;
    $_SESSION['datosProspecto']['genero'] = $genero;
    $_SESSION['datosProspecto']['actividades'] = $actividades;
}
else{
    if(isset($_SESSION['datosProspecto'])){
        $edad = $_SESSION['datosProspecto']['edad'];
        $genero = $_SESSION['datosProspecto']['genero'];
        $actividades = $_SESSION['datosProspecto']['actividades'];
    }
}

setcookie('videoLogic', 1, time() + COOKIE_LIFETIME, '/');

if($vids){
    BD::blockSQLInjectionForm($vids);
    foreach($vids as $vid){
        $video = new Video();
        $video->seleccionarVideoBiblioteca_Id($vid);
        $videos[$video->tipo] = $video;
        setcookie($video->tipo, $video->id, time() + COOKIE_LIFETIME, '/');
    }
    //$sel = (isset($_GET['sel'])) ? $_GET['sel'] : 0;
    //$video = (isset($videos[$sel])) ? $videos[$sel] : $videos[0];
}
else{
    if($actividades){
        $parametros = array();
        if($edad){
            $parametros["edad"] = $edad;
        }
        if($genero){
            $parametros["genero"] = $genero;
        }
        $tipoVideos = ['Contacto', 'Plan'];
        foreach($tipoVideos as $tipo){
            $parametros["tipo"] = $tipo;
            foreach($actividades as $actividad){
                $video = new Video();
                $video->seleccionarVideoBiblioteca($actividad, $parametros);
                $videos[$tipo] = $video;
                setcookie($video->tipo, $video->id, time() + COOKIE_LIFETIME, '/');
            }
        }
    }
    else{
        if(isset($_SESSION['videos']['seleccionados'])){
            $videos = unserialize($_SESSION['videos']['seleccionados']);
        }
    }
    //$video = $videos[0];
}
$_SESSION['videos']['seleccionados'] = serialize($videos);
?>