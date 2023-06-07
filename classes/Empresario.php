<?php
class Empresario{
    public $id;
    public $nombres;
    public $apellidos;
    public $email;
    public $celular;
    public $whatsapp;
    public $password;
    public $codigo_amway;
    public $clave_autoregistro_empresario;
    public $clave_autoregistro_cliente;
    public $mi_tienda_digital;
    public $click_id;
    public $rol;
    
    public function __construct(){
        $this->id = NULL;
        $this->nombres = "";
        $this->apellidos = "";
        $this->email = "";
        $this->celular = "";
        $this->whatsapp = "";
        $this->password = "";
        $this->codigo_amway = "";
        $this->clave_autoregistro_empresario = "";
        $this->clave_autoregistro_cliente = "";
        $this->mi_tienda_digital = "";
        $this->click_id = "";
        $this->rol = "";
    }
    
    public function setDatos($datos){
        foreach($datos as $key=>$dato){
            if(property_exists($this, $key)){
                $this->$key = ($key == 'whatsapp' && $dato == 'on') ? 1 : $dato;
            }
        }
    }
    
    public function getFromCodigoAmway($codigo_amway) {
        include_once(CLASSES . "BD.php");
        $empresario = BD::select("SELECT * FROM empresarios WHERE codigo_amway='{$codigo_amway}'");
        if($empresario){
            $this->setDatos($empresario);
            return $this;
        }
        return false;
    }

    public function validarAcceso($key){
        include_once(CLASSES . "BD.php");
        $empresario = BD::select("SELECT e.* FROM empresarios e INNER JOIN accesos a ON e.id=a.empresario_id WHERE a.codigo_acceso='{$key}'");
        if($empresario){
            $this->setDatos($empresario);
            return true;
        }
        return false;
    }
    
    public function inciarSession($usr, $pass){
        include_once(CLASSES . "BD.php");
        $empresario = BD::select("SELECT * FROM empresarios WHERE codigo_amway='{$usr}' AND password='{$pass}'");
        if($empresario){
            $this->setDatos($empresario);
            return true;
        }
        return false;
    }
    
    public function save(){
        include_once(CLASSES . "BD.php");
        $id = BD::insert("INSERT INTO empresarios (id, nombres, apellidos, email, celular, whatsapp, password, codigo_amway, clave_autoregistro_empresario, clave_autoregistro_cliente, mi_tienda_digital, click_id, rol) VALUES (:id, :nombres, :apellidos, :email, :celular, :whatsapp, :password, :codigo_amway, :clave_autoregistro_empresario, :clave_autoregistro_cliente, :mi_tienda_digital, :click_id, :rol)", (array)$this);
        if($id){
            $this->id = $id;
            return true;
        }
        return false;
    }
    
    public function validarDuplicado($usr){
        include_once(CLASSES . "BD.php");
        $empresario = BD::select("SELECT * FROM empresarios WHERE codigo_amway='{$usr}'");
        if($empresario){
            return true;
        }
        return false;
    }
    
    public function update(){
        include_once(CLASSES . "BD.php");
        
        $campos = array();
        $valores = array();
        foreach($this as $key=>$dato){
            if($key == "password"){
                if($dato){
                    $campos[] = $key."=:$key";
                    $valores[$key] = $dato;
                }
            }
            else{
                $campos[] = $key."=:$key";
                $valores[$key] = $dato;
            }
        }
        $query = "";
        if(count($campos)){
            $fields = implode(", ", $campos);
            $query = "UPDATE empresarios SET ".$fields." WHERE id='".$this->id."'";
        }
        ver($query);
        $update = BD::update($query, $valores);
        if($update){
            return true;
        }
        return false;
    }
    
    public function getAllCodes(){
        include_once(CLASSES . "BD.php");
        $allCodigos = BD::selectAll("SELECT * FROM accesos WHERE empresario_id='{$this->id}' AND borrado='0' ORDER BY fecha_activo");
        if(count($allCodigos)){
            include_once(CLASSES . "Codigo.php");
            $codigos = array();
            foreach($allCodigos as $codigo){
                $code = new Codigo($this->id);
                $code->setDatos($codigo);
                $codigos[] = $code;
            }
            return $codigos;
        }
        return false;
    }
    
    public function getCodigoBase(){
        include_once(CLASSES . "BD.php");
        $codigo = BD::select("SELECT * FROM accesos WHERE empresario_id='{$this->id}' limit 1");
        if($codigo){
            include_once(CLASSES . "Codigo.php");
            $code = new Codigo($this->id);
            $code->setDatos($codigo);
            return $code;
        }
        return false;
    }
    
    public function getCodigoLast(){
        include_once(CLASSES . "BD.php");
        $codigo = BD::select("SELECT * FROM accesos WHERE empresario_id='{$this->id}' AND borrado='0' ORDER BY empresario_id DESC limit 1");
        if($codigo){
            include_once(CLASSES . "Codigo.php");
            $code = new Codigo($this->id);
            $code->setDatos($codigo);
            return $code;
        }
        return false;
    }
    
    public function getAllProspectos(){
        include_once(CLASSES . "BD.php");
        $allProspectos = BD::selectAll("SELECT * FROM prospectos WHERE empresario_id='{$this->id}' ORDER BY fecha_ingreso DESC");
        debug("getAllProspectos::allProspectos", $allProspectos, 1);
        if($allProspectos && count($allProspectos)){
            include_once(CLASSES . "Prospecto.php");
            $prospectos = array();
            foreach($allProspectos as $prospecto){
                $prosp = new Prospecto();
                $prosp->setDatos($prospecto);
                $prospectos[] = $prosp;
            }
            return $prospectos;
        }
        return array();
    }

    public function validateEmpresarioData($codigo_amway, $email, $celular) {
        include_once(CLASSES . "BD.php");
        $empresario = $this->getFromCodigoAmway($codigo_amway);
        if($empresario){
            if($empresario->email == $email && substr($empresario->celular, -7) == substr($celular, -7)) {
                return true;
            }
        }
        return false;
    }
}
?>