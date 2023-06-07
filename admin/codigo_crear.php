<?php
@session_start();
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "BD.php");

$codigo_acceso = BD::blockSQLInjection($_POST['codigo_acceso']);
$sel_buscar_curso = BD::blockSQLInjection($_POST['sel_buscar_curso']);
$videos_default = BD::blockSQLInjection($_POST['videos_default']);

if($codigo_acceso){
    include_once(CLASSES . "Empresario.php");
    include_once(CLASSES . "Codigo.php");
    $empresario = unserialize($_SESSION['EmpresarioLogueado']);
    
    $codigo = new Codigo($empresario->id);
    $codigo->codigo_acceso = $codigo_acceso;
    $codigo->curso = $sel_buscar_curso;
    $codigo->videos_default = $videos_default;
    
    if(!$codigo->existeEnDB($codigo_acceso)){
        $codigo->save();
    }
    else{
        $codigo->curso = $sel_buscar_curso;
        $codigo->videos_default = $videos_default;
        $codigo->restart();
    }
}
header("Location: codigos");
?>