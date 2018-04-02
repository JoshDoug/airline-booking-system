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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys</title>
    <meta charset="utf-8">
</head>
<body>
<header>
    <h1>Fly Guys</h1>
</header>
<main>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        if (isset($error)) {
            echo "<p style=\"color: white\">$error</p>";
        }
        ?>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <input type="password" name="pwd" placeholder="Password" required>
        <input type="submit" name="login" value="Log In">
    </form>
</main>
</body>
</html>
