<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | User Profile</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php'); ?>
<main>
    <section>

        <ul class="flex-outer">
            <li><h2>User Details</h2></li>
            <li>First Name: <?= $customer->firstName ?></li>
            <li>Last Name: <?= $customer->lastName ?></li>
            <li>Email: <?= $customer->email ?></li>
        </ul>
    </section>
    <article>

        <?php foreach ($bookings as $booking) :
            $flight = getFlightDetails($booking->flightId); ?>
            <section>
                <ul class="flex-outer">
                    <li><h2>User Bookings</h2></li>
                    <li><h2>Booking Code <?= $booking->bookingReference ?></h2></li>

                    <li>Flight No. <?= $flight->flightId ?></li>
                    <li>Departure Point: <?= $flight->departurePoint ?></li>
                    <li>Destination: <?= $flight->destination ?></li>
                    <li>Departure Time: <?= $flight->departureTime ?></li>
                    <li>Departure Date: <?= $flight->date ?></li>
                    <li>Flight Duration<?= $flight->duration ?></li>
                    <li>Flight Type: <?= $flight->type ?></li>
                </ul>
            </section>
        <?php endforeach ?>
    </article>
</main>
</body>
</html>