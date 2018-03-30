<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 29/03/2018
 * Time: 16:15
 */

class Booking {
    private $bookingReference;
    private $customerId;
    private $flightId;

    public function __get($name) {
        return $this->$name;
    }
}