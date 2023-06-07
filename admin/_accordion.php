<?php
    $allCodes = $empresario->getAllCodes();
    $por_cada_codigo = array();
    foreach($allCodes as $codigo){
        $codigo_acceso = $codigo->codigo_acceso;
        $estadisticas_por_codigo = Estadisticas::getPorCodigo($empresario->id, $codigo_acceso);
        if($estadisticas_por_codigo){
            $por_codigo = array();
            foreach($estadisticas_por_codigo as $estadistica_por_codigo){
                $etapa = $estadistica_por_codigo['tipo'];
                list($curso, $video) = explode('_', $estadistica_por_codigo['valor']);
                $val = $estadistica_por_codigo['conteo'];
                $por_codigo[$etapa][$curso][$video] = $val;
            }
            $por_cada_codigo[$codigo_acceso] = $por_codigo;
        }
    }
?>

<script type="text/javascript" src="<?php echo JS_WEB ?>accordion.js"></script>

<h2 class="m-4">Estad&iacute;sticas de ingreso a videos</h2>

<?php
$etapas = [
    //"Etapa0"=> "Cursos de Enganche", 
    "Etapa1"=> "Preparativo", 
    "Etapa2"=> "Seguimiento",
    //'Etapa3'=> "Inicio Exitoso"
];

$cursos = [
    "Etapa0"=> [
        // AGREGAR NUEVOS CURSOS ACA
        //'crisis2020',
    ],
    "Etapa1"=> [
        'economia-colaborativa',
        'crisis2020',
    ],
    "Etapa2"=> [
        'seguimiento',
    ],
    'Etapa3'=> [
        //'bienvenida',
    ]
];

foreach($etapas as $etapa=>$etapa_display){
    echo "<div class='mt-5'><h3>$etapa_display</h3></div>";

    foreach($cursos[$etapa] as $curso){
        echo "<div class='accordion'>";
            echo "<div class='group'>";
                echo "<h3>" . strtoupper($curso) . "</h3>";
                echo "<div>";
                    echo "<table class='table'>";
                        echo "<thead class='thead-dark'>";
                            echo "<tr>";
                                echo "<th scope='col'>C&oacute;digo</th>";
                                    include(VIDEO . $curso . "/curso_config.php");
                                    $videos_del_curso = $curso_config["videos"];
                                    foreach($videos_del_curso as $video=>$display){
                                        echo "<th scope='col' class='text-center'> $display </th>";
                                    }
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                            $totales = array_fill_keys(array_keys($videos_del_curso), 0);
                            foreach($por_cada_codigo as $codigo=>$data){
                                if(isset($por_cada_codigo[$codigo][$etapa][$curso])){
                                    echo "<tr>";
                                        echo "<th scope='row'>$codigo</th>";
                                        foreach($videos_del_curso as $video=>$display){
                                            $valor = isset($por_cada_codigo[$codigo][$etapa][$curso][$video]) ? $por_cada_codigo[$codigo][$etapa][$curso][$video] : 0;
                                            $totales[$video] += $valor;
                                            echo "<td class='text-center'>$valor</td>";
                                        }
                                    echo "</tr>";
                                }
                            }
                            echo "<tr class='table-secondary'>";
                                echo "<th scope='row'>Total</th>";
                                foreach($totales as $total){
                                    echo "<td class='text-center'>$total</td>";
                                }
                            echo "</tr>";
                        echo "</tbody>";
                    echo "</table>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
}
?>