<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");
include_once(CLASSES . "BD.php");
include_once(CLASSES . "Empresario.php");

$codigo_amway = BD::blockSQLInjection($_POST['codigo_amway']);
$email = BD::blockSQLInjection($_POST['email']);
$celular = BD::blockSQLInjection($_POST['celular']);
$empresario = new Empresario();

if(!$empresario->validateEmpresarioData($codigo_amway, $email, $celular)) {
    header("Location: recuperar_password?err=noMatch");
    return;
}

if($_POST['password'] != $_POST['repassword']){
    header("Location: registro?err=noMatch");
    return;
}
$_POST['password'] = md5($_POST['password']);
$empresario->getFromCodigoAmway($_POST['codigo_amway']);
$empresario->setDatos($_POST);
$empresario->update();
header("Location: index?msn=passUpdated");
?>