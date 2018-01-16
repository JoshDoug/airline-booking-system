<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 15/01/2018
 * Time: 17:26
 */

try {
    $dsn = 'mysql:host=db;dbname=exampledb';
    $db = new PDO($dsn, 'dbuser', 'dbpassword');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo $e->getMessage();
}