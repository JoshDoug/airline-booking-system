<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fly Guys | Admin</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/adminHeader.php') ?>
<main>
    <h2>Generate Flights</h2>
    <form action="manageFlights.php" method="post">
        <input type="hidden" name="generateFlights" value="generateFlights">
        Set date to generate flights until using the flight types:
        <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
        <input type="submit" name="Generate Flights">
    </form>
    <h2>View Flights</h2>
    <form action="manageFlights.php" method="get">
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
    <?php if (isset($flights)) : ?>
        <table>
            <tr>
                <th>Flight Type Id</th>
                <th>Departure Point</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Departure Time</th>
                <th>Duration</th>
                <th>Day</th>
                <th>Type</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($flights as $flight): ?>
                <tr>
                    <td><?= $flight->flightId ?></td>
                    <td><?= $flight->departurePoint ?></td>
                    <td><?= $flight->destination ?></td>
                    <td><?= $flight->date ?></td>
                    <td><?= $flight->departureTime ?></td>
                    <td><?= $flight->duration ?></td>
                    <td><?= $flight->day ?></td>
                    <td><?= $flight->type ?></td>
                    <td><a href="editFlight.php?flightId=<?= $flight->flightId ?>">Edit</a></td>
                    <td>
                        <form action="manageFlights.php?departurePoint=<?= $_REQUEST['departurePoint'] . '&destination=' . $_REQUEST['destination'] . '&startDate=' . $_REQUEST['startDate'] . '&endDate=' . $_REQUEST['endDate'] ?>"
                              method="post">
                            <input type="hidden" name="removeFlight" value="<?= $flight->flightId ?>">
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
