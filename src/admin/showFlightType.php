<?php
require_once '../../private/initialise.php';

//if (!isset($_REQUEST['flightTypeId'])) {
//    header('Location: manageFlightTypes.php');
//}

$flightType = getFlightTypeById($_REQUEST['flightTypeId']);

require_once(VIEW_ROOT . '/admin/showFlightTypeView.php')
?>