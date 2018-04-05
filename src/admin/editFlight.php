<?php
require_once '../../private/initialise.php';
require_once(INCLUDE_ROOT . '/adminAuthRequired.php');

if(isset($_REQUEST['editFlight'])) {
    // Update DB and redirect to show page
    // Could convert into an array or object to make this easier to pass
    updateFlight($_REQUEST['flightId'], $_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['date'], $_REQUEST['day'], $_REQUEST['departureTime'], $_REQUEST['duration'], $_REQUEST['type']);
    header('Location: showFlight.php?flightId=' . $_REQUEST['flightId']);
}

if(!isset($_REQUEST['flightId'])) {
    header('Location: manageFlights.php');
}

$flight = getFlightById($_REQUEST['flightId']);
$locations = getLocations();

// View Section
require_once(VIEW_ROOT . '/admin/editFlightView.php')
?>

