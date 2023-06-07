<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();
$video_actual = getThisFileName();
include_once(VIDEO . $curso_folder . "/curso_config.php");

include_once(VIDEO . "template.php");

include_once(CLASSES . "Empresario.php");
$empresario = null;
if(isset($_SESSION['Empresario'])){
    $empresario = unserialize($_SESSION['Empresario']);
    $url_tienda = trim($empresario->mi_tienda_digital);
    if($url_tienda){
        $url_tienda = (strrpos($url_tienda, 'http') === false) ? 'https://' . $url_tienda : $url_tienda;
        echo '<a href="' . $url_tienda . '" target="_blank"><h5 class="text-center text-info">>> HAZ CLICK AQUI PARA IR A LA TIENDA <<</h5></a>';
    }
}
?>
<?php include_once(ROOT . "_masInfo.php"); ?>

<div class="container text-center">
    <iframe width="45%" height="315" src="https://www.youtube-nocookie.com/embed/7xPrX1ouSU4?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="45%" height="315" src="https://www.youtube-nocookie.com/embed/b1YzpAhSfYQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<?php include_once(ROOT . "datosContacto.php"); ?>