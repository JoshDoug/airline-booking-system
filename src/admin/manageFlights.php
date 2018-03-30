<?php
require_once '../../private/initialise.php';

if(isset($_REQUEST['generateFlights'])) {
    $dates = addFlights($_REQUEST['endDate']);
}

// Controller logic

// View logic to be separated
// Pagination probably would be useful here...

echo date("Y-m-d");
echo strtotime('Monday', date("Y-m-d"));

?>
<form action="manageFlights.php" method="post">
    <input type="hidden" name="generateFlights" value="generateFlights">
    Set date to generate flights until using the flight types:
    <input type="date" name="endDate" min="<?= date('Y-m-d') ?>">
    <input type="submit" name="Generate Flights">
</form>

<ul>
    <li><?=date("Y-m-d")?></li>
    <li><?=strtotime('Monday', strtotime(date("Y-m-d")))?></li>
    <li><?=date('Y-m-d', strtotime('Monday', strtotime(date("Y-m-d"))))?></li>
</ul>

<ul>
    <?php foreach ($dates as $date) : ?>
    <li><?= $date ?></li>
    <?php endforeach ?>
</ul>