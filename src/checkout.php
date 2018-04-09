<?php // Book flight
require_once '../private/initialise.php';

if(isset($_REQUEST['flightId'])) {
    $flight = getFlightById($_REQUEST['flightId']);
} else {
    header('Location: index.php');
}

require_once(VIEW_ROOT . '/checkoutView.php');
?>