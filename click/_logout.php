<?php
@session_start();
if(!isset($_SESSION['EmpresarioLogueado'])){
    return;
}
include_once(CLASSES . "Empresario.php");
$empresario = unserialize($_SESSION['EmpresarioLogueado']);
?>
<link rel="stylesheet" href="<?php echo CSS_WEB ?>logout.css">
<link rel="stylesheet" href="<?php echo CSS_WEB ?>website.css">
<div class='logout-sec'>
    <span><a href="../admin/perfil"><?php echo $empresario->nombres . " " . $empresario->apellidos ?></a></span>
    <span><a href="../admin/ayuda">Ayuda</a></span>
    <span><a href="../admin/end">Salir</a></span>
</div>