<?php
include_once(dirname(__FILE__) . "/../config/dirConfig.php");

include_once(CLASSES . "Prospecto.php");
include_once(CLASSES . "BD.php");

$campo = BD::blockSQLInjection($_GET['campo']);
$term = BD::blockSQLInjection($_GET['term']);

$datos = Prospecto::getDataFrom($campo, $term);
echo json_encode($datos);
?>