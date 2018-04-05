<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | Search Results</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php'); ?>
<main>
<?php foreach ($flights as $flight) : ?>
    <h2>Flight <?= $flight->flightId ?></h2>
    <ul>
        <li><?= $flight->departurePoint ?></li>
        <li><?= $flight->destination ?></li>
        <li><?= $flight->departureTime ?></li>
        <li><?= $flight->date ?></li>
        <li><?= $flight->duration ?></li>
        <li><?= $flight->day ?></li>
        <li><?= $flight->type ?></li>
        <form action="checkout.php" method="get">
            <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
            <input type="submit" value="Checkout"/>
        </form>
        <form action="basket.php" method="post">
            <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
            <input type="submit" name="remove" value="Remove"/>
        </form>
        <!--  TODO add remove/checkout options  -->
    </ul>
<?php endforeach ?>
</main>
</body>
</html>
