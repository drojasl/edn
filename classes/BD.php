<?php
@session_start();
include_once(dirname(__FILE__) . "/../lib/globals.php");

class BD{
    public static function connect(){
        include_once(dirname(__FILE__) . "/../config/config.php");
        try {
            $mysqlPDO = new PDO("mysql:host=".HOST.";dbname=".DB, DB_USER, DB_PASS);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        if($mysqlPDO) {
           return $mysqlPDO;
        }
        return false;
    }
    
    public static function blockSQLInjectionForm(&$fields){
        debug("BD::blockSQLInjectionForm1", $fields);
        if(is_array($fields)){
            foreach($fields as $key=>$field){
                $field = eliminarAcentos($field);
                $field = self::blockSQLInjection($field);
                $fields[$key] = $field;
            }
        }
        debug("BD::blockSQLInjectionForm2", $fields);
    }
    public static function blockSQLInjection($input){
        debug("BD::blockSQLInjection1", $input);
        $input = trim($input);
        $input = strip_tags($input);
        $input = htmlentities($input);
        $input = str_replace(array('"', "\"", ";", "'"), array('', '', '', ''), $input);
        debug("BD::blockSQLInjection2", $input);
        return $input;
    }
    
    public static function select($query){
        $mysqlPDO = self::connect();
        $consulta = $mysqlPDO->query($query);
        $data = $consulta->fetch(PDO::FETCH_ASSOC);
        if($data){
            return $data;
        }
        return false;
    }
    
    public static function selectAll($query){
        $mysqlPDO = self::connect();
        $consulta = $mysqlPDO->query($query);
        $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if($data){
            return $data;
        }
        return false;
    }
    
    public static function insert($query, $data){
        $mysqlPDO = self::connect();
        $insert = $mysqlPDO->prepare($query);
        $response = $insert->execute($data);
        if($response){
            return $mysqlPDO->lastInsertId();
        }
        return false;
    }
    
    public static function update($query, $data){
        $mysqlPDO = self::connect();
        $update = $mysqlPDO->prepare($query);
        $response = $update->execute($data);
        if($response){
            return true;
        }
        return false;
    }

    public static function delete($query, $data){
        $mysqlPDO = self::connect();
        $delete = $mysqlPDO->prepare($query);
        $response = $delete->execute($data);
        if($response){
            return true;
        }
        return false;
    }
}
?>