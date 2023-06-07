<?php
date_default_timezone_set ("America/Bogota");

$fecha_evento = date("Y-m-d", strtotime("2020-06-16")); // MODIFICAR

$event_date = getDateForHumans($fecha_evento);
$date = $event_date['date'];
$day = $event_date['day'];
$month = $event_date['month'];

$dia_evento = date('Ymd', strtotime($fecha_evento));

$event_detail = [
    "title" => "La Escuela de Negocios Presentación en Vivo",
    "datetime" => $dia_evento."T203000",
    "datetime_end" => $dia_evento."T213000",
    "timezone" => "America/Bogota",
    "location" => "https://www.laescueladenegocios.co/en-vivo/",
    "details" => "El%20 Mundo%20 Despues%20 de%20 la%20 pandemia%0A%0Ahttps://www.laescueladenegocios.co/en-vivo %0A%0A$day%20 $date%20 de%20 $month%20 8:30PM%20 Hora%20 de%20 Colombia"   // MODIFICAR
];

$fecha_actual = date("Y-m-d");
$next_tuesday = date('Ymd', strtotime('next tuesday'));

// EVENTO DEFAULT
if($fecha_actual > $fecha_evento){
    $tuesday_event = date('Y-m-d', strtotime('next tuesday'));
    
    $event_date = getDateForHumans($tuesday_event);

    $date = $event_date['date'];
    $day = $event_date['day'];
    $month = $event_date['month'];

    $event_detail = [
        "title" => "La Escuela de Negocios Presentación en Vivo",
        "datetime" => $next_tuesday."T203000",
        "datetime_end" => $next_tuesday."T213000",
        "timezone" => "America/Bogota",
        "location" => "https://www.laescueladenegocios.co/en-vivo/",
        "details" => "Negocios%20 Digitales%20 en%20 la%20 nueva%20 era%0A%0Ahttps://www.laescueladenegocios.co/en-vivo %0A%0A$day%20 $date%20 de%20 $month%20 8:30PM%20 Hora%20 de%20 Colombia"
    ];
}

$data['calendar_url']['google'] =   
       'http://www.google.com/calendar/event?action=TEMPLATE'.
       '&action=TEMPLATE'.
       '&text='.$event_detail["title"].
       '&dates='.$event_detail["datetime"].'/'.$event_detail["datetime_end"].
       '&ctz='.$event_detail["timezone"].
       '&location='.$event_detail["location"].
       '&details='.$event_detail["details"].
       '&trp=false'.
       '&sprop=website:www.laescueladenegocios.co'.
       '&sprop=name:La Escuela de Negocios';

echo "No te lo pierdas: <a target='_blank' href='" . $data["calendar_url"]["google"] . "'>Agrega el próximo evento al calendario</a>";

header("Location: " . $data["calendar_url"]["google"]);

function getDateForHumans($date_convert){
    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $date = date("d", strtotime($date_convert));
    $day = date("w", strtotime($date_convert));
    $month = date("m", strtotime($date_convert));

    $day = $dias[$day];
    $month = $meses[(int)$month-1];
    
    return ['date'=>$date, 'day'=>$day, 'month'=>$month];
}
?>