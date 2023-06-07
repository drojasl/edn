<?php
class Estadisticas{
    public $id;
    public $empresario_id;
    public $codigo_acceso;
    public $tipo;
    public $valor;
    public $prospecto;
    public $fecha;
    
    public function __construct($empresario_id, $codigo_acceso, $tipo="", $valor="", $prospecto=null){
        $this->id = NULL;
        $this->empresario_id = $empresario_id;
        $this->codigo_acceso = $codigo_acceso;
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->prospecto = $prospecto;
        $this->fecha = "";
    }
    
    public function setDatos($datos){
        foreach($datos as $key=>$dato){
            if(property_exists($this, $key)){
                $this->$key = utf8_encode($dato);
            }
        }
    }
    
    public function save(){
        include_once(CLASSES . "BD.php");
        $dataCodigo = (array)$this;
        unset($dataCodigo['fecha']);
        $id = BD::insert("INSERT INTO estadisticas (id, empresario_id, codigo_acceso, tipo, valor, prospecto, fecha) VALUES (:id, :empresario_id, :codigo_acceso, :tipo, :valor, :prospecto, NOW())", $dataCodigo);
        if($id){
            $this->id = $id;
            return true;
        }
        return false;
    }
    
    public static function getGeneral($empresario_id){
        include_once(CLASSES . "BD.php");
        $generales = BD::selectAll("SELECT tipo, valor, COUNT(1) AS conteo FROM estadisticas WHERE empresario_id='{$empresario_id}' GROUP BY valor");
        return $generales;
    }
    
    public static function getPorCodigo($empresario_id, $codigo_acceso){
        include_once(CLASSES . "BD.php");
        $porCodigo = BD::selectAll("SELECT tipo, valor, COUNT(1) AS conteo FROM estadisticas WHERE empresario_id='{$empresario_id}' AND codigo_acceso='{$codigo_acceso}' GROUP BY tipo, valor");
        return $porCodigo;
    }

    public static function controlarAccesoVideo($etapa, $curso_asociado, $video_actual, $prospecto_id=null){
        $clave_estadistica = $curso_asociado . "_" . $video_actual;

        // Si el video no ha sido visitado
        if( !isset($_SESSION['estadisticas'][$clave_estadistica]) || !isset($_COOKIE['estadisticas_'.$clave_estadistica]) ){
            include_once(CLASSES . "Empresario.php");
    
            $empresario = unserialize($_SESSION['Empresario']);
            $codigo_acceso = $_SESSION['Acceso'];
    
            $estadistica = new Estadisticas($empresario->id, $codigo_acceso, $etapa, $clave_estadistica, $prospecto_id);
            if($estadistica->save()){
                $_SESSION['estadisticas'][$clave_estadistica] = 1;
                setcookie("estadisticas_".$clave_estadistica, 1, time() + COOKIE_LIFETIME, '/');
            }
        }
    }

    public static function restartCodigo($empresario_id, $codigo_acceso){
        include_once(CLASSES . "BD.php");
        $valores['empresario_id'] = $empresario_id;
        $valores['codigo_acceso'] = $codigo_acceso;
        $porCodigo = BD::delete("DELETE FROM estadisticas WHERE empresario_id=:empresario_id AND codigo_acceso=:codigo_acceso", $valores);
    }
}
?>