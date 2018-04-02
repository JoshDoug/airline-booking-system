<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys</title>
    <meta charset="utf-8">
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<main>
    <h2>Login</h2>
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