<?php
require_once '../private/initialise.php';

// Controller logic
$locations = getLocations();

if (isset($_REQUEST['departurePoint']) && isset($_REQUEST['destination'])) {
    $flights = getFlights($_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['startDate'], $_REQUEST['endDate']);
}

// View logic to be separated
// Pagination probably would be useful here...

// Just include a checkout button?
require_once(VIEW_ROOT . '/searchResultsView.php');
?>