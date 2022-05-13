<?php

/*
|--------------------------------------------------------------------------
| Database Connections Config
|--------------------------------------------------------------------------
|
| Here are each of the database connections setup.
|
*/

$connections =  [
    'driver' => 'mysql',
    'host' => 'localhost',
    'port' => '3306',
    'database' => 'cv',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => 'SET NAMES utf8',
    ]) : [],
];




/*
|--------------------------------------------------------------------------
| Database Connections
|--------------------------------------------------------------------------
|
| Here you may specify which of the database connections below you wish
| to use as your default connection for all database work. Of course
| you may use many connections at once using the Database library.
|
*/

try {

    $connection = new PDO(
        "{$connections['driver']}:host{$connections['host']}:dbname{$connections['database']}",
        $connections['username'],
        $connections['password'],
        $connections['options']
    );
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo $e->getMessage();
}
