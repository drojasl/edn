<?php
@session_start();
include_once(dirname(__FILE__) . "/../config/dirConfig.php");

$return_to = $_SERVER['PHP_SELF'];
$empresario = null;
if(isset($_SESSION['EmpresarioLogueado'])){
    include_once(CLASSES . "Empresario.php");
    $empresario = unserialize($_SESSION['EmpresarioLogueado']);
}
else{
    include_once(ADMIN . "login.php");
    die;
}
?>