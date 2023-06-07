<?php
@session_start();
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "BD.php");
include_once(CLASSES . "Empresario.php");

if($_POST['password'] != $_POST['repassword']){
    header("Location: registro?err=noMatch");
    return;
}
$_POST['password'] = md5($_POST['password']);
$_POST['celular'] = str_replace(" ", "", $_POST['celular']);
$_POST['nombres'] = ucwords(strtolower($_POST['nombres']));
$_POST['apellidos'] = ucwords(strtolower($_POST['apellidos']));

$empresario = new Empresario();

BD::blockSQLInjectionForm($_POST);
if(isset($_POST['cotitular']) && $_POST['cotitular'] == 'on'){
    $_POST['codigo_amway'] = $_POST['codigo_amway'] . 'C';
}

if($empresario->validarDuplicado($_POST['codigo_amway'])){
    header("Location: registro?err=dupl");
    return;
}
$empresario->setDatos($_POST);
$saved = $empresario->save();
if($saved){
    $empresario->password = null;
    $_SESSION['EmpresarioLogueado'] = serialize($empresario);
    include_once(CLASSES . "Codigo.php");
    $codigo_acceso = new Codigo($empresario->id);
    $codigo_acceso->generarCodigo($empresario->nombres, $empresario->apellidos, $empresario->codigo_amway);
    $saved = $codigo_acceso->save();
    header("Location: index");
}
debug("registrarEmpresario::save", $saved, 1);
?>