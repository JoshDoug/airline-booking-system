<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Checkout</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php');
if (isset($error)) {
    ?><p><?= $error ?></p><?php
}
?>
<main>
    <h2>Checkout</h2>
    <div class="checkout-container">
        <ul class="flex-outer2">
            <li><p>Flight Details:</p></li>
            <li><?= $flight->departurePoint ?></li>
            <li><?= $flight->destination ?></li>
            <li><?= $flight->departureTime ?></li>
            <li><?= $flight->date ?></li>
            <li><?= $flight->duration ?></li>
            <li><?= $flight->day ?></li>
            <li><?= $flight->type ?></li>
        </ul>
        <p>Tickets Booked: <?= $_REQUEST['ticketNo'] ?></p>
        <form action="bookingResult.php" method="post">
            <input type="hidden" name="ticketNo" value="<?= $_REQUEST['ticketNo'] ?>">

            <ul class="flex-outer2">
                <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
                <?php if (!isset($_SESSION['authenticatedUser'])) : ?>
                    <li>
                        <p>Required details to check flight out:</p>
                    </li>
                    <li>
                        <label for="firstName">First Name:</label>
                        <input type="text" name="firstName" required>

                    </li>
                    <li>
                        <label for="lastName">Last Name:</label>
                        <input type="text" name="lastName" required>

                    </li>
                <?php endif ?>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" required>
                </li>
                <li>
                    <input type="submit" name="checkout" value="Checkout">
                </li>
            </ul>
        </form>
    </div>
</main>
</body>
</html>