<?php // Booking
require_once '../private/initialise.php';

if(isset($_REQUEST['bookingReference'])) {
    $flight = getFlightById($_REQUEST['flightId']);
} else {
    header('Location: index.php');
}