<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 29/03/2018
 * Time: 18:25
 */

class Flight {
    private $flightId;
    private $departurePoint;
    private $destination;
    private $date;
    private $departureTime;
    private $day;
    private $duration;
    private $type;

    public function __get($name) {
        return $this->$name;
    }
}