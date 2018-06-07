<?php

class Database {
    private static $db = null;
    
    public static function connect(){
        $loadConfig = file_get_contents("./config/database.json");
        $config = json_decode($loadConfig, true);
        if(!isset(self::$db)){
            $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$db = new PDO($config['driver'].':host=' . $config['host'] .':'. $config['port'] .';dbname=' . $config['dbname'] . ';charset=utf8', $config['username'], $config['password'], $pdo_option);
        }
        return self::$db;
    }
}