<?php // User Login
require_once '../private/initialise.php';

if (isset($_POST['login'])) {
    $email = trim($_POST['email']); // TODO move to dataAccess
    $password = trim($_POST['password']);
    $stored = loginUser($email);
    if (password_verify($password, $stored)) {
        session_start();
        session_regenerate_id(true);
        $customer = getCustomerByEmail($email);
        $_SESSION['username'] = $customer->firstName;
        $_SESSION['authenticatedCustomer'] = true;
        header('Location: user.php');
        exit;
    } else {
        $error = 'Login failed. Check email and password.';
    }
}

require_once(VIEW_ROOT . '/loginView.php');
?>