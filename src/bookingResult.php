<?php
require_once '../private/initialise.php';

if(isset($_POST['checkout'])) {
    $bookingReferences = [];
    for($i = 0; $i < $_REQUEST['ticketNo']; $i++) {
        $bookingReference = strtoupper(substr(md5(uniqid(rand(), true)), 0, 10));
        $bookingReferences[] = $bookingReference;
        if (!checkBookingExists($bookingReference)) {
            try {
                addBooking($bookingReference, $_REQUEST['flightId'], $_REQUEST['firstName'],
                    $_REQUEST['lastName'], $_REQUEST['email']);
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        }
        if (!checkBookingExists($bookingReference)) {
            $error = "Something went wrong creating the booking, please repeat the process";
        }
    }
}
$flight = getFlightById($_REQUEST['flightId']);

require_once(VIEW_ROOT . '/bookingResultView.php');
?>