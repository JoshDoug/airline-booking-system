<?php // Book flight
require_once '../private/initialise.php';

if(isset($_POST['checkout'])) {
    // TODO Add support for multiple flights
    $bookingReference = strtoupper(substr(md5(uniqid(rand(), true)), 0, 10));
    if (!checkBookingExists($bookingReference)) {
        try {
            addBooking($bookingReference, $_REQUEST['flightId'], $_REQUEST['firstName'],
                $_REQUEST['lastName'], $_REQUEST['email']);
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
    if(!checkBookingExists($bookingReference)) {
        $error = "Something went wrong creating the booking, please repeat the process";
    }
}

if(isset($_REQUEST['flightId'])) {
    $flight = getFlightById($_REQUEST['flightId']);
} else {
    header('Location: index.php');
}

require_once(VIEW_ROOT . '/checkoutView.php');
?>