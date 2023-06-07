<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();

$curso_config = [
    'titulo' => $curso_folder,
    'etapa' => 'Etapa1',
    'videos' => [
        'introduccion'  => 'Bienvenida',
        'paradigmas'    => 'Paradigmas Para Emprender',
        'educacion'     => 'Nuestro Programa Educativo',
        'dondes-estas'  => 'Dónde estás y lo que viene',
        'proyecto'      => 'Nuestro Proyecto',
    ],
    'intro' => ['YOUTUBE'=>''],
    // REPLACE, URL, YOUTUBE, DB_YOUTUBE
    'rutas' => [
        'introduccion'  => ['DB_YOUTUBE' => 'Contacto'],
        'paradigmas'    => ['YOUTUBE'=>'https://youtu.be/KZFHntq1SVU', 'SPEED'=>'1.2'],
        'educacion'     => ['YOUTUBE'=>'https://youtu.be/u22qBX1qYDU', 'SPEED'=>'1.15'],
        'dondes-estas'  => ['YOUTUBE'=>'https://youtu.be/0pRX-RNCJZ4', 'SPEED'=>'1.1'],
        'proyecto'      => ['YOUTUBE'=>'https://youtu.be/QlhuMmVawJM'],
    ],
    'prev' => ROOT_WEBFOLDER . 'emprende',
    'next' => ROOT_WEBFOLDER . 'formulario',
]
?>