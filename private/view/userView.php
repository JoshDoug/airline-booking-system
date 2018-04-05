<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | User Profile</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php'); ?>
<main>
    <h2>User Details</h2>
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
    <h2>User Bookings</h2>
    <ul>
        <li></li>
    </ul>
</main>
</body>
</html>