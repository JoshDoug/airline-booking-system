<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css">
    <meta charset="utf-8">
    <title>Create Account</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<main>
    <h2>Create Account</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <ul class="flex-outer2">
        <li>
            <label for="firstName">First Name:</label>
                <input type="text" name="firstName" required>
            
        </li>
        <li>
            <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" required>
            
        </li>
        <li>
            <label for="email">Email:</label>
                <input type="text" name="email" required>
            
        </li>
        <li>
            <label for="password">Password:</label>
                <input type="password" name="password" required>
            
        </li>
        <li>
            <label for="confirm">Confirm Password:</label>
                <input type="password" name="confirm" required>
        
        </li>
        <li>
            <input type="submit" name="registerNew" value="Create Account">
        </li>
        </ul>
    </form>

    <?php if(isset($errors['failed'])) : ?>
    <p><?= $errors['failed'] ?></p>
    <?php endif; ?>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <ul class="flex-outer2">
        <li>
            <label for="bookingReference">Booking Reference:</label>
                <input type="text" name="bookingReference" required>
            
        </li>
        <li>
            <label for="email">Email:</label>
                <input type="text" name="email" required>
            
        </li>
        <li>
            <label for="password">Password:</label>
                <input type="password" name="password" required>
            
        </li>
        <li>
            <label for="confirm">Confirm Password:</label>
                <input type="password" name="confirm" required>
            

        </li>
        <li>
            <input type="submit" name="registerBooking" value="Create Account">
        </li>
    </form>
</main>
</body>
</html>