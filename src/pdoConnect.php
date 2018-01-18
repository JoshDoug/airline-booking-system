<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 15/01/2018
 * Time: 17:26
 */

try {
    if(file_exists('../config/env.list')) {
        $dbDetails = file_get_contents('../config/env.list');
        $ini = parse_ini_file('../config/env.list');
        $dbName = $ini['MYSQL_DATABASE'];
        $dbUser = $ini['MYSQL_USER'];
        $dbPassword = $ini['MYSQL_PASSWORD'];

        $dsn = "mysql:host=db;dbname=$dbName";
        $db = new PDO($dsn, "$dbUser", "$dbPassword");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
} catch(PDOException $e){
    echo $e->getMessage();
}