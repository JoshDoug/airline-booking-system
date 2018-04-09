<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Admin</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/adminHeader.php') ?>
<main>
    <form action="editFlight.php" method="post">
        <input type="hidden" name="editFlight" value="editFlight">
        <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
        Edit Flight:
        <select name="departurePoint">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"
                    <?php if ($flight->departurePoint === $location->locationName) : ?>
                        selected="selected"
                    <? endif ?>
                ><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>

        <select name="destination">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"
                    <?php if ($flight->destination === $location->locationName) : ?>
                        selected="selected"
                    <?php endif ?>
                ><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>

        <input type="date" name="date" value="<?= $flight->date ?>">

        <select name="day">
            <?php foreach ($days as $day) : ?>
                <option value="<?=$day?>"
                    <?php if ($flight->day === $day) : ?>
                        selected="selected"
                    <?php endif ?>
                ><?=$day?></option>
            <?php endforeach ?>
        </select>

        <!--    Departure Time    -->
        <input type="time" name="departureTime" value="<?= $flight->departureTime ?>">

        <!--    Duration    -->
        <input type="time" name="duration" value="<?= $flight->duration ?>">

        <select name="type">
            <option value="Domestic" <?php if($flight->type === "Domestic") {?>selected="selected"<?php } ?>>Domestic</option>
            <option value="Europe" <?php if($flight->type === "Europe") {?>selected="selected"<?php } ?>>Europe</option>
        </select>

        <input type="submit" value="Update Flight"/>
    </form>
</main>
</body>
</html>