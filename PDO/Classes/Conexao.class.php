<?php
final class Conexao{
    
    private function __construct(){

    }
    public static function conectar()
    {
        if(!(defined('db_user'))){
            define('db_user', 'root');
        }
        if(!defined('db_host')){
            define('db_host', 'localhost');
        }
        if(!defined('db_pass')){
            define('db_pass', 'root');
        }
        if(!defined('db_name')){
            define('db_name', 'AulaTec');
        }
        if(!defined('db_port')){
            define('db_port', 3360);
        }
        try{
            $conn = new PDO('mysql:host='.db_host.'; port='.db_port.'; dbname='.db_name, db_user, db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo 'Erro ao conectar, erro: '.$e->getMessage();
        }
        
        return $conn; 
    }

    public static function prepare($sql){
        return self::conectar()->prepare($sql);
    }
}