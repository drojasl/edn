<?php
@session_start();

function ver($var, $die=0, $varDump=0){
    echo "<pre>";
        if($varDump){
            var_dump($var);
        }
        else{
            print_r($var);
        }
    echo "</pre>";
    echo "<hr>";
    if($die){
        die;
    }
}
function debug($msn, $var, $varDump=0){
    if(isset($_SESSION['activeDebug']) && $_SESSION['activeDebug']){
        echo $msn."<br>";
        $die = 0;
        if(isset($_SESSION['dieIn']) && $_SESSION['dieIn']){
            if($msn == $_SESSION['dieIn']){
                $die = 1;
            }
        }
        if(isset($_SESSION['onlyIn']) && $_SESSION['onlyIn']){
            if($msn == $_SESSION['onlyIn']){
                ver($var, $die, $varDump);
            }
        }
        else{
            ver($var, $die, $varDump);
        }
    }
}

function eliminarAcentos($cadena){

    //Reemplazamos la A y a
    $cadena = str_replace(
    array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
    array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
    $cadena
    );

    //Reemplazamos la E y e
    $cadena = str_replace(
    array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
    array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
    $cadena );

    //Reemplazamos la I y i
    $cadena = str_replace(
    array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
    array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
    $cadena );

    //Reemplazamos la O y o
    $cadena = str_replace(
    array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
    array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
    $cadena );

    //Reemplazamos la U y u
    $cadena = str_replace(
    array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
    array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
    $cadena );

    //Reemplazamos la N, n, C y c
    $cadena = str_replace(
    array('Ñ', 'ñ', 'Ç', 'ç'),
    array('N', 'n', 'C', 'c'),
    $cadena
    );
    
    return $cadena;
}

function getThisFileName(){
    $full_path = $_SERVER['PHP_SELF'];
    $file_name = substr($full_path, strripos($full_path, "/") + 1);
    return substr($file_name, 0, strripos($file_name, "."));
}

function getThisFolderName(){
    $full_path = $_SERVER['PHP_SELF'];
    $folder_name = substr($full_path, 0, strripos($full_path, "/"));
    return  substr($folder_name, strripos($folder_name, "/") + 1);
}
?>