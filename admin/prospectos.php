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
<link rel="stylesheet" href="<?php echo CSS_WEB ?>prospectos.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>prospectos.js"></script>
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
                <div class='container d-none d-lg-block'>
                    <div class='row'>
                        <div class='p-1 text-center col-lg-2'><b>Nombre</b></div>
                        <div class='p-1 text-center col-lg-2'><b>Correo</b></div>
                        <div class='p-1 text-center col-lg-2'><b>Celular</b></div>
                        <div class='p-1 text-center col-lg-2'><b>Fecha</b></div>
                        <div class='p-1 text-center col-lg-1'><b>C&oacute;digo</b></div>
                        <div class='p-1 text-center col-lg-1'><b>Pais</b></div>
                        <div class='p-1 text-center col-lg-1'><b>Ciudad</b></div>
                        <div class='p-1 text-center col-lg-1'>&nbsp;</div>
                    </div>
                </div>
                <?php
                
                    $empresario = unserialize($_SESSION['EmpresarioLogueado']);
                    include_once(CLASSES . "Prospecto.php");
                    
                    $allProspectos = $empresario->getAllProspectos();
                    if(!count($allProspectos)){
                        echo "<h6>Aún no tiene prospectos registrados</h6>";
                    }
                    $cont = 0;
                    echo "<div class=''>";
                    foreach($allProspectos as $prospecto){
                        $class = ($cont % 2 == 0) ? 'bg-light' : '';
                        $visto = "";
                        $unviewed = "";
                        if(!$prospecto->visto){
                            $visto = "<a href='#' cod='$prospecto->id' class='btnViewed'><img src='../images/viewed.png' class='viewed-icon' title='Marcar como visto' alt='Marcar como visto'></a>";
                            $unviewed = 'unviewed';
                        }
                        echo "<div class='row p-1 mb-2 row-prospect $class $unviewed'>
                            <div class='align-middle col-sm-12 col-md-4 col-lg-2 text-center text-md-left text-capitalize'>$prospecto->nombre</div>
                            <div class='px-1 align-middle col-sm-6  col-md-4 col-lg-2 text-left text-lowercase small'>$prospecto->correo</div>
                            <div class='px-1 align-middle col-sm-6  col-md-4 col-lg-2 text-left text-lg-center'><a href='https://wa.me/$prospecto->celular' target='_blank'>$prospecto->celular</a></div>
                            <div class='px-1 align-middle col-sm-6  col-md-4 col-lg-2 text-left small'>$prospecto->fecha_ingreso</div>
                            <div class='px-1 align-middle col-sm-6  col-md-2 col-lg-1 text-left text-lg-center text-uppercase small'>$prospecto->codigo_acceso</div>
                            <div class='px-1 align-middle col-sm-6  col-md-2 col-lg-1 text-left text-capitalize small'>$prospecto->pais</div>
                            <div class='px-1 align-middle col-sm-6  col-md-2 col-lg-1 text-left text-capitalize'>$prospecto->ciudad</div>
                            <div class='px-1 align-middle col-sm-12 col-md-2 col-lg-1 text-right'>$visto</div>
                        </div>
                        <hr class='d-lg-none'>";
                        $cont++;
                    }
                    echo "</div>";
                ?>
            </section>
        </div>
    </div>
    <footer>
        <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
    </footer>
</body>

</html>
<script>
    selMenuActivo("prospectos");
</script>