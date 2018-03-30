<?php

require_once '../private/initialise.php';

$greeting = "Hello World";
//
//$values = [1,2,3,4,5,6];
//
//foreach ($values as $value) {
//    echo $value;
//}

//require_once 'pdoConnect.php';

$stmt = $db->prepare('SELECT * FROM flightType');
$stmt->execute();
$numrows = $stmt->rowCount();
$flightTypes = $stmt->fetchAll(PDO::FETCH_CLASS, 'FlightType');

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

<h2>Admin:</h2>
<ul>
    <li><?= $admin->id ?></li>
    <li><?= $admin->first ?></li>
</ul>

<h2>States:</h2>
<ul>
    <?php foreach($flightTypes as $flightType) : ?>
        <li><?= $flightType->departurePoint ?></li>
        <li><?= $flightType->destination ?></li>
        <li><?= $flightType->departureTime ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>