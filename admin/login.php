<?php
    @session_start();
    include_once(dirname(__FILE__) . "/../config/dirConfig.php");include_once(dirname(__FILE__) . "/../config/dirConfig.php");
    include_once(CLASSES . "BD.php");
    
    $error = "";
    $msn = (isset($_GET['msn'])) ? $_GET['msn'] : "";
    $return_to = "index";
    if(isset($_POST['cotitular'])){
        if($_POST['cotitular'] == 'on'){
            $_POST['codigo_amway'] = $_POST['codigo_amway'] . 'C';
        }
    }
    if(isset($_POST['return_to'])){
        $return_to = $_POST['return_to'];
    }
    if(isset($_POST['key'])){
        if(isset($_POST['codigo_amway'])){
            if(isset($_POST['password'])){
                include_once(CLASSES . "Empresario.php");
                $empresario = new Empresario();
                $codigo_amway = BD::blockSQLInjection($_POST['codigo_amway']);
                $empresario->inciarSession($codigo_amway, md5($_POST['password']));
                if($empresario->id){
                    $empresario->password = null;
                    $_SESSION['EmpresarioLogueado'] = serialize($empresario);
                    header("Location: $return_to");
                    return;
                }
                $error = "noMatch";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es" xml:lang="es">
<head>
<?php
    include_once(ADMIN . "_header.php");
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>login.css">
<script type="text/javascript" src="<?php echo JS_WEB ?>login.js"></script>
</head>

<body>
    <div id="flashMsn"></div>
    <div class="container">
        <header class="row">
            <div class="col-sm-12 col-md-6"><img src="<?php echo IMAGES_WEB ?>logo_edn_transparent.png"></div>
        </header>
        <div class="row">
            <section class="col-sm-12 secContent">
                <div class="wrapper">
                    <?php 
                        if($msn == 'passUpdated'){
                            echo "<div class='success'>Contrase&ntilde;a Actualizada</div><br>";
                        }
                    ?>
                    <form class="form-signin" method="POST" action="login.php">
                        <h2 class="form-signin-heading">Inicia sesi&oacute;n</h2>
                        
                        <div>
                            <img src="../images/codigo_acceso.png" class="imageIcon">
                            <input type="text" class="form-control" name="codigo_amway" placeholder="Codigo Amway" required="" autofocus="" />
                        </div>
                        <div>
                            <label class="checkbox ml-5">
                                <input type="checkbox" name="cotitular"><h6>Soy cotitular</h6>
                            </label>
                        </div>
                        <div>
                            <img src="../images/codigo_acceso3.png" class="imageIcon">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="" autofocus="" />
                        </div>
                        <input type='hidden' name='return_to' value='<?php echo $return_to ?>'>
                        <input type='hidden' name='key' value='true'>
                        
                        <button id="btnSubmitForm" class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                    </form>
                        <div class="dvRegistro"><a href="registro"><h4>¿No tienes cuenta?<br>registrate aqu&iacute;</h4></a></div>
                        <div class="dvRegistro"><a href="recuperar_password">Olvid&eacute; mi contrase&ntilde;a</a></div>
                    <?php 
                        if($error == 'noMatch'){
                            echo "<div class='error'>Datos de acceso inv&aacute;lidos</div>";
                        }
                    ?>
                </div>
            </section>
        </div>
        <footer class="row">
            
        </footer>
    </div>
</body>

</html>