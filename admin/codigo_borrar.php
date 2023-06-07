<?php
@session_start();
include_once(dirname(__FILE__) . "/../config/dirConfig.php");

include_once(CLASSES . "BD.php");

$id = BD::blockSQLInjection($_POST['id']);
if($id){
    include_once(CLASSES . "Empresario.php");
    include_once(CLASSES . "Codigo.php");
    $empresario = unserialize($_SESSION['EmpresarioLogueado']);
    
    $codigo = new Codigo($empresario->id);
    $codigo->getCodigoInfo($id);
    if($codigo->borrar()){
        echo 1;
        die;
    }
}
echo 0;
?>