<?php
require_once '../../private/initialise.php';

if(isset($_REQUEST['generateFlights'])) {
    addFlights($_REQUEST['endDate']);
}

// Controller logic
$locations = getLocations();

// View logic to be separated
// Pagination probably would be useful here...

?>

<h1>Manage Flights</h1>

<p><a href="index.php">Admin Page</a></p>

<h2>Generate Flights</h2>
<form action="manageFlights.php" method="post">
    <input type="hidden" name="generateFlights" value="generateFlights">
    Set date to generate flights until using the flight types:
    <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
    <input type="submit" name="Generate Flights">
</form>

<h2>View Flights</h2>

<form action="manageFlightTypes.php" method="get">
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

    <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
    <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
    <input type="submit" value="Search Flights"/>
</form>
