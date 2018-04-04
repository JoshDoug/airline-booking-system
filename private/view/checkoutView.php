<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Checkout</title>
    <meta charset="utf-8">
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php');
if(isset($error)) {
    ?><p><?= $error ?></p><?php
}
?>
<main>
    <h2>Checkout</h2>
    <p>Flight Details:</p>
    <ul>
        <li><?= $flight->departurePoint ?></li>
        <li><?= $flight->destination ?></li>
        <li><?= $flight->departureTime ?></li>
        <li><?= $flight->date ?></li>
        <li><?= $flight->duration ?></li>
        <li><?= $flight->day ?></li>
        <li><?= $flight->type ?></li>
    </ul>
    <!--  Not going to bother with entering dummy payment details malarkey  -->
    <p>Required details to check flight out:</p>
<!--  TODO Only require confirmation if customer is logged in? -->
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
        <!--  TODO Add number of flights once Sam adds selector  -->
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
                <input type="email" name="email" placeholder="Email" required>
            </label>
        </p>
        <input type="submit" name="checkout" value="Checkout">
    </form>
</main>
</body>
</html>