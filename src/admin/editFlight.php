<?php
require_once '../../private/initialise.php';

// Move this logic into a controller and rename file to editFlightView.php

if(isset($_REQUEST['editFlight'])) {
    // Update DB and redirect to show page
    // Could convert into an array or object to make this easier to pass
    updateFlight($_REQUEST['flightId'], $_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['date'], $_REQUEST['day'], $_REQUEST['departureTime'], $_REQUEST['duration'], $_REQUEST['type']);
    header('Location: showFlight.php?flightId=' . $_REQUEST['flightId']);
}

if(!isset($_REQUEST['flightId'])) {
    header('Location: manageFlights.php');
}

$flight = getFlightById($_REQUEST['flightId']);
$locations = getLocations();

// View Section
?>

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