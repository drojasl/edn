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
<link rel="stylesheet" href="<?php echo CSS_WEB ?>click.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>click.js"></script>
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
                    include_once(CLASSES . "Click.php");
                    $click = new Click();
                    $click->getClickInfo($empresario->click_id);
                    $roles = explode(",", $empresario->rol);
                ?>
                <?php
                    if(in_array("click_update", $roles) || 1==1){
                ?>
                        <div>
                            <div class='row'>
                                <div class='p-1 text-center col-lg-3'>
                                    <img src="<?php echo '../uploads/click/' . $click->id . '.jpg' ?>" class="flyer"><br>
                                    <div class="small"><?php echo $click->fecha_evento ?></div>
                                </div>
                                <div class='p-1 text-left col-lg-9'>
                                    <form id="imgInvitacion" action="click_actualizar" method="POST" enctype="multipart/form-data">
                                        <b>Pr&oacute;ximo evento:</b>
                                        <input type="text" id="datepicker" name="fecha_evento" placeholder="Fecha" value="<?php echo $click->fecha_evento ?>">
                                        <input type="hidden" name="click_id" value="<?php echo $click->id ?>">
                                        <input type="file" name="imgFlyer" accept=".jpg,.jpeg,.png">
                                        <button id='crearCodigo' class='btnDisabled'>Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                <?php
                    }
                    else{
                ?>
                        <div class='p-1 text-center col-11'>
                            <img src="<?php echo '../uploads/click/' . $click->id . '.jpg' ?>" class="flyer"><br>
                            <div class="small"><?php echo $click->fecha_evento ?></div>
                        </div>
                <?php
                    }
                    if($click->id == 0){
                        echo "<div class='info'>No tienes click asignado.<br> Actualiza <a href='../admin/perfil'>tu perfil</a> y seleccionalo</div>";
                    }
                ?>
                <div class='d-none d-sm-block'>
                    <div class='row'>
                        <div class='p-1 text-center col-sm-3'><b>Click</b></div>
                        <div class='p-1 text-center col-sm-5'><b>Organizadores</b></div>
                        <div class='p-1 text-center col-sm-2'><b>Actualizado</b></div>
                    </div>
                </div>
                <div class='row'>
                    <div class='p-1 text-center col-sm-3'><?php echo $click->nombre ?></div>
                    <div class='p-1 text-center col-sm-5'><?php echo $click->organizadores ?></div>
                    <div class='p-1 text-center col-sm-2'><?php echo $click->updated_at ?></div>
                </div>
            </section>
        </div>
        <footer class="row">
            <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
        </footer>
    </div>
</body>

</html>