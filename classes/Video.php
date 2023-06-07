<?php
class Video{
    public $id;
    public $nombre;
    public $archivo;
    public $objetivo;       //  Empleado, Independiente, Desempleado, Estudiante, Hogar
    public $tipo;           //  Contacto, Plan
    public $edad;           //  18-30, 30-45, 45+
    public $genero;         //  F, M
    
    public function __construct(){
        $this->id = "";
        $this->nombre = "";
        $this->archivo = "";
        $this->objetivo = "";
        $this->tipo = "";
        $this->edad = "";
        $this->genero = "";
    }
    
    public function setDatos($datos){
        foreach($datos as $key=>$dato){
            if(property_exists($this, $key)){
                $this->$key = utf8_encode($dato);
            }
        }
    }
    
    public function seleccionarVideoBiblioteca_id($id){
        include_once(CLASSES . "BD.php");
        $video = BD::select("SELECT * FROM biblioteca WHERE id = '{$id}'");
        if($video){
            $this->setDatos($video);
        }
        return $this;
    }
    
    public static function getAllVideos(){
        include_once(CLASSES . "BD.php");
        $videos = BD::selectAll("SELECT * FROM biblioteca ORDER BY objetivo");
        return $videos;
    }
    
    public function seleccionarVideoBiblioteca($actividad, $parametros){
        include_once(CLASSES . "BD.php");
        $edad = (isset($parametros['edad'])) ? $parametros['edad'] : "";
        $genero = (isset($parametros['genero'])) ? $parametros['genero'] : "";
        $tipo = (isset($parametros['tipo'])) ? $parametros['tipo'] : "";
        
        $video = null;
        $video = BD::select("SELECT * FROM biblioteca WHERE objetivo IN ('{$actividad}') AND edad LIKE '%{$edad}%' AND genero='{$genero}' AND tipo='{$tipo}' Limit 1");
        if(!$video){
            $video = BD::select("SELECT * FROM biblioteca WHERE objetivo IN ('{$actividad}') AND genero='{$genero}' AND tipo='{$tipo}' Limit 1");
            if(!$video){
                $video = BD::select("SELECT * FROM biblioteca WHERE objetivo IN ('{$actividad}') AND edad LIKE '%{$edad}%' AND tipo='{$tipo}' Limit 1");
                if(!$video){
                    $video = BD::select("SELECT * FROM biblioteca WHERE objetivo IN ('{$actividad}') AND tipo='{$tipo}' Limit 1");
                    if(!$video){
                        $video = BD::select("SELECT * FROM biblioteca WHERE edad LIKE '%{$edad}%' AND genero='{$genero}' AND tipo='{$tipo}' Limit 1");
                        if(!$video){
                            $video = BD::select("SELECT * FROM biblioteca WHERE edad LIKE '%{$edad}%' AND genero='{$genero}' AND tipo='{$tipo}' Limit 1");
                            if(!$video){
                                $video = BD::select("SELECT * FROM biblioteca WHERE genero='{$genero}' AND tipo='{$tipo}' Limit 1");
                                if(!$video){
                                    $video = BD::select("SELECT * FROM biblioteca WHERE tipo='{$tipo}' Limit 1");
                                }
                            }
                        }
                    }
                }
            }
        }
        if($video){
            $this->setDatos($video);
        }
        return $this;
    }
    
}
?>