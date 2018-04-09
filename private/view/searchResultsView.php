<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys | Search Results</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<h2>View Flights</h2>
<div class="flight-container">
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

        <div class="counter">
            <label for="qty" title="Tickets">Ticket No.</label>
            <input name="ticketNo" id="qty" value="0" />
            <button type="button" id="down" onclick="modify_qty(-1)">-1</button>
            <button type="button" id="up" onclick="modify_qty(1)">+1</button>
        </div>

        <label>Start date range:
            <input type="date" name="startDate" min="<?= date('Y-m-d') ?>">
        </label>
        <label>End date range:
            <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
        </label>
        <input type="submit" value="Search Flights"/>
    </form>
</div>

<?php if (isset($flights)) : ?>
    <div class="flex-table">
        <table id="table">
            <tr>
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
                    <td>
                        <form action="checkout.php" method="get">
                            <input type="hidden" name="flightId" value="<?= $flight->flightId ?>">
                            <input type="hidden" name="ticketNo" value="<?= $_REQUEST['ticketNo'] ?>">
                            <input type="submit" value="Checkout"/>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
<?php endif ?>
</body>
</html>