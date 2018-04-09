<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Admin</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/adminHeader.php') ?>
<main>
    <h1>Manage Flight Types</h1>
    <form action="manageFlightTypes.php" method="post">
        <input type="hidden" name="addLocation" value="addLocation">
        Add Location: <input name="location"/>
        <input type="submit" value="Add Location"/>
    </form>

    <form action="manageFlightTypes.php" method="post">
        <input type="hidden" name="removeLocation" value="removeLocation">
        Remove Location:
        <select name="location">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Remove Location"/>
    </form>

    <form action="manageFlightTypes.php" method="post">
        <input type="hidden" name="addFlightType" value="addFlightType">
        Add Flight Type:
        <select name="departurePoint">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>

        <select name="destination">
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option>
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

        <input type="submit" value="Add Flight Type"/>
    </form>

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
        <input type="submit" value="Search Flight Types"/>
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
            <th></th>
            <th></th>
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
                <td><a href="editFlightType.php?flightTypeId=<?= $flightType->flightTypeId ?>">Edit</a></td>
                <td>
                    <form action="manageFlightTypes.php?departurePoint=<?= $_REQUEST['departurePoint'] ?>&destination=<?= $_REQUEST['destination'] ?>"
                          method="post">
                        <input type="hidden" name="removeFlightType" value="<?= $flightType->flightTypeId ?>">
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>
</main>
</body>
</html>
