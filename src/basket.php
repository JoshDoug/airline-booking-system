<?php

// Holds customer booking and general info
// Display customer details such as name, email, booked flights

require_once '../private/initialise.php';

// Spew out everything currently added to basket
if (isset($_REQUEST['remove'])) {
    if(in_array($_REQUEST['flightId'], $_SESSION['basket'])) {
        $key = array_search($_REQUEST['flightId'], $_SESSION['basket']);
        unset($_SESSION['basket'][$key]);
    }
}
// TODO remove flight from basket - would require some sort of redirect/post request from PHP or for checkout
// TODO page to check an additional REQUEST var? - enhancement if there's time

$flights = [];
foreach ($_SESSION['basket'] as $flightId) {
    $flights[] = getFlightById($flightId);
}

require_once(VIEW_ROOT . '/basketView.php');
?>