<?php
// Manage Flight Information
require_once '../../private/initialise.php';

//echo $_REQUEST['departurePoint'];
//echo $_REQUEST['destination'];

if (isset($_REQUEST['addLocation'])) {
    addLocation($_REQUEST['location']);
} elseif (isset($_REQUEST['removeLocation'])) {
    deleteLocation($_REQUEST['location']);
} elseif (isset($_REQUEST['addFlightType'])) {
//    var_dump($_REQUEST['days']);

    foreach ($_REQUEST['days'] as $day) {
        addFlightType($_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['departureTime'], $day, $_REQUEST['duration'], $_REQUEST['type']);
    }
} elseif (isset($_REQUEST['removeFlightType'])) {
    deleteFlightType($_REQUEST['removeFlightType']);
}

if (isset($_REQUEST['departurePoint']) && isset($_REQUEST['destination'])) {
    $flightTypes = getFlightTypes($_REQUEST['departurePoint'], $_REQUEST['destination']);
}

$locations = getLocations();

require_once(VIEW_ROOT . '/admin/manageFlightTypesView.php')
?>