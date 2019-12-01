<?php

class Task extends Db 
{

    private $logger;

    public function __construct(){
        $this->logger = new Logger();
        
        echo parent::connect(config::$db['host'], 
                                config::$db['user'], 
                                config::$db['password'], 
                                config::$db['db_name']);
        
        
        
        if (!parent::checkTable(config::$db['data_table'])) {
            echo "try create tables";
            echo parent::createTable(config::$db['data_table'], 
                                config::$tablesStructure[config::$db['data_table']]['fields'],
                                config::$tablesStructure[config::$db['data_table']]['primary_key']);
        }

        $this->logger->log('Task Model construct done');
    }
}