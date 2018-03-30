<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 29/03/2018
 * Time: 11:53
 */

class FlightType {

    // -- ACTIVE RECORD CODE --

    // -- ACTIVE RECORD CODE --

    private $departurePoint;
    private $destination;
    private $departureTime;
    private $duration;
    private $day;
    private $type; // Domestic or Europe

    public function __get($name) {
        return $this->$name;
    }
}