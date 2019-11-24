<?php


class Config
{
    public static $db = [
        'host' => 'localhost:3306',
        'user' => 'root',
        'password' => '',
        'db_name' => 'test',
		'tables' => ['logs', 'users', 'tasks'],
		'data_table' => 'tasks'
    ];

    public static $tablesStructure = [
        'logs' => [
            'fields' => [
                'id' => 'INT(16) NOT NULL AUTO_INCREMENT',
                'create_date' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',                
                'type' => 'tinyint(2) NOT NULL',
                'text' => 'varchar(120) COLLATE utf8_bin NOT NULL'                 
            ],
            'primary_key' => 'id'
        ],      
        'tasks' => [
            'fields' => [
                'id' => 'INT(16) NOT NULL AUTO_INCREMENT',
                'create_date' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
                'user_name' => 'varchar(40) COLLATE utf8_bin NOT NULL',
                'mail' => 'varchar(40) COLLATE utf8_bin NOT NULL',
                'text' => 'varchar(120) COLLATE utf8_bin NOT NULL',
		        'status' => 'tinyint(1) DEFAULT NULL',
                'modified' => 'tinyint(1) DEFAULT NULL'
            ],
            'primaryKey' => 'id'
        ],
		'auth' => [
			'fields' => [
			'session' => 'varchar(40) COLLATE utf8_bin NOT NULL, '
			],
			'primaryKey' => 'session'
		]
    ];

    public static $users = [
	    'admin' => '123'
    ];

    public static $logs = [
        'enabled' => true,
        'db_config' => [
            'host' => 'localhost',
            'port' => '3306',
            'user' => 'root',
            'password' => '',
            'db_name' => 'test',
            'table_name' => 'logs'
        ],
        'types' => [
            'INFO' => 1,
            'DEBUG' => 2,
            'ERROR' => 3
        ]
    ];

    public static $staf = [
		'tasks_count_on_page' => '3'
	];
}