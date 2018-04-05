<?php // Admin Login
require_once '../../private/initialise.php';

if (isset($_POST['login'])) {
    $email = trim($_POST['email']); // Assumption that all employees have an @FlyGuys.co.uk email
    $password = trim($_POST['password']);
    $stored = loginAdmin($email);
    if (password_verify($password, $stored)) {
        session_start();
        session_regenerate_id(true);
        $admin = getAdminByEmail($email);
        $_SESSION['username'] = $admin->firstName;
        $_SESSION['authenticatedAdmin'] = $email;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Login failed. Check email and password.';
    }
}

require_once(VIEW_ROOT . '/admin/loginView.php');
?>