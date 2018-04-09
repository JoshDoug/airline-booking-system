<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | Booking</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php'); ?>
<main>
    <h2>Booking Details</h2>
    <ul>
        <li>Booking ref: <?= $booking->bookingReference ?></li>
        <li>First Name: <?= $_REQUEST['firstName'] ?></li>
        <li>Last Name: <?= $_REQUEST['lastName'] ?></li>
        <li>Email: <?= $_REQUEST['email'] ?></li>
        <li><?= $flight->departurePoint ?></li>
        <li><?= $flight->destination ?></li>
        <li><?= $flight->departureTime ?></li>
        <li><?= $flight->date ?></li>
        <li><?= $flight->duration ?></li>
        <li><?= $flight->day ?></li>
        <li><?= $flight->type ?></li>
    </ul>
</main>
</body>
</html>