<?php // User Login
require_once '../private/initialise.php';

if (isset($_POST['login'])) {
    $email = trim($_POST['email']); // TODO move to dataAccess
    $password = trim($_POST['password']);
    $stmt = $db->prepare('SELECT password FROM customer WHERE email = :email'); // Admin table?
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $stored = $stmt->fetchColumn();
    if (password_verify($password, $stored)) {
        session_start();
        session_regenerate_id(true);
        //$_SESSION['username'] = $customerId;
        $_SESSION['authenticated'] = true;
        header('Location: user.php');
        exit;
    } else {
        $error = 'Login failed. Check email and password.';
    }
}

require_once(VIEW_ROOT . '/loginView.php');
?>