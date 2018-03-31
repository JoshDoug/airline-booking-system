<?php
require_once '../private/initialise.php';

$locations = getLocations();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
<h1>Home</h1>

<form action="searchResults.php" method="get">
    Search for flights to or from Stansted:
    <select name="departurePoint">
        <option value="All">All</option>
        <?php foreach ($locations as $location): ?>
            <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option>
        <?php endforeach ?>
    </select>

    <select name="destination">
        <option value="All">All</option>
        <?php foreach ($locations as $location): ?>
            <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option>
        <?php endforeach ?>
    </select>

    <input type="date" name="startDate" min="<?= date('Y-m-d') ?>">
    <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
    <input type="submit" value="Search Flights"/>
</form>
</body>
</html>