<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(ROOT . "_header.php");
    $curso_asociado = $_SESSION['cursoAsociado'];
    include_once(VIDEO . $curso_asociado . "/curso_config.php");
    $primer_video = key($curso_config['videos']);
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>button.css">
<link rel="stylesheet" href="<?php echo CSS_WEB ?>grid.css">
<script type="text/javascript" src="<?php echo  JS_WEB ?>grid.js"></script>
</head>

<body>
<section>
    <form id="formEmprende" method="POST" action="video/<?php echo $curso_asociado . "/" . $primer_video?>">
        <div class="parametros container row my-4 align-items-center field-datos">
            <div class="col-12 col-sm-6 col-lg-4 text-lg-right"><h3>Rango de edad:</h3></div>
            <div class="col-6 col-sm-6 col-lg-2 mt-2 text-center text-sm-left">
                <select class="form-control form-control-sm" name="edad">
                    <option value="">--Seleccione--</option>
                    <option value="18-30">18 - 30</option>
                    <option value="30-45">30 - 45</option>
                    <option value="45+">Mayor 45</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-2 text-lg-right"><h3>Genero:</h3></div>
            <div class="col-3 col-sm-2 col-lg-2 mt-sm-1 text-right text-lg-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="F" value="F">
                    <label class="form-check-label" for="F">F</label>
                </div>
            </div>
            <div class="col-3 col-sm-2 col-lg-2 mt-sm-1 text-right text-lg-left">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="M" value="M">
                    <label class="form-check-label" for="M">M</label>
                </div>
            </div>
        </div>
        <input type="hidden" id="actividad_principal" name="actividades">
    </form>
    <h1>¿Cuál es tu principal actividad económica?</h1>
    <div class="container grid">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="thumbnail" name="Empleado">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>empleado.jpg" alt="empleado" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">EMPLEADO</h4>
                        <p class="group inner list-group-item-text">Trabaja para otra persona o empresa, sin importar el tipo de contrato</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                               <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6">
                                <!--<a class="btn btn-success" href="#">Seleccionar</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="thumbnail" name="Independiente">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>autoempleado.jpg" alt="autoempleado" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">INDEPENDIENTE</h4>
                        <p class="group inner list-group-item-text">Trabaja para si mismo, formalmente en su propio negocio o profesionales que atienden a sus clientes</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="thumbnail" name="Desempleado">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>desempleado.jpg" alt="desempleado" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">Desempleado</h4>
                        <p class="group inner list-group-item-text">Actualmente en busca de una actividad económica</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="thumbnail" name="Otro">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>autoempleado2.jpg" alt="Otro" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">OTRO</h4>
                        <p class="group inner list-group-item-text">Cualquier otra actividad económica</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 d-none">
                <div class="thumbnail" name="Estudiante">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>estudiante.jpg" alt="estudiante" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">ESTUDIANTE</h4>
                        <p class="group inner list-group-item-text">Dedica gran parte de su tiempo en prepararse y formarse con nuevos conocimientos</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 d-none">
                <div class="thumbnail" name="Hogar">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>ama_de_casa.jpg" alt="ama_de_casa" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">ATENCIÓN DEL HOGAR</h4>
                        <p class="group inner list-group-item-text">Se dedican a cuidar de su hogar y demás labores domésticas</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 d-none">
                <div class="thumbnail" name="Informal">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>rebusque.jpg" alt="rebusque" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">NEGOCIO INFORMAL O REBUSQUE</h4>
                        <p class="group inner list-group-item-text">Vende productos, ofrece servicios o entretenimiento en la calle o espacios públicos</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 d-none">
                <div class="thumbnail" name="Inmigrante">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>inmigrante.jpg" alt="inmigrante" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">INMIGRANTE</h4>
                        <p class="group inner list-group-item-text">Extranjero en busca de oportunidades en otro país</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 d-none">
                <div class="thumbnail" name="Deportista">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>deportista.jpg" alt="deportista" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">DEPORTISTA</h4>
                        <p class="group inner list-group-item-text">Entrena y se prepara para competencias deportivas</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 d-none">
                <div class="thumbnail" name="Artista">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>artista.jpg" alt="artista" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">ARTISTA</h4>
                        <p class="group inner list-group-item-text">Se dedica a desarrollar sus talentos y pasiones</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 d-none">
                <div class="thumbnail" name="Jubilado">
                    <img class="group list-group-image" src="<?php echo IMAGES_WEB ?>jubilado.jpg" alt="jubilado" />
                    <div class="gridCaption">
                        <h4 class="group inner list-group-item-heading">JUBILADO</h4>
                        <p class="group inner list-group-item-text">Vive de la pensión que se ganó después de una vida de trabajo</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="lead"></p>
                            </div>
                            <div class="col-12 col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="margin-bottom: 6rem">
    <button id="js-trigger-overlay" type="button" class="btnDisabled" disabled="disabled">CONTINUAR</button>
</section>
</body>

</html>