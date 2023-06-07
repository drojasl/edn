<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();

$curso_config = [
    'titulo' => $curso_folder,
    'etapa' => 'Etapa3',
    'videos' => [
        'basicos'           => 'Básicos del Negocio',
        '300ptos'           => 'La importancia de los 300 Puntos',
        'comercializacion'  => 'Estratégias Comerciales',
        'lcps'              => 'Lista Contacto Plan Seguimiento',
        'metas'             => 'Mi Primera Meta',
        'apps'              => 'Apps y Herramientas Digitales',
        'estrategias'       => 'Estratégias Digitales'
    ],
    'prev' => ROOT_WEBFOLDER . 'invitacion',
    'next' => VIDEO . 'bienvenida',
]
?>