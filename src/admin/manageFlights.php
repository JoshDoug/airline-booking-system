<?php
require_once '../../private/initialise.php';
require_once(INCLUDE_ROOT . '/adminAuthRequired.php');

if (isset($_REQUEST['generateFlights'])) {
    addFlights($_REQUEST['endDate']);
}

// Controller logic
$locations = getLocations();

if (isset($_REQUEST['removeFlight'])) {
    deleteFlight($_REQUEST['removeFlight']);
}

if (isset($_REQUEST['departurePoint']) && isset($_REQUEST['destination'])) {
    $flights = getFlights($_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['startDate'], $_REQUEST['endDate']);
}

// View logic to be separated
// Pagination probably would be useful here...

require_once(VIEW_ROOT . '/admin/manageFlightsView.php')
?>