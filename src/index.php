<?php
$greeting = "Hello World";
//
//$values = [1,2,3,4,5,6];
//
//foreach ($values as $value) {
//    echo $value;
//}

require_once 'pdoConnect.php';

$stmt = $db->prepare('SELECT * FROM states');
$stmt->execute();
$numrows = $stmt->rowCount();
$results = $stmt->fetchAll();

var_dump(PDO::getAvailableDrivers());

?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$greeting?></title>
</head>
<body>
<h1><?=$greeting?></h1>
<p>PHP Version: <?=PHP_VERSION?></p>
<p>PHP Database Query: <?= $numrows ?></p>

<h2>States:</h2>
<ul>
    <?php foreach($results as $result) : ?>
    <li><?= $result[0] . " " . $result[1] ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>