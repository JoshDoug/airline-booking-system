<?php
// Manage Flight Information
require_once '../private/initialise.php';

//echo $_REQUEST['departurePoint'];
//echo $_REQUEST['destination'];

if (isset($_REQUEST['addLocation'])) {
    addLocation($_REQUEST['location']);
} elseif (isset($_REQUEST['removeLocation'])) {
    deleteLocation($_REQUEST['location']);
} elseif (isset($_REQUEST['addFlightType'])) {
    var_dump($_REQUEST['days']);

    foreach ($_REQUEST['days'] as $day) {
        addFlightType($_REQUEST['departurePoint'], $_REQUEST['destination'], $_REQUEST['departureTime'], $day, $_REQUEST['duration'], $_REQUEST['type']);
    }
} elseif (isset($_REQUEST['removeFlightType'])) {
    //deleteLocation($_REQUEST['location']);
} elseif (isset($_REQUEST['departurePoint']) && isset($_REQUEST['destination'])) {
    $flightTypes = getFlightTypes($_REQUEST['departurePoint'], $_REQUEST['destination']);
}

$locations = getLocations();

?>

    <form action="generateFlights.php" method="post">
        <input type="hidden" name="addLocation" value="addLocation">
        Add Location: <input name="location"/>
        <input type="submit"/>
    </form>

    <form action="generateFlights.php" method="post">
        <input type="hidden" name="removeLocation" value="removeLocation">
        Remove Location:
        <select name="location">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option></li>
            <?php endforeach ?>
        </select>
        <input type="submit"/>
    </form>

    <form action="generateFlights.php" method="post">
        <input type="hidden" name="addFlightType" value="addFlightType">
        Add Flight Type:
        <select name="departurePoint">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option></li>
            <?php endforeach ?>
        </select>

        <select name="destination">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option></li>
            <?php endforeach ?>
        </select>

        <select name="days[]" size="7" multiple>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>

        <!--    Departure Time    -->
        <input type="time" name="departureTime">

        <!--    Duration    -->
        <input type="time" name="duration">

        <select name="type"><!--   Ideally would use the DB for this    -->
            <option value="Domestic">Domestic</option>
            <option value="Europe">Europe</option>
        </select>

        <input type="submit"/>
    </form>

    <form action="generateFlights.php" method="post">
        <input type="hidden" name="removeFlightType" value="removeFlightType">
        Remove Flight Type:
        <select name="departurePoint">
            <option value="All">All</option>
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option></li>
            <?php endforeach ?>
        </select>

        <select name="destination">
            <option value="All">All</option>
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option></li>
            <?php endforeach ?>
        </select>

        <select name="days[]" size="7" multiple>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>

        <input type="submit"/>
    </form>

    <form action="generateFlights.php" method="get">
        Search for flights to or from Stansted:
        <select name="departurePoint">
            <option value="All">All</option>
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option></li>
            <?php endforeach ?>
        </select>

        <select name="destination">
            <option value="All">All</option>
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option></li>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Search"/>
    </form>

<?php if (isset($flightTypes)) : ?>
    <table>
        <tr>
            <th>Flight Type Id</th>
            <th>Departure Point</th>
            <th>Destination</th>
            <th>Departure Time</th>
            <th>Duration</th>
            <th>Day</th>
            <th>Type</th>
        </tr>
        <?php foreach ($flightTypes as $flightType): ?>
            <tr>
                <td><?= $flightType->flightTypeId ?></td>
                <td><?= $flightType->departurePoint ?></td>
                <td><?= $flightType->destination ?></td>
                <td><?= $flightType->departureTime ?></td>
                <td><?= $flightType->duration ?></td>
                <td><?= $flightType->day ?></td>
                <td><?= $flightType->type ?></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>