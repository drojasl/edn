<?php
class Click{
    public $id;
    public $nombre;
    public $organizadores;
    public $departamento_ciudad;
    public $fecha_evento;
    public $updated_at;
    
    public function __construct(){
        $this->id = "";
        $this->nombre = "";
        $this->organizadores = "";
        $this->departamento_ciudad = "";
        $this->fecha_evento = "";
        $this->updated_at = "";
    }
    
    public static function getAllClicks(){
        include_once(CLASSES . "BD.php");
        $clicks = BD::selectAll("SELECT * FROM click ORDER BY organizadores, departamento_ciudad");
        return $clicks;
    }
    
    public function setDatos($datos){
        foreach($datos as $key=>$dato){
            if(property_exists($this, $key)){
                $this->$key = $dato;
            }
        }
    }
    
    public function getClickInfo($id){
        include_once(CLASSES . "BD.php");
        $click = BD::select("SELECT * FROM click WHERE id='{$id}'");
        if($click){
            $this->setDatos($click);
            return true;
        }
        return false;
    }
    
    public function update(){
        include_once(CLASSES . "BD.php");
        
        $columnas = (array)$this;
        unset($columnas["updated_at"]);
        
        $campos = array();
        $valores = array();
        foreach($columnas as $key=>$dato){
            $campos[] = $key."=:$key";
            $valores[$key] = $dato;
        }
        $query = "";
        if(count($campos)){
            $fields = implode(", ", $campos);
            $query = "UPDATE click SET updated_at=NOW(), ".$fields." WHERE id='".$this->id."'";
        }
        
        $update = BD::update($query, $valores);
        if($update){
            return true;
        }
        return false;
    }
}
?>