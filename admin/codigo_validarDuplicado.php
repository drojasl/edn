<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "Codigo.php");
include_once(CLASSES . "BD.php");

$codigo_acceso = BD::blockSQLInjection($_POST['codigo_acceso']);
$codigo = new Codigo(0);
if($codigo->validarDuplicado($codigo_acceso)){
    echo 1;
}
else{
    echo 0;
}
?>