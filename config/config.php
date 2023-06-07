<?php
include_once("ambiente.php");

if(VARIABLE_AMBIENTE == 'D'){
    define('HOST', 'localhost');
    define('DB', 'la_escuela_videocurso');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}
if(VARIABLE_AMBIENTE == 'P'){
    define('HOST', 'localhost');
    define('DB', 'laescuela_videocurso');
    define('DB_USER', 'usr_laescuela_vc');
    define('DB_PASS', 'dr881007');
}
define('COOKIE_LIFETIME', 604800); // 1 Semana (60 * 60 * 168)
define('CURSO_DEFAULT', "economia-colaborativa"); // crisis2020
?>