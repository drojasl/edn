<?php
    include_once(CLASSES . "BD.php");
    
    $dir_subida = '../uploads/click/';
    
    $click_id = BD::blockSQLInjection($_POST['click_id']);
    $fecha_evento = BD::blockSQLInjection($_POST['fecha_evento']);
    if(isset($_FILES['imgFlyer']['tmp_name']) && $_FILES['imgFlyer']['tmp_name']){
        if($click_id){
            if($_FILES['imgFlyer']['type'] == "image/jpeg"){
                if(!is_dir($dir_subida)){
                    mkdir($dir_subida, 0700);
                }
                $fileName = $dir_subida . "/" . $click_id.".jpg";
                if(!move_uploaded_file($_FILES['imgFlyer']['tmp_name'], $fileName)) {
                    echo "Se produjo un error al copiar el archivo";
                    die;
                }
            }
            else{
                echo "El tipo de archivo no es compatible (".$_FILES['imgFlyer']['type'].")<br>";
                echo "<a href='index'>Regresar</a>";
            }
        }
    }
    if($click_id){
        include_once(CLASSES . "Click.php");
        $click = new Click();
        $click->getClickInfo($click_id);
        $click->fecha_evento = $fecha_evento;
        if($click->update()){
            header("Location: index");
            return;
        }
        echo "Se produjo un error";
    }
    header("Location: index");
?>