<?php

class Logger extends Db
{

    private $types;
    private $enabled;

    public function __construct()
    {
        //echo "logger constructor";
        //echo "<br>try connect";
        echo parent::connect(config::$db['host'], 
                             config::$db['user'], 
                             config::$db['password'], 
                             config::$db['db_name']);
        
        
        //echo "<br>Connect done";

        $this->enabled = config::$logs['enabled']; 
        $this->types = config::$logs['types']; 

        if (!parent::checkTable(config::$logs['table_name'])) {
            echo "<br>try create table logs<br>";
            parent::createTable(config::$logs['table_name'], 
                                config::$tablesStructure[config::$logs['table_name']]['fields'],
                                config::$tablesStructure[config::$logs['table_name']]['primary_key']);
        }

    }

    public function log($message, $type = "INFO")
    {
        $type = config::$logs['types'][$type];
        //echo "<br> try insert log in table $type";
        if ($this->enabled) {
            $data = [
                'type' => $type,
                'text' => $message
            ];
            parent::insertToTable(config::$logs['table_name'], $data);
        }
    }

    public function disable()
    {
        $this->enabled = false;
    }

    public function enable()
    {
        $this->enabled = true;
    }

    public function status()
    {
        return $this->enabled;
    }

}