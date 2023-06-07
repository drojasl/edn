<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");
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
    <h4>Respondiendo tus preguntas</h4>
</header>
    <h1>Bienvenido!!!</h1>
    <?php include_once(ROOT . "datosContacto.php"); ?>
</body>

</html>