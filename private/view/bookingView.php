<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | Booking</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php'); ?>
<main>
    <h2>Booking Details</h2>
    <ul>
        <li>Booking ref: <?= $bookingReference ?></li>
        <li>Flight ID: <?= $_REQUEST['flightId'] ?></li>
        <li>First Name: <?= $_REQUEST['firstName'] ?></li>
        <li>Last Name: <?= $_REQUEST['lastName'] ?></li>
        <li>Email: <?= $_REQUEST['email'] ?></li>
    </ul>
</main>
</body>
</html>