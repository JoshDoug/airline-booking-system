<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 15/01/2018
 * Time: 17:26
 */

$envFilePath = CONFIG_PATH . '/env.list';

try {
    if(file_exists( $envFilePath)) {
        $ini = parse_ini_file($envFilePath);
        $dbName = $ini['MYSQL_DATABASE'];
        $dbUser = $ini['MYSQL_USER'];
        $dbPassword = $ini['MYSQL_PASSWORD'];
        $host = $ini['HOST'];

        $dsn = "mysql:host=$host;dbname=$dbName";
        $db = new PDO($dsn, "$dbUser", "$dbPassword");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
} catch(PDOException $e){
    echo $e->getMessage();
}