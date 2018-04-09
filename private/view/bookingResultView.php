<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Checkout</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php'); ?>
<main>
    <h2>Booking</h2>
    <p>First Name: <?= $_REQUEST['firstName'] ?></p>
    <p>Last Name: <?= $_REQUEST['lastName'] ?></p>
    <p>Email: <?= $_REQUEST['email'] ?></p>
    <ul>
        <li><?= $flight->departurePoint ?></li>
        <li><?= $flight->destination ?></li>
        <li><?= $flight->departureTime ?></li>
        <li><?= $flight->date ?></li>
        <li><?= $flight->duration ?></li>
        <li><?= $flight->day ?></li>
        <li><?= $flight->type ?></li>
    </ul>
    <h3>Booking References</h3>
    <?php foreach ($bookingReferences as $bookingReference) : ?>
        <p><?= $bookingReference ?></p>
    <?php endforeach ?>
</main>
</body>
</html>