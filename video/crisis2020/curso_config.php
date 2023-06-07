<?php
include_once(dirname(__FILE__) . "../../../config/dirConfig.php");

$curso_folder = getThisFolderName();

$curso_config = [
    'titulo' => $curso_folder,
    'etapa' => 'Etapa0',
    'videos' => [
        'crisis'        => 'Crisis Económica 2020',
        'alternativa'   => 'Alternativa',
        'conclusiones'  => 'Conclusiones'
    ],
    'prev' => ROOT_WEBFOLDER . 'emprende',
    'next' => ROOT_WEBFOLDER . 'formulario',
]
?>