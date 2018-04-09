<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<main>
    <h2>Login</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        if (isset($error)) {
            echo "<p style=\"color: red\">$error</p>";
        }
        ?>
        <ul class="flex-outer">
        <li>
        <label for="email">Enter your Email:</label>
        <input type="email" name="email" placeholder="Email" id="email" required>
        </li>
        <li>
        <label for="password">Enter your Password:</label>
        <input type="password" name="password" placeholder="Password" required>
        </li>
        <input type="submit" name="login" value="Log In">
        </ul>
    </form>
</main>
</body>
</html>