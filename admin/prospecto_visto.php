<?php
@session_start();
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "BD.php");

$id = BD::blockSQLInjection($_POST['id']);
if($id){
    include_once(CLASSES . "Empresario.php");
    include_once(CLASSES . "Prospecto.php");
    $empresario = unserialize($_SESSION['EmpresarioLogueado']);
    
    $prospecto = new Prospecto();
    if($prospecto->marcarVisto($id)){
        echo 1;
        die;
    }
}
echo 0;
?>