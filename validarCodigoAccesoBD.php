<?php
@session_start();
include_once(dirname(__FILE__) . "/config/dirConfig.php");
include_once(CLASSES . "BD.php");

if(isset($_POST['codigo_acceso'])){
    $return_to = isset($_POST['return_to']) ? $_POST['return_to'] : '';
    $return_to = str_replace('.php', '', $return_to);
    $codigoAccesoEmpresario = BD::blockSQLInjection($_POST['codigo_acceso']);

    if($codigoAccesoEmpresario){
        if(validarDesdeBD($codigoAccesoEmpresario, $return_to)){
            return;
        }
    }
    if($return_to){
        header("Location: $return_to"."?err=code");
    }
}

function validarDesdeBD($codigoAccesoEmpresario, $return_to){
    include_once(CLASSES . "Empresario.php");
    $empresario = new Empresario();
    $acceso = $empresario->validarAcceso($codigoAccesoEmpresario);

    if($acceso){
        include_once(CLASSES . "Codigo.php");
        $codigo = new Codigo($empresario->id);
        $codigo->getCodigoAccesoInfo($codigoAccesoEmpresario);

        if( !( isset($_SESSION['Acceso']) || isset($_COOKIE['Acceso']) ) ){
            $codigo->registrarVisita();
        }

        setcookie("Acceso", $codigoAccesoEmpresario, time() + COOKIE_LIFETIME, '/');
        $_SESSION['Acceso'] = $codigoAccesoEmpresario;
        
        $_SESSION['Empresario'] = serialize($empresario);
        $_SESSION['cursoAsociado'] = ($codigo->curso) ? $codigo->curso : CURSO_DEFAULT;
        $_SESSION['codeVids'] = $codigo->videos_default;

        if($return_to){
            header("Location: $return_to");
        }
        else{
            include_once(ROOT . "datosContacto.php");
        }
        return true;
    }
    return false;
}
?>