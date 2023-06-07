<?php
@session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$onlyIn = (isset($_GET['onlyIn'])) ? $_GET['onlyIn'] : "";
$dieIn = (isset($_GET['dieIn'])) ? $_GET['dieIn'] : "";
$off = (isset($_GET['off'])) ? $_GET['off'] : "";

$_SESSION['activeDebug'] = true;
if($onlyIn){
    $_SESSION['onlyIn'] = $onlyIn;
}
if($dieIn){
    $_SESSION['dieIn'] = $dieIn;
}
if($off){
    unset($_SESSION['dieIn']);
    unset($_SESSION['onlyIn']);
    unset($_SESSION['activeDebug']);
    echo "DEBUG MODE DEactivate!";
}
else{
    echo "DEBUG MODE ACTIVATE!";
}