<?php // Booking
require_once '../private/initialise.php';

if(isset($_REQUEST['retrieveBooking'])) {
    $booking = getBooking($_REQUEST['bookingReference']);
    $flight = getFlightById($booking->flightId);
    // TODO confirm email address is associated with the booking
} else {
    header('Location: index.php');
}

require_once(VIEW_ROOT . '/bookingView.php');
?>