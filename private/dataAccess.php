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
function addFlightType($departurePoint, $destination, $departureTime, $day, $duration, $type) {
    global $db;
    $sql = 'INSERT INTO flightType (departurePoint, destination, departureTime, duration, day, type)
                VALUE (:departurePoint, :destination, :departureTime, :duration, :day, :type)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':departurePoint', $departurePoint);
    $stmt->bindParam(':destination', $destination);
    $stmt->bindParam(':departureTime', $departureTime);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':day', $day);
    $stmt->bindParam(':type', $type); // Should really be able to work this out but would require database changes
    $stmt->execute();
}

// ! Add Flight(s)
function addFlights($endDate) {
    global $db;
    $startDate = strtotime(date("Y-m-d")); // Convert date to Unix timestamp (easy to compare which date is newer/older)
    $endDate = strtotime($endDate);
    $flightTypes = getFlightTypes("All", "All");

    foreach ($flightTypes as $flightType) {
        for ($i = strtotime($flightType->day, $startDate); $i <= $endDate; $i = strtotime('+1 week', $i)) {
            addFlight($flightType, date('Y-m-d', $i));
        }
    }
}

function addFlight($flightType, $date) {
    global $db;
    $sql = 'INSERT IGNORE INTO flight (departurePoint, destination, date, departureTime, duration, day, type)
                VALUE (:departurePoint, :destination, :date, :departureTime, :duration, :day, :type)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':departurePoint', $flightType->departurePoint);
    $stmt->bindParam(':destination', $flightType->destination);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':departureTime', $flightType->departureTime);
    $stmt->bindParam(':duration', $flightType->duration);
    $stmt->bindParam(':day', $flightType->day);
    $stmt->bindParam(':type', $flightType->type); // Should really be able to work this out but would require database changes
    $stmt->execute();
}

// Add Administrator

// -- Customer --
// ! Register
function registerCustomer($firstName, $lastName, $email, $password) {
    global $db;
    $sql = 'INSERT INTO customer (firstName, lastName, email, password)
            VALUES (:firstName, :lastName, :email, :password)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    // Store an encrypted version of the password
    $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    $stmt->execute();
    return $stmt->rowCount() == 1;
}

//! Add Booking

// ------ READ/SELECT STATEMENTS ------

// -- Admin --
// ! Select Flight Types -- could add more search options
// Get Flight Types by Departure Point and/or Destination
function getFlightTypes($departurePoint, $destination) {
    global $db;
    if ($departurePoint == "All" && $destination == "All") {
        $sql = 'SELECT * FROM flightType
                ORDER BY type, departurePoint, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
        $stmt = $db->prepare($sql);
    } elseif ($departurePoint == "All") {
        $sql = 'SELECT * FROM flightType WHERE flightType.destination=:destination
                ORDER BY type, departurePoint, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':destination', $destination);
    } elseif ($destination == "All") {
        $sql = 'SELECT * FROM flightType WHERE flightType.departurePoint=:departurePoint
                ORDER BY type, destination, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':departurePoint', $departurePoint);
    } else {
        $sql = 'SELECT * FROM flightType WHERE flightType.departurePoint=:departurePoint AND flightType.destination=:destination
                ORDER BY type, departurePoint, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
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
    return array_shift($stmt->fetchAll(PDO::FETCH_CLASS, 'FlightType'));
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
function getFlights($departurePoint, $destination, $startDate, $endDate) {
    global $db;

    // If no start date is chosen then default to current date
    if ($startDate == NULL) {
        $startDate = date('Y-m-d');
    }

    // If no end date is chosen then default to two years ahead of current date
    if ($endDate == NULL) {
        $endDate = date('Y-m-d', strtotime('+24 Months'));
    }

    // Lengthy function due to range of options - could break down into smaller functions?
    if ($departurePoint == "All" && $destination == "All") {
        $sql = 'SELECT * FROM flight
                WHERE date>=:startDate AND date<=:endDate
                ORDER BY type, departurePoint, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);
    } elseif ($departurePoint == "All") {
        $sql = 'SELECT * FROM flight WHERE flight.destination=:destination
                ORDER BY type, departurePoint, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':destination', $destination);
    } elseif ($destination == "All") {
        $sql = 'SELECT * FROM flight WHERE flight.departurePoint=:departurePoint
                ORDER BY type, destination, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':departurePoint', $departurePoint);
    } else {
        $sql = 'SELECT * FROM flight WHERE flight.departurePoint=:departurePoint AND flight.destination=:destination
                ORDER BY type, departurePoint, FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':departurePoint', $departurePoint);
        $stmt->bindParam(':destination', $destination);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Flight');
}

// Get a single Flight using the surrogate Id
function getFlightById($flightId) {
    global $db;
    $sql = 'SELECT * FROM flight WHERE flight.flightId=:flightId';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':flightId', $flightId);
    $stmt->execute();
    return array_shift($stmt->fetchAll(PDO::FETCH_CLASS, 'Flight'));
}

// -- Customer --

// Check if email has been used, return true if it has not (and is good to use)
function checkEmailExists($email) {
    global $db;
    $sql = 'SELECT COUNT(*) FROM customer WHERE email = :email'; // TODO move to dataAccess
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetchColumn() != 0;
}

// ------ UPDATE STATEMENTS ------

// -- Admin --
// ! Update Flights
// Update Flight Details
function updateFlight($flightId, $departurePoint, $destination, $date, $day, $departureTime, $duration, $type) {
    global $db;

    // Update where surrogate ID = flightID
    $sql = "UPDATE flight
    SET departurePoint=:departurePoint, destination=:destination, date=:date, day=:day, departureTime=:departureTime, duration=:duration, type=:type
    WHERE flightId=:flightId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':departurePoint', $departurePoint);
    $stmt->bindParam(':destination', $destination);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':day', $day); // Consider trying to automate this part - otherwise date and day could be conflicting
    $stmt->bindParam(':departureTime', $departureTime);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':flightId', $flightId);
    $stmt->execute();
}

// ! Update Flight Types

// Update Single Flight Type
function updateFlightType($flightTypeId, $departurePoint, $destination, $day, $departureTime, $duration, $type) {
    global $db;

    // Update where surrogate ID = flightTypeID
    $sql = "UPDATE flightType
    SET departurePoint=:departurePoint, destination=:destination, day=:day, departureTime=:departureTime, duration=:duration, type=:type
    WHERE flightTypeId=:flightTypeId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':departurePoint', $departurePoint);
    $stmt->bindParam(':destination', $destination);
    $stmt->bindParam(':day', $day);
    $stmt->bindParam(':departureTime', $departureTime);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':flightTypeId', $flightTypeId);
    $stmt->execute();
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

// ! Delete FLight - only allow for flights selected in the future
function deleteFlight($flightId) {
    global $db;
    $sql = 'DELETE FROM flight WHERE flightId=:flightId LIMIT 1';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':flightId', $flightId);
    $stmt->execute();
}


// Delete Booking?