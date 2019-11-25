<?php

class Task extends Db {

    private $logger;

    function __construct(){
        $this->logger = new Logger();
        $this->logger->log('Task Model construct done');
    }
}