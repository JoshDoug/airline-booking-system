<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Account</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<main>
    <h2>Create Account</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label for="firstName">First Name:
                <input type="text" name="fName" id="firstName" required>
            </label>
        </p>
        <p>
            <label for="lastName">Last Name:
                <input type="text" name="lastName" id="lName" required>
            </label>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>
        </p>
        <p>
            <label for="password">Password:
                <input type="password" name="pwd" id="pwd" required>
            </label>
        </p>
        <p>
            <label for="confirm">Confirm Password:
                <input type="password" name="confirm" id="confirm" required>
            </label>

        </p>
        <p>
            <input type="submit" name="registerNew" value="Create Account">
        </p>
    </form>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label for="email">Booking Reference:</label>
            <input type="text" name="email" id="email" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>
        </p>
        <p>
            <label for="password">Password:
                <input type="password" name="password" id="pwd" required>
            </label>
        </p>
        <p>
            <label for="confirm">Confirm Password:
                <input type="password" name="confirm" id="confirm" required>
            </label>

        </p>
        <p>
            <input type="submit" name="registerNew" value="Create Account">
        </p>
    </form>
</main>
</body>
</html>