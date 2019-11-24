<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 06.10.2018
 * Time: 20:15
 */

class Logger extends Db
{

    private $types;
    private $enabled;

    public function __construct()
    {
        //echo "logger constructor";
        //echo "<br>try connect";
        echo parent::connect(config::$logs['db_config']['host'], 
                             config::$logs['db_config']['user'], 
                             config::$logs['db_config']['password'], 
                             config::$logs['db_config']['db_name']);
        
        
        //echo "<br>Connect done";

        $this->enabled = config::$logs['enabled']; 
        $this->types = config::$logs['types']; 

        if (!parent::checkTable(config::$logs['db_config']['table_name'])) {
            //echo "try create tables";
            parent::createTable(config::$logs['db_config']['table_name'], 
                                config::$tablesStructure[config::$logs['db_config']['table_name']]['fields'],
                                config::$tablesStructure[config::$logs['db_config']['table_name']]['primary_key']);
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
            parent::insertToTable(config::$logs['db_config']['table_name'], $data);
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