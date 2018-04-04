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
            <input type="submit" name="registerNew" value="Create Account">
        </p>
    </form>

    <?php if(isset($errors['failed'])) : ?>
    <p><?= $errors['failed'] ?></p>
    <?php endif; ?>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label for="bookingReference">Booking Reference:
                <input type="text" name="bookingReference" required>
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
            <input type="submit" name="registerBooking" value="Create Account">
        </p>
    </form>
</main>
</body>
</html>