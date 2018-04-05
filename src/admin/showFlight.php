<?php
require_once '../../private/initialise.php';
require_once(INCLUDE_ROOT . '/adminAuthRequired.php');

if (!isset($_REQUEST['flightId'])) {
    header('Location: manageFlights.php');
}

$flight = getFlightById($_REQUEST['flightId']);

require_once(VIEW_ROOT . '/admin/showFlightView.php')
?>