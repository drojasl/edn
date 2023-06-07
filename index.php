<?php
$code = "";
if(isset($_GET['cod'])){
    $code = "?cod=" . $_GET['cod'];
}
header("Location: emprende".$code);
?>