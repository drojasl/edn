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
</head>

<body>
    <div id="flashMsn"></div>
    <div class="container">
        <header class="row">
            <div class="col-sm-12 col-md-6"><img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png"></div>
            <div class="col-sm-12 col-md-6"><?php include_once(ADMIN . "_logout.php"); ?></div>
        </header>
        <div class="row">
            <section class="col-sm-12"><?php include_once(ADMIN . "_mainMenu.php"); ?></section>
            <section class="col-sm-12 secContent">
                <?php 
                    $empresario = unserialize($_SESSION['EmpresarioLogueado']);
                    include_once(CLASSES . "Prospecto.php");
                    include_once(CLASSES . "Codigo.php");
                    include_once(CLASSES . "Estadisticas.php");
                    
                    $nroProspectosNuevos = Prospecto::nroProspectosNuevos($empresario->id);
                    
                    $codigo_acceso = $empresario->getCodigoBase();
                    $urlAcceso = "http://" . $_SERVER['HTTP_HOST'] . ROOT_WEBFOLDER . "emprende?cod=$codigo_acceso->codigo_acceso";
                ?>
                <div class="m-3">
                    <h5>Tienes <a href="prospectos"><b><?php echo $nroProspectosNuevos['conteo'] ?></b></a> nuevos prospectos</h5>
                </div>
                <div class="m-3">
                    Tú c&oacute;digo base para brindar acceso al video curso es: <b><?php echo $codigo_acceso->codigo_acceso; ?></b><br>
                    Use la siguiente URL para compartir el acceso: <a href="<?php echo $urlAcceso; ?>"><?php echo $urlAcceso; ?></a>
                </div>
                <?php include_once(ADMIN . "_accordion.php"); ?>
            </section>
        </div>
    </div>
    <footer>
        <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
    </footer>
</body>

</html>
<script>
    selMenuActivo("index");
</script>