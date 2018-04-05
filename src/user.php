<?php

// Holds customer booking and general info
// Display customer details such as name, email, booked flights

require_once '../private/initialise.php';
require_once(INCLUDE_ROOT . '/authRequired.php');

$customer = getCustomerByEmail($_SESSION['authenticatedUser']);
$bookings = getBookingsByCustomer($customer->customerId);

require_once(VIEW_ROOT . '/userView.php');
?>