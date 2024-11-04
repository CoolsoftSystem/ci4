<?php
namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public $default = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'u198557509_Test', // Cambia según tu usuario
        'password' => 'sistemas2024Galtech', // Cambia según tu contraseña
        'database' => 'u198557509_Testing', // Cambia según tu base de datos
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'cacheOn'  => false,
        'cachedir' => '',
        'charSet'  => 'utf8',
        'DBCollat' => 'utf8_unicode_ci',
        'swap_pre' => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'Failover' => [],
        'saveQueries' => true,
        'port'     => '3306',
    ];

    public $tests = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'u198557509_Test',
        'password' => 'sistemas2024Galtech',
        'database' => 'u198557509_Testing',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'cacheOn'  => false,
        'cachedir' => '',
        'charSet'  => 'utf8',
        'DBCollat' => 'utf8_unicode_ci',
        'swap_pre' => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'Failover' => [],
        'saveQueries' => true,
        'port'     => '3306',
    ];
}


