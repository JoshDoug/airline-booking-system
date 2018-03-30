<?php
require_once '../../private/initialise.php';

//if (!isset($_REQUEST['flightTypeId'])) {
//    header('Location: manageFlightTypes.php');
//}

$flightType = getFlightTypeById($_REQUEST['flightTypeId']);

?>
<ul>
    <li><?= $flightType->flightTypeId ?></li>
    <li><?= $flightType->departurePoint ?></li>
    <li><?= $flightType->destination ?></li>
    <li><?= $flightType->departureTime ?></li>
    <li><?= $flightType->duration ?></li>
    <li><?= $flightType->day ?></li>
    <li><?= $flightType->type ?></li>
</ul>