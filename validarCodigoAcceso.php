<?php
@session_start();
include_once(dirname(__FILE__) . "/config/dirConfig.php");
include_once(CLASSES . "BD.php");

$return_to = $_SERVER['REQUEST_URI'];
$empresario = null;

if(isset($_SESSION['Empresario'])){
    include_once(CLASSES . "Empresario.php");
    $empresario = unserialize($_SESSION['Empresario']);
    $codigo_acceso = $_SESSION['Acceso'];
}
else{
    $codigo_acceso = null;
    if(isset($_GET['cod'])){
        $codigo_acceso = BD::blockSQLInjection($_GET['cod']);
    }
    elseif(isset($_COOKIE['Acceso'])){
        $codigo_acceso = $_COOKIE['Acceso'];
    }
    if($codigo_acceso){
        include_once(ROOT . "validarCodigoAccesoBD.php");
        
        if(validarDesdeBD($codigo_acceso, $return_to)){
            return;
        }
    }
    include_once(ROOT . "formCodigoAcceso.php");
    die;
}
?>