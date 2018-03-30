<?php

// ------ CREATE/INSERT STATEMENTS ------

// -- Admin --
// ! Add Location
function addLocation($locationName) {
    global $db;
    $sql = 'INSERT INTO location (locationName) VALUE (:locationName)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':locationName', $locationName);
    $stmt->execute();
}

// ! Add FlightType
function addFlightType($depareturePoint, $destination, $departureTime, $day, $duration, $type) {
    global $db;
    $sql = 'INSERT INTO flightType (departurePoint, destination, departureTime, duration, day, type)
                VALUE (:departurePoint, :destination, :departureTime, :duration, :day, :type)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':departurePoint', $depareturePoint);
    $stmt->bindParam(':destination', $destination);
    $stmt->bindParam(':departureTime', $departureTime);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':day', $day);
    $stmt->bindParam(':type', $type); // Should really be able to work this out but would require database changes
    $stmt->execute();
}

// ! Add Flight(s)
// Add Administrator

// -- Customer --
// ! Register
//! Add Booking

// ------ READ/SELECT STATEMENTS ------

// -- Admin --
// ! Select Flight Types -- could add more search options
// Get Flight Types by Departure Point and/or Destination
function getFlightTypes($departurePoint, $destination) {
    global $db;
    if ($departurePoint == "All" && $destination == "All") {
        $sql = 'SELECT * FROM flightType';
        $stmt = $db->prepare($sql);
    } elseif ($departurePoint == "All") {
        $sql = 'SELECT * FROM flightType WHERE flightType.destination=:destination';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':destination', $destination);
    } elseif ($destination == "All") {
        $sql = 'SELECT * FROM flightType WHERE flightType.departurePoint=:departurePoint';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':departurePoint', $departurePoint);
    } else {
        $sql = 'SELECT * FROM flightType WHERE flightType.departurePoint=:departurePoint AND flightType.destination=:destination';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':departurePoint', $departurePoint);
        $stmt->bindParam(':destination', $destination);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'FlightType');
}

// Get a single Flight Type using the surrogate Id
function getFlightTypeById($flightTypeId) {
    global $db;
    $sql = 'SELECT * FROM flightType WHERE flightType.flightTypeId=:flightTypeId';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':flightTypeId', $flightTypeId);
    $stmt->execute();
    return array_shift( $stmt->fetchAll(PDO::FETCH_CLASS, 'FlightType'));
}

// -- Both --
// ! Select Locations
function getLocations() {
    global $db;
    $stmt = $db->prepare('SELECT * FROM location');
    $stmt->execute();
    return $locations = $stmt->fetchAll(PDO::FETCH_CLASS, 'Location');
}

// ! Select Flights
// ! Select Flights by Destination/DeparturePoint/Day/Date

// ------ UPDATE STATEMENTS ------

// -- Admin --
// ! Update Flights
// Update Single Flight
function updateFlight() {

}

// ! Update Flight Types

// Update Single Flight Type
function updateFlightType() {

}

// ! Update Location

// -- Customer --
// Update User Details?

// ------ DELETE STATEMENTS ------

// ! Delete Location
function deleteLocation($locationName) {
    global $db;
    $sql = 'DELETE FROM location WHERE locationName=:locationName';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':locationName', $locationName);
    $stmt->execute();
}

// ! Delete Flight Type
function deleteFlightType($flightTypeId) {
    global $db;
    $sql = 'DELETE FROM flightType WHERE flightTypeId=:flightTypeId LIMIT 1';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':flightTypeId', $flightTypeId);
    $stmt->execute();
}

// Delete Booking?