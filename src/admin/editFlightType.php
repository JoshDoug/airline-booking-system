<?php
require_once '../../private/initialise.php';

// Move this logic into a controller and rename file to editFlightTypeView.php

if(isset($_REQUEST['editFlightType'])) {
    // Update DB and redirect to show page
    updateFlightType($_REQUEST['flightTypeId'], $_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['day'], $_REQUEST['departureTime'], $_REQUEST['duration'], $_REQUEST['type']);
    header('Location: showFlightType.php?flightTypeId=' . $_REQUEST['flightTypeId']);
}

if(!isset($_REQUEST['flightTypeId'])) {
    header('Location: manageFlights.php');
}

$flightType = getFlightTypeById($_REQUEST['flightTypeId']);
$locations = getLocations();

$days = [
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday'
];

// View Section
?>

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