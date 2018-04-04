<?php
require_once '../private/initialise.php';
// Customer can either register fresh and just create an account, OR can register using a previously booked flight a la Swiss Airways
// (No need to register when booking flight but to edit any details you need to create an account

// So need to check if the customer already has a password if they try to register via a booking

if (isset($_POST['registerNew'])) {
    $expected = ['firstName', 'lastName', 'email', 'password', 'confirm'];
    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value) {
        if (in_array($key, $expected)) {
            $$key = trim($value); // Use a variable variable (pretty cool)
            if (empty($$key)) {
                $errors = true;
            }
        }
    }
    if (!$errors) { // Proceed only if there are no errors
        if ($password === $confirm) {
            // Check that the email hasn't already been registered
            $emailExists = checkEmailExists($email);
            if ($emailExists) {
                $errors['failed'] = "Email is already registered. If this is your email, then please log in,"
                    . " otherwise check you've entered your email correctly.";
            } else {
                $registerCustomer = registerCustomer($firstName, $lastName, $email, $password);
                if ($registerCustomer) {
                    $_SESSION['authenticatedUser'] = $email;
                    header('Location: user.php');
                    exit;
                }
            }
        }
    }
} elseif (isset($_POST['registerBooking'])) {
    $expected = ['bookingReference', 'email', 'password', 'confirm'];
    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value) {
        if (in_array($key, $expected)) {
            $$key = trim($value); // Use a variable variable (pretty cool)
            if (empty($$key)) {
                $errors = true;
            }
        }
    }
    // TODO check if they already have a password
    // Proceed only if there are no errors
    if (!$errors) {
        if ($password === $confirm) {
            // Check that the email hasn't already been registered

            $bookingExists = checkBookingExists($bookingReference);
            $emailExists = checkEmailExists($email);

            if ($bookingExists && $emailExists) {
                $customer = getCustomerByEmail($email);
                $success = updateCustomer($customer->firstName, $customer->lastName, $email, $password);

                // The rowCount() method returns 1 if the record is inserted,
                // so redirect the user to the login page
                if ($success) {
                    $_SESSION['authenticatedUser'] = $email;
                    header('Location: user.php');
                    exit;
                }
            } else {
                $errors['failed'] = "Email or Booking Reference don't exist.";
            }
        }
    }
}

require_once(VIEW_ROOT . '/registerView.php');
?>