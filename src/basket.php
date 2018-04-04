<?php

// Holds customer booking and general info
// Display customer details such as name, email, booked flights

require_once '../private/initialise.php';
require_once(INCLUDE_ROOT . '/header.php');

// Spew out everything currently added to basket
$flights = [];
foreach ($_SESSION['basket'] as $flightId) {
    $flights[] = getFlightById($flightId);
}
foreach ($flights as $flight) : ?>
<h2>Flight <?= $flight->flightId ?></h2>
<ul>
    <li><?= $flight->departurePoint ?></li>
    <li><?= $flight->destination ?></li>
    <li><?= $flight->departureTime ?></li>
    <li><?= $flight->date ?></li>
    <li><?= $flight->duration ?></li>
    <li><?= $flight->day ?></li>
    <li><?= $flight->type ?></li>
</ul>
<?php endforeach ?>