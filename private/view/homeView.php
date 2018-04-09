<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<main>
    <div class="flight-container">
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
    </div>
    <div class="retrieve-booking-container">
        <form action="booking.php" method="post">
            <ul class="flex-outer">
                <li>
                    <label><h4>Retrieve Booking</h4></label>
                </li>
                <li>
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" required>

                </li>
                <li>
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" required>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="text" name="email" required>

                </li>
                <li>
                    <label for="booking">Booking Number:</label>
                    <input type="text" name="bookingReference" required>

                </li>
                <li>
                    <input type="submit" name="retrieveBooking" value="Retrieve Booking">
                </li>
            </ul>
        </form>
        <img src="http://www.livetradingnews.com/wp-content/uploads/2017/06/paris-attractions-xlarge-701x438.jpg" alt="Flowers in Chania">
    </div>
</main>
</body>
</html>