<?php
include_once(dirname(__FILE__) . "/config.php");

if(VARIABLE_AMBIENTE == 'D'){
    define('ROOT_WEBFOLDER', "/escuela/curso/");
}
if(VARIABLE_AMBIENTE == 'P'){
    define('ROOT_WEBFOLDER', "/curso/");
}
// FROM C://
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . ROOT_WEBFOLDER);
define('IMAGES', ROOT."images/");
define('CSS', ROOT."css/");
define('JS', ROOT."js/");
define('CLASSES', ROOT."classes/");
define('VIDEO', ROOT."video/");
define('LIB', ROOT."lib/");
define('ADMIN', ROOT."admin/");
// FROM host/
define('IMAGES_WEB', ROOT_WEBFOLDER."images/");
define('CSS_WEB', ROOT_WEBFOLDER."css/");
define('JS_WEB', ROOT_WEBFOLDER."js/");
define('VIDEO_WEB', ROOT_WEBFOLDER."video/");
define('LIB_WEB', ROOT_WEBFOLDER."lib/");

include_once(LIB . "globals.php");
?>