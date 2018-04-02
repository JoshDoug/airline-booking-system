<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | Search Results</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<h2>View Flights</h2>

<form action="searchResults.php" method="get">

    <label>
        Search for flights to or from Stansted:
        <select name="departurePoint">
            <option value="All">All</option>
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>
    </label>
    <label>
        <select name="destination">
            <option value="All">All</option>
            <?php foreach ($locations as $location): ?>
                <option value="<?= $location->locationName ?>"><?= $location->locationName ?></option>
            <?php endforeach ?>
        </select>
    </label>

    <label>Start date range:
        <input type="date" name="startDate" min="<?= date('Y-m-d') ?>">
    </label>
    <label>End date range:
        <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
    </label>
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
                <td>
                    <form action="searchResults.php?departurePoint=<?= $_REQUEST['departurePoint'] . '&destination=' . $_REQUEST['destination'] . '&startDate=' . $_REQUEST['startDate'] . '&endDate=' . $_REQUEST['endDate'] ?>"
                          method="post">
                        <input type="hidden" name="addToBasket" value="<?= $flight->flightId ?>">
                        <input type="submit" value="Add to Basket"/>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>
</body>
</html>
