<?php
namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $defaultGroup = 'productionDB';
    public string $testGroup = 'testDB';

    // public string $defaultGroup = 'default';
    public $testDB = [
        'DSN'      => '',
        'hostname' => '45.152.46.1',
        'username' => 'u198557509_Test',
        'password' => 'sistemas2024Galtech',
        'database' => 'u198557509_Testing',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'cacheOn'  => false,
        'cachedir' => '',
        'charset'  => 'utf8mb4',
        'DBCollat' => 'utf8mb4_unicode_ci',
        'swap_pre' => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'Failover' => [],
        'saveQueries' => true,
        'port'     => 3306,
    ];

    public $productionDB = [
        'DSN'      => '',
        'hostname' => '45.152.46.1',
        'username' => 'u198557509_biosgastro',
        'password' => 'sistemas2024Galtech',
        'database' => 'u198557509_biosgastro',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'cacheOn'  => false,
        'cachedir' => '',
        'charset'  => 'utf8mb4',
        'DBCollat' => 'utf8mb4_unicode_ci',
        'swap_pre' => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'Failover' => [],
        'saveQueries' => true,
        'port'     => 3306,
    ];
}


