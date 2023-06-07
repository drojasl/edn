<?php
class Codigo{
    public $id;
    public $empresario_id;
    public $codigo_acceso;
    public $curso;
    public $videos_default;
    public $activo;
    public $fecha_activo;
    public $visitas;
    public $borrado;
    
    public function __construct($empresario_id){
        $this->id = NULL;
        $this->empresario_id = $empresario_id;
        $this->codigo_acceso = "";
        $this->curso = "";
        $this->videos_default = "";
        $this->activo = 1;
        $this->fecha_activo = "";
        $this->visitas = 0;
        $this->borrado = 0;
    }
    
    public function generarCodigo($nombres, $apellidos, $codigo_amway){
        $nombres = explode(" ", $nombres);
        $apellidos = explode(" ", $apellidos);
        $key = "";
        foreach($nombres as $nombre){
            $key .= strtoupper(substr($nombre, 0, 1));
        }
        foreach($apellidos as $apellido){
            $key .= strtoupper(substr($apellido, 0, 1));
        }
        $startNumbKey = 4;
        $numbKey = substr($codigo_amway, - $startNumbKey, $startNumbKey);
        while($this->validarDuplicado($key.$numbKey)){
            $startNumbKey++;
            $numbKey = substr($codigo_amway, - $startNumbKey, $startNumbKey);
        }
        $key = $key.$numbKey;
        $this->codigo_acceso = $key;
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
        $dataCodigo = (array)$this;
        unset($dataCodigo['fecha_activo']);
        $id = BD::insert("INSERT INTO accesos (id, empresario_id, codigo_acceso, curso, videos_default, activo, fecha_activo, visitas, borrado) VALUES (:id, :empresario_id, :codigo_acceso, :curso, :videos_default, :activo, NOW(), :visitas, :borrado)", $dataCodigo);
        if($id){
            $this->id = $id;
            return true;
        }
        return false;
    }
    
    public function borrar(){
        include_once(CLASSES . "BD.php");

        $valores['borrado'] = 1;
        $query = "UPDATE accesos SET borrado=:borrado WHERE id='".$this->id."'";
        
        $update = BD::update($query, $valores);
        if($update){
            return true;
        }
        return false;
    }
    
    public function restart(){
        include_once(CLASSES . "BD.php");
        
        $columnas['curso'] = $this->curso;
        $columnas['videos_default'] = $this->videos_default;
        $columnas['activo'] = 1;
        $columnas['visitas'] = 0;
        $columnas['borrado'] = 0;
        
        $campos = array();
        $valores = array();
        foreach($columnas as $key=>$dato){
            $campos[] = $key."=:$key";
            $valores[$key] = $dato;
        }
        $query = "";
        if(count($campos)){
            $fields = implode(", ", $campos);
            $query = "UPDATE accesos SET fecha_activo=NOW(), ".$fields." WHERE id='".$this->id."'";
        }
        
        $update = BD::update($query, $valores);
        if($update){
            include_once(CLASSES . "Estadisticas.php");
            Estadisticas::restartCodigo($this->empresario_id, $this->codigo_acceso);
            return true;
        }
        return false;
    }
    
    public function validarDuplicado($cod){
        include_once(CLASSES . "BD.php");
        $codigo = BD::select("SELECT * FROM accesos WHERE codigo_acceso='{$cod}' AND borrado='0'");
        if($codigo){
            return true;
        }
        return false;
    }
    
    public function existeEnDB($cod){
        include_once(CLASSES . "BD.php");
        $codigo = BD::select("SELECT * FROM accesos WHERE codigo_acceso='{$cod}'");
        if($codigo){
            $this->setDatos($codigo);
            return true;
        }
        return false;
    }
    
    public function registrarVisita(){
        include_once(CLASSES . "BD.php");

        $valores['visitas'] = $this->visitas + 1;
        $query = "UPDATE accesos SET visitas=:visitas WHERE id='".$this->id."'";
        
        $update = BD::update($query, $valores);
        if($update){
            return true;
        }
        return false;
    }
    
    public function getCodigoInfo($id){
        include_once(CLASSES . "BD.php");
        $codigo = BD::select("SELECT * FROM accesos WHERE id='{$id}' limit 1");
        if($codigo){
            $this->setDatos($codigo);
            return true;
        }
        return false;
    }
    
    public function getCodigoAccesoInfo($cod){
        include_once(CLASSES . "BD.php");
        $codigo = BD::select("SELECT * FROM accesos WHERE codigo_acceso='{$cod}' limit 1");
        if($codigo){
            $this->setDatos($codigo);
            return true;
        }
        return false;
    }
}
?>