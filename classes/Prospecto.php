<?php
class Prospecto{
    public $id;
    public $empresario_id;
    public $codigo_acceso;
    public $nombre;
    public $pais;
    public $ciudad;
    public $correo;
    public $celular;
    public $fecha_ingreso;
    public $visto;
    
    public function __construct(){
        $this->id = NULL;
        $this->empresario_id = "";
        $this->codigo_acceso = "";
        $this->nombre = "";
        $this->pais = "";
        $this->ciudad = "";
        $this->correo = "";
        $this->correo = "";
        $this->fecha_ingreso = "";
        $this->visto = 0;
    }
    
    public function setDatos($datos){
        foreach($datos as $key=>$dato){
            if(property_exists($this, $key)){
                $this->$key = $dato;
            }
        }
    }
    
    public function save(){
        include_once(CLASSES . "BD.php");
        $dataProspecto = (array)$this;
        unset($dataProspecto['fecha_ingreso']);
        $id = BD::insert("INSERT INTO prospectos (id, empresario_id, codigo_acceso, nombre, pais, ciudad, correo, celular, fecha_ingreso, visto) VALUES (:id, :empresario_id, :codigo_acceso, :nombre, :pais, :ciudad, :correo, :celular, NOW(), :visto)", $dataProspecto);
        if($id){
            $this->id = $id;
            return true;
        }
        return false;
    }
    
    public function marcarVisto($id){
        include_once(CLASSES . "BD.php");

        $valores['visto'] = 1;
        $query = "UPDATE prospectos SET visto=:visto WHERE id='".$id."'";
        
        $update = BD::update($query, $valores);
        if($update){
            return true;
        }
        return false;
    }
    
    public static function getDataFrom($campo, $term){
        include_once(CLASSES . "BD.php");
        
        $query = "SELECT DISTINCT $campo FROM prospectos WHERE $campo LIKE '%".$term."%'";
        $result = BD::selectAll($query);
        $response = array();

        if($result){
            foreach($result as $item){
                $response[] = $item[$campo];
            }
        }
        return $response;
    }
    
    public static function nroProspectosNuevos($empresario_id){
        include_once(CLASSES . "BD.php");
        
        $query = "SELECT COUNT(1) AS conteo FROM prospectos WHERE empresario_id='".$empresario_id."' AND visto='0'";
        $result = BD::select($query);
        $response = array();
        
        return $result;
    }
}
?>