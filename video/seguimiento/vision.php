<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();
$video_actual = getThisFileName();
include_once(VIDEO . $curso_folder . "/curso_config.php");

include_once(VIDEO . "template.php");
?>
<?php include_once(ROOT . "_masInfo.php"); ?>

<div class="container text-center">
    <iframe width="45%" height="315" src="https://www.youtube-nocookie.com/embed/o_y7pHB_uI8?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="45%" height="315" src="https://www.youtube-nocookie.com/embed/ZRCqGXPiRUw?controls=0&amp;start=471" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<?php include_once(ROOT . "datosContacto.php"); ?>