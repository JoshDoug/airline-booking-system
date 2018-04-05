<?php
require_once '../../private/initialise.php';
require_once(INCLUDE_ROOT . '/adminAuthRequired.php');

if (isset($_POST['registerAdmin'])) {
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
                $errors['failed'] = "Email is already registered.";
            } else {
                $registerAdmin = registerAdmin($firstName, $lastName, $email, $password);
                if ($registerCustomer) {
                    $_SESSION['authenticatedAdmin'] = $email;
                    header('Location: index.php');
                    exit;
                }
            }
        }
    }
}

// Display admin details and add option to add additional admin and link to flight management page
require_once(VIEW_ROOT . '/admin/adminView.php') ?>
