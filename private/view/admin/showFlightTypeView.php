<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Admin</title>
    <meta charset="utf-8">
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/adminHeader.php') ?>
<main>
    <ul>
        <li><?= $flightType->flightTypeId ?></li>
        <li><?= $flightType->departurePoint ?></li>
        <li><?= $flightType->destination ?></li>
        <li><?= $flightType->departureTime ?></li>
        <li><?= $flightType->duration ?></li>
        <li><?= $flightType->day ?></li>
        <li><?= $flightType->type ?></li>
    </ul>
</main>
</body>
</html>