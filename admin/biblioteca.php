<?php
    include_once(dirname(__FILE__) . "/../config/dirConfig.php");
    include_once(ADMIN . "validarAccesoEmpresario.php");
?>

<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(ADMIN . "_header.php");
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>biblioteca.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>biblioteca.js"></script>
</head>

<body>
    <div id="flashMsn"></div>
    <div class="container">
        <header class="row">
            <div class="col-sm-12 col-md-6"><img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png"></div>
            <div class="col-sm-12 col-md-6"><?php include_once(ADMIN . "_logout.php"); ?></div>
        </header>
        <div class="row">
            <section class="col-sm-12"><?php include_once(ADMIN . "_mainMenu.php");; ?></section>
            <section class="col-sm-12 secContent">
                <?php 
                    $empresario = unserialize($_SESSION['EmpresarioLogueado']);
                    include_once(CLASSES . "Video.php");
                    $videos = Video::getAllVideos();
                    $videos_organizados = [];
                    if(!$videos){
                        return;
                    }
                    foreach($videos as $video){
                        $tipo = $video["tipo"];
                        $videos_organizados[$tipo][] = $video;
                    }
                ?>
                <h2 class="mb-3">Bienvenida</h2>
                <div class='gallery mt-2 mb-3'>
                    <?php 
                        foreach($videos_organizados['Contacto'] as $video) {
                            $remove = "Por Que Emprender ";
                            $video_id = substr($video['archivo'], strrpos($video['archivo'], '/') + 1);
                    ?>
                            <article class="card">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $video_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div>
                                    <div class="nombre"><?php echo substr($video['nombre'], strlen($remove)) ?></div>
                                    <div class="video-info">Target: <?php echo $video['objetivo'] ?></div>
                                    <div class="video-info mb-1">Edad: <?php echo $video['edad'] ?></div>
                                </div>
                            </article>
                    <?php
                        }
                    ?>
                </div>
                
                <h2 class="mt-4 mb-3">Planes</h2>
                <div class='gallery mt-2 mb-3'>
                    <?php 
                        foreach($videos_organizados['Plan'] as $video) {
                            $remove = "Plan de Negocios por ";
                            $video_id = substr($video['archivo'], strrpos($video['archivo'], '/') + 1);
                    ?>
                            <article class="card">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $video_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div>
                                    <div class="nombre"><?php echo substr($video['nombre'], strlen($remove)) ?></div>
                                    <div class="video-info">Target: <?php echo $video['objetivo'] ?></div>
                                    <div class="video-info mb-1">Edad: <?php echo $video['edad'] ?></div>
                                </div>
                            </article>
                    <?php
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
    </footer>
</body>

</html>
<script>
    selMenuActivo("biblioteca");
</script>