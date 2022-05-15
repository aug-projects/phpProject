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
    'database' => 'cv_db',
    'username' => 'root',
    'password' => 'root',
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
        "{$connections['driver']}:host={$connections['host']};dbname={$connections['database']}",
        $connections['username'],
        $connections['password']
    );

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo $e->getMessage();
}
