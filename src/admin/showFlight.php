<?php
require_once '../../private/initialise.php';

// Might make more sense to have this in the normal directory as customers might view a flight specifically?
// But maybe not, can always be changed at a later date

if (!isset($_REQUEST['flightId'])) {
    header('Location: manageFlights.php');
}

$flight = getFlightById($_REQUEST['flightId']);

?>
<ul>
    <li><?= $flight->flightId ?></li>
    <li><?= $flight->departurePoint ?></li>
    <li><?= $flight->destination ?></li>
    <li><?= $flight->departureTime ?></li>
    <li><?= $flight->date ?></li>
    <li><?= $flight->duration ?></li>
    <li><?= $flight->day ?></li>
    <li><?= $flight->type ?></li>
</ul>