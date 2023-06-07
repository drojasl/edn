<?php
include_once(dirname(__FILE__) . "/config/dirConfig.php");

//if(isset($_POST["acepto"]) && $_POST["acepto"] == "acepto"){
    include_once(CLASSES . "Prospecto.php");
    include_once(CLASSES . "BD.php");
    
    $prospecto = new Prospecto();
    BD::blockSQLInjectionForm($_POST);

    $_POST['nombre'] = ucwords(strtolower($_POST['nombre']));
    $_POST['pais'] = ucwords(strtolower($_POST['pais']));
    $_POST['ciudad'] = ucfirst(strtolower($_POST['ciudad']));
    $_POST['celular'] = str_replace(" ", "", $_POST['celular']);

    $prospecto->setDatos($_POST);

    if(!$prospecto->empresario_id){
        $codigoAccesoEmpresario = $_POST['codigo_acceso'];
        if($codigoAccesoEmpresario){
            include_once(CLASSES . "Empresario.php");
            $empresario = new Empresario();
            $acceso = $empresario->validarAcceso($codigoAccesoEmpresario);
            if($acceso){
                $_SESSION['Acceso'] = $codigoAccesoEmpresario;
                //$_SESSION['Acceso'] = $codigoAccesoEmpresario;
                $_SESSION['Empresario'] = serialize($empresario);
                $prospecto->empresario_id = $empresario->id;
            }
        }
    }
    if(!$prospecto->empresario_id){
        Header("Location: formulario?err=code");
    }

    if($prospecto->save()){
        $_SESSION['Prospecto'] = serialize($prospecto);
        Header("Location: invitacion");
    }
/*}
else{
    Header("Location: formulario?err=acepta");
}*/
//Header("Location: invitacion");
?>