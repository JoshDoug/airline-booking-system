<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys</title>
</head>
<body>
<?php require_once(INCLUDE_ROOT . '/header.php') ?>
<main>
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
    <h2>Retrieve Booking</h2>
    <form action="booking.php" method="post">
        <p>
            <label for="firstName">First Name:
                <input type="text" name="firstName" required>
            </label>
        </p>
        <p>
            <label for="lastName">Last Name:
                <input type="text" name="lastName" required>
            </label>
        </p>
        <p>
            <label for="email">Email:
                <input type="text" name="email" required>
            </label>
        </p>
        <p>
            <label for="booking">Booking Number:
                <input type="text" name="bookingReference" required>
            </label>
        </p>
        <p>
            <input type="submit" name="retrieveBooking" value="Retrieve Booking">
        </p>
    </form>
    <!-- Image Carousel Stuff I guess -->
</main>
</body>
</html>