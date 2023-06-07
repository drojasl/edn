<?php
@session_start();
include_once(dirname(__FILE__) . "/../config/dirConfig.php");

if(!isset($_SESSION['EmpresarioLogueado'])){
    return;
}
include_once(CLASSES . "Empresario.php");
$empresario = unserialize($_SESSION['EmpresarioLogueado']);
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>logout.css">
<link rel="stylesheet" href="<?php echo CSS_WEB ?>website.css">
<div class='logout-sec'>
    <span><a href="perfil"><?php echo $empresario->nombres . " " . $empresario->apellidos ?></a></span>
    <span><a href="ayuda">Ayuda</a></span>
    <span><a href="end">Salir</a></span>
</div>