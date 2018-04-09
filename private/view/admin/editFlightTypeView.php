<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Admin</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/adminHeader.php') ?>
<main>

    <form action="editFlightType.php" method="post">
        <input type="hidden" name="editFlightType" value="editFlightType">
        <input type="hidden" name="flightTypeId" value="<?= $flightType->flightTypeId ?>">
        Edit Flight Type:
        <select name="departurePoint">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"
                    <?php if ($flightType->departurePoint === $location->locationName) : ?>
                        selected="selected"
                    <? endif ?>
                ><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>

        <select name="destination">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"
                    <?php if ($flightType->destination === $location->locationName) : ?>
                        selected="selected"
                    <?php endif ?>
                ><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>

        <select name="day">
            <?php foreach ($days as $day) : ?>
                <option value="<?=$day?>"
                    <?php if ($flightType->day === $day) : ?>
                        selected="selected"
                    <?php endif ?>
                ><?=$day?></option>
            <?php endforeach ?>
        </select>

        <!--    Departure Time    -->
        <input type="time" name="departureTime" value="<?= $flightType->departureTime ?>">

        <!--    Duration    -->
        <input type="time" name="duration" value="<?= $flightType->duration ?>">

        <select name="type">
            <option value="Domestic" <?php if($flightType->type === "Domestic") {?>selected="selected"<?php } ?>>Domestic</option>
            <option value="Europe" <?php if($flightType->type === "Europe") {?>selected="selected"<?php } ?>>Europe</option>
        </select>

        <input type="submit" value="Update Flight Type"/>
    </form>
</main>
</body>
</html>