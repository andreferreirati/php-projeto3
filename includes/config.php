<?php
/**
 * Created by PhpStorm.
 * User: andreferreira
 * Date: 09/12/14
 * Time: 22:27
 */

return array(
    'db' => array(
        'dsn' => 'mysql:host=localhost;dbname=pdo',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'root',
        'options' => [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
    )
);

?>