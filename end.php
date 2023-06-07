<?php
@session_start();
session_destroy();

setcookie("Acceso", NULL, time()+1, '/');

header("Location: index");