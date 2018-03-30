<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 19/02/2018
 * Time: 15:29
 */

if (isset($_POST['login'])) {
    $customerId = trim($_POST['customerId']);
    $pwd = trim($_POST['pwd']);
    $stmt = $db->prepare('SELECT pwd FROM customer WHERE customerId = :customerId'); // Admin table?
    $stmt->bindParam(':customerId', $customerId);
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
        $error = 'Login failed. Check customerId and password.'; // Change to reference number
    }
}