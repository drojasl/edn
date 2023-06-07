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
<link rel="stylesheet" href="<?php echo CSS_WEB ?>button.css">
<link rel="stylesheet" href="<?php echo CSS_WEB ?>codigos.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>codigos.js"></script>
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
                    include_once(CLASSES . "Codigo.php");
                    include_once(CLASSES . "Video.php");
                    $codigoBase = $empresario->getCodigoBase();
                    $videos = Video::getAllVideos();
                    $videos_organizados = [];
                    foreach($videos as $video){
                        $tipo = $video["tipo"];
                        $videos_organizados[$tipo][] = $video;
                    }

                    $video_cursos = [
                        'economia-colaborativa' => 'Economía Colaborativa',
                        'crisis2020'            => 'Crisis 2020',
                        //'finanzas-personales'   => 'Finanzas Personales',
                        //'propiedad-raiz'        => 'Inversiones en Propiedad Raiz',
                    ];
                ?>
                <div class='ml-5 text-center'>
                    <form id="crearNuevoCodigo" action="codigo_crear" method="POST">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <!-- AGREGAR NUEVOS CURSOS ACA -->
                                    Curso:<br>
                                    <select id="sel_curso" class="m-1 w-75" name="sel_buscar_curso">
                                        <?php
                                            foreach($video_cursos as $key=>$curso){
                                                echo "<option value='$key'>$curso</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    Bienvenida:<br>
                                    <select class="m-1 w-75" id="selBuscarVideo_contacto">
                                        <option value=''>-Seleccione-</option>
                                        <?php
                                            $objetivoAnt = $videos[0]['objetivo'];
                                            echo "<optgroup label='$objetivoAnt'>";
                                            foreach($videos_organizados['Contacto'] as $video){
                                                $objetivo = $video['objetivo'];
                                                if($objetivo != $objetivoAnt){
                                                    echo "</optgroup>";
                                                    echo "<optgroup label='$objetivo'>";
                                                    $objetivoAnt = $objetivo;
                                                }
                                                $nombre = utf8_encode($video['nombre']);
                                                echo "<option value='".$video['id']."' class='optVideo'>".$nombre."</option>";
                                            }
                                            echo "</optgroup>";
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    Plan:<br>
                                    <select class="m-1 w-75" id="selBuscarVideo_plan">
                                        <option value=''>-Seleccione-</option>
                                        <?php
                                            $objetivoAnt = $videos[0]['objetivo'];
                                            echo "<optgroup label='$objetivoAnt'>";
                                            foreach($videos_organizados['Plan'] as $video){
                                                $objetivo = $video['objetivo'];
                                                if($objetivo != $objetivoAnt){
                                                    echo "</optgroup>";
                                                    echo "<optgroup label='$objetivo'>";
                                                    $objetivoAnt = $objetivo;
                                                }
                                                $nombre = utf8_encode($video['nombre']);
                                                echo "<option value='".$video['id']."' class='optVideo'>".$nombre."</option>";
                                            }
                                            echo "</optgroup>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <b>Crear nuevo:</b>
                        <img src="../images/question.png" class="questionHelp" title="Puedes crear un c&oacute;digo nuevo y seleccionar el curso e inclusive los videos de inicio y plan de negocios que se mostrar&aacute;n a quienes ingresen con este c&oacute;digo">
                        <input type="text" id="txtCrearNuevo" maxlength="3">

                        <button id='crearCodigo' class='btnDisabled'>Crear</button>
                        <span id='codBase' cod='<?php echo $codigoBase->codigo_acceso ?>'><?php echo $codigoBase->codigo_acceso ?>??</span>
                        <input type="hidden" id="codigo_acceso" name="codigo_acceso">
                        <input type="hidden" id="videos_default" name="videos_default">

                    </form>
                    <hr>
                </div>
                <div class='d-none d-lg-block'>
                    <div class='row'>
                        <div class='p-1 text-center col-lg-2'><b>C&oacute;digo</b></div>
                        <div class='p-1 text-center col-lg-3'><b>URL</b></div>
                        <div class='p-1 text-center col-lg-1'><b>Fecha</b></div>
                        <div class='p-1 text-center col-lg-1'><b>Visitas</b></div>
                        <div class='p-1 text-center col-lg-3'><b>Videos asociados</b></div>
                        <div class='p-1 text-center col-lg-1'><b>Activo</b></div>
                        <div class='p-1 text-center col-lg-1'>&nbsp;</div>
                    </div>
                </div>
                <?php
                    $allCodes = $empresario->getAllCodes();
                    $cont = 0;

                    echo "<div class=''>";
                    foreach($allCodes as $codigo){
                        $class = ($cont % 2 == 0) ? 'bg-light' : '';
                        $urlAcceso = "http://" . $_SERVER['HTTP_HOST'] . ROOT_WEBFOLDER . "?cod=$codigo->codigo_acceso";
                        $activo = ($codigo->activo) ? 'Si' : 'No';
                        $btnBorrar = ($codigoBase->codigo_acceso == $codigo->codigo_acceso) ? "" : "<a href='#' cod='$codigo->id' class='btnDelete'><img src='../images/borrar.png' class='del-icon' title='Borrar' alt='Borrar'></a>";

                        $videos_default = ($codigo->videos_default) ? explode('-', $codigo->videos_default) : [];
                        $obj_videos_default = [];

                        if(!empty($videos_default)){
                            foreach($videos_default as $vid){
                                foreach($videos as $key=>$obj_video){
                                    if($obj_video['id'] == $vid){
                                        $tipo = $videos[$key]['tipo'];
                                        $obj_videos_default[$tipo] = $obj_video;
                                    }
                                }
                            }
                        }

                        $videos_seleccionados = ($codigo->curso && array_key_exists($codigo->curso, $video_cursos)) ? "* Curso: " . $video_cursos[$codigo->curso] : "";
                        foreach($obj_videos_default as $key=>$obj_video){
                            $videos_seleccionados .= "<br>* " . $key . ": " . substr($obj_video['nombre'], strpos($obj_video['nombre'], " por "));
                        }

                        echo "<div class='row mb-2 row-code $class'>
                            <div class='px-1 align-middle col-12 col-lg-2 text-center text-md-left text-uppercase'>$codigo->codigo_acceso</div>
                            <div class='px-1 align-middle col-12 col-lg-3 text-sm-left small'><span class='small font-italic d-lg-none'>Url: </span>$urlAcceso</div>
                            <div class='px-1 align-middle col-12 col-lg-1 text-left text-lg-center small'><span class='small font-italic d-lg-none'>Fecha: </span>$codigo->fecha_activo</div>
                            <div class='px-1 align-middle col-12 col-lg-1 text-left text-lg-center'><span class='small font-italic d-lg-none'>Visitas: </span>$codigo->visitas</div>
                            <div class='px-1 align-middle col-12 col-lg-3 text-left text-lg-center small'><span class='small font-italic d-lg-none'><b>Videos asociados:</b> <br></span>$videos_seleccionados</div>
                            <div class='px-1 align-middle col-12 col-lg-1 text-left text-lg-center small'><span class='small font-italic d-lg-none'>Activo: </span>$activo</div>
                            <div class='px-1 align-middle col-12 col-lg-1 text-right'>$btnBorrar</div>
                        </div>
                        <hr class='d-lg-none'>";
                        $cont++;
                    }
                    echo "</div>";
                ?>
            </section>
        </div>
    </div>
    <footer class="row">
        <div class="col-sm-12 d-none d-sm-block"><?php include_once(ADMIN . "_footer.php") ?></div>
    </footer>
</body>

</html>
<script>
    selMenuActivo("codigos");
</script>