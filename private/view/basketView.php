<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | Search Results</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php'); ?>
<main>
    <h2>Basket</h2>
    <?php if (!empty($flights)) : ?>
        <?php foreach ($flights as $flight) : ?>
            <h2>Flight <?= $flight->flightId ?></h2>
            <ul class="flex-outer2">
                <li><?= $flight->departurePoint ?></li>
                <li><?= $flight->destination ?></li>
                <li><?= $flight->departureTime ?></li>
                <li><?= $flight->date ?></li>
                <li><?= $flight->duration ?></li>
                <li><?= $flight->day ?></li>
                <li><?= $flight->type ?></li>
                <li>
                    <form action="checkout.php" method="get">
                        <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
                        <input type="submit" value="Checkout"/>
                    </form>
                </li>
                <li>
                    <form action="basket.php" method="post">
                        <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
                        <input type="submit" name="remove" value="Remove"/>
                    </form>
                </li>
                <!--  TODO add remove/checkout options  -->
            </ul>
        <?php endforeach ?>
    <?php else : ?>
    <p>Basket is empty.</p>
    <?php endif ?>
</main>
</body>
</html>
