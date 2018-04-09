<!DOCTYPE html>
<html>
<head>
    <title>Fly Guys</title>
    <?php require_once(INCLUDE_ROOT . '/head.php') ?>
    <link rel="stylesheet" type="text/css" href="/css/carousel.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <div class="image-container">
            <img src="http://www.livetradingnews.com/wp-content/uploads/2017/06/paris-attractions-xlarge-701x438.jpg">
            <img src="https://lonelyplanetwp.imgix.net/2017/08/shutterstock_246498589-cb80d388ed1c.jpg?crop=entropy&fit=crop&h=421&sharp=10&vib=20&w=748">
            <img src="https://www.independent.ie/life/travel/article34992291.ece/ALTERNATES/h342/Getty%20dublin.jpg">
            <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/4b/00/28/glasgow-riverside-at.jpg">
            <img src="https://bss.augo.au.dk/Institution/DownloadInstitutionPicture/1759">
            <img src="https://cdn.mylittleadventure.com/4431/600x400/manchester-united-museum-and-stadium-tour-at-old-trafford-K3sonpF6.jpg">
        </div>
    </div>
</main>
<script type="text/javascript" src="/js/carousel.js"></script>
</body>
</html>