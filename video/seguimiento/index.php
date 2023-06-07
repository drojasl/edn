<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");
//include_once(ROOT . "validarCodigoAcceso.php");

$curso_asociado = getThisFolderName();
include_once(VIDEO . $curso_asociado . "/curso_config.php");
$link_videos = array_keys($curso_config['videos']);
?>
<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?php include_once(ROOT . "_header.php"); ?>

    <link rel="stylesheet" href="<?php echo CSS_WEB ?>hexagono.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,300,200,100,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="<?php echo JS_WEB ?>seguimiento.js"></script>
</head>

<body>
<header>
    <img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png">
    <div class="container">
        <h4>Respondiendo tus preguntas</h4>
        <h5 class="text-secondary">Solucionando tus inquietudes</h5>
        <h6 class="text-muted">Aclarando tus dudas</h6>
    </div>
</header>
    <ul id="categories" class="clr">
    <li></li>
    <li class="link" href="<?php echo $video_name = $link_videos[0] ?>">
        <div>
            <img src="https://farm5.staticflickr.com/4144/5053682635_b348b24698.jpg" alt=""/>
            <h1><?php echo $curso_config['videos'][$video_name] ?></h1>
            <p>Expande la visión y conoce los primeros pasos</p>
        </div>
    </li>
    <li></li>
    <li class="link" href="<?php echo $video_name = $link_videos[1] ?>">
        <div>
            <img src="https://farm8.staticflickr.com/7187/6895047173_d4b1a0d798.jpg" alt=""/>
            <h1><?php echo $curso_config['videos'][$video_name] ?></h1>
            <p>Preguntas frecuentes y respuestas</p>
        </div>
    </li>
    <li></li>
    <li></li>
    <li class="link" href="<?php echo $video_name = $link_videos[2] ?>">
        <div>
            <img src="https://farm7.staticflickr.com/6139/5986939269_10721b8017.jpg" alt=""/>
            <h1><?php echo $curso_config['videos'][$video_name] ?></h1>
            <p>Una mirada hacia nuestras líneas de productos</p>
        </div>
    </li>
    <li></li>
    <li></li>
    <li class="link" href="<?php echo $video_name = $link_videos[3] ?>">
        <div>
            <img src="https://farm7.staticflickr.com/6083/6055581292_d94c2d90e3.jpg" alt=""/>
            <h1><?php echo $curso_config['videos'][$video_name] ?></h1>
            <p>Los sencillos pasos y acciones que tomamos</p>
        </div>
    </li>
    <li></li>
    <li></li>
    <li></li>
    <li class="link" href="<?php echo $video_name = $link_videos[4] ?>">
        <div>
            <img src="https://farm4.staticflickr.com/3766/12953056854_b8cdf14f21.jpg" alt=""/>
            <h1><?php echo $curso_config['videos'][$video_name] ?></h1>
            <p>Los números del negocio</p>
        </div>
    </li>
    <li class="link" href="<?php echo $video_name = $link_videos[5] ?>">
        <div>
            <img src="https://farm5.staticflickr.com/4144/5053682635_b348b24698.jpg" alt=""/>
            <h1><?php echo $curso_config['videos'][$video_name] ?></h1>
            <p>Inicia tu propio negocio</p>
        </div>
    </li>
    </ul>
    <footer>
        <section class="buttonSec d-none" style="text-align:right;">
            <button id="btnNext" class="bg-secondary" type="button" disabled="disabled" value="<?php echo VIDEO_WEB ?>bienvenida/">SIGUIENTE</button>
            <br><span class="mr-4"><small><b>Para continuar es necesario realizar el <a href="autoregistro"><u>registro en Amway</a></b></small></span>
            <div id="dialog-form" title="Ingresa tu c&oacute;digo">
                <h3>Escribe tu c&oacute;digo de Amway</h3>
                <br>
                <input id="amway_code" type="text" placeholder="Ingresa tu código">
                <br>
                <br>
                <p>Para continuar es necesario realizar el <a href="autoregistro"><u>registro en Amway</u></a><br>
                <span id="code_message" style="color:red; display:none">El c&oacute;digo ingresado no es v&aacute;lido</span>
                </p>
            </div>
        </section>
    </footer>
    <?php include_once(ROOT . "datosContacto.php"); ?>
</body>

</html>