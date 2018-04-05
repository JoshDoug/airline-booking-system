<?php
require_once '../../private/initialise.php';
require_once(INCLUDE_ROOT . '/adminAuthRequired.php');

if(isset($_REQUEST['editFlightType'])) {
    // Update DB and redirect to show page
    // Could convert into an array or object to make this easier to pass
    updateFlightType($_REQUEST['flightTypeId'], $_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['day'], $_REQUEST['departureTime'], $_REQUEST['duration'], $_REQUEST['type']);
    header('Location: showFlightType.php?flightTypeId=' . $_REQUEST['flightTypeId']);
}

if(!isset($_REQUEST['flightTypeId'])) {
    header('Location: manageFlights.php');
}

$flightType = getFlightTypeById($_REQUEST['flightTypeId']);
$locations = getLocations();

// View Section
require_once(VIEW_ROOT . '/admin/editFlightTypeView.php')
?>