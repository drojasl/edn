<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();

$curso_config = [
    'titulo' => $curso_folder,
    'etapa' => 'Etapa2',
    'videos' => [
        'vision'        => 'Visión del Negocio',
        'paradigmas'    => 'Rompiendo Paradigmas',
        'productos'     => 'Conoce los Productos',
        'acciones'      => 'Qué es lo que Hacemos',
        'pagos'         => 'Cómo Paga Amway',
        'autoregistro'  => 'Registro Amway'
    ],
    // REPLACE, URL, YOUTUBE
    'rutas' => [
        'vision'        => ['URL'=>'https://player.vimeo.com/external/409357342.hd.mp4?s=c226192f233bf5cc524ae320d1e22264cef96477&profile_id=174'],
        'paradigmas'    => ['YOUTUBE'=>'https://youtu.be/9vfInELR100', 'SPEED'=>'1.2'],
        'productos'     => ['YOUTUBE'=>'https://youtu.be/MHOaqcaYebg'],
        'acciones'      => ['URL'=>'https://player.vimeo.com/external/410510110.hd.mp4?s=aa204edfca3baeef4418e4080bb8ffe03512a70c&profile_id=174'],
        'pagos'         => ['YOUTUBE'=>'https://youtu.be/pzcJc_6Igck', 'SPEED'=>'1.1'],
        'autoregistro'  => ['YOUTUBE'=>'https://youtu.be/I5KVNAnQg2U', 'SPEED'=>'1.2'],
    ],
    'prev' => VIDEO_WEB . 'seguimiento',
    'next' => VIDEO_WEB . 'seguimiento',
]
?>