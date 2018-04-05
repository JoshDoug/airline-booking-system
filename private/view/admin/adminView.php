<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | Admin</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/adminHeader.php') ?>
<main>
    <h2>Register Admin</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label for="firstName">First Name:
                <input type="text" name="firstName" required>
            </label>
        </p>
        <p>
            <label for="lastName">Last Name:
                <input type="text" name="lastName" required>
            </label>
        </p>
        <p>
            <label for="email">Email:
                <input type="text" name="email" required>
            </label>
        </p>
        <p>
            <label for="password">Password:
                <input type="password" name="password" required>
            </label>
        </p>
        <p>
            <label for="confirm">Confirm Password:
                <input type="password" name="confirm" required>
            </label>
        </p>
        <p>
            <input type="submit" name="registerAdmin" value="Create Admin Account">
        </p>
    </form>
</main>
</body>
</html>