<?php
require_once '../private/initialise.php';
// User Login

if (isset($_POST['login'])) {
    $customerId = trim($_POST['customerId']);
    $pwd = trim($_POST['pwd']);
    $stmt = $db->prepare('SELECT pwd FROM customer WHERE email = :email'); // Admin table?
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $stored = $stmt->fetchColumn();
    if (password_verify($pwd, $stored)) {
        session_start();
        session_regenerate_id(true);
        $_SESSION['username'] = $customerId;
        $_SESSION['authenticated'] = true;
        header('Location: home.php');
        exit;
    } else {
        $error = 'Login failed. Check email and password.';
    }
}

require_once(VIEW_ROOT. '/loginView.php');
?>