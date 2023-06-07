<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");

include_once(ADMIN . "validarAccesoEmpresario.php");

if(isset($_POST['changePass'])){
    if($_POST['password'] != $_POST['repassword']){
        header("Location: registro?err=noMatch");
        return;
    }
    $_POST['password'] = md5($_POST['password']);
}
$_POST['celular'] = str_replace(" ", "", $_POST['celular']);
$_POST['nombres'] = ucwords(strtolower($_POST['nombres']));
$_POST['apellidos'] = ucwords(strtolower($_POST['apellidos']));

$empresario = new Empresario();
$empresario->setDatos($_POST);
$empresario->update();
$empresario->password = null;
$_SESSION['EmpresarioLogueado'] = serialize($empresario);
header("Location: perfil?msn=ok");
?>