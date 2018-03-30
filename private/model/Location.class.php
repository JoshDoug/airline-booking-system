<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 29/03/2018
 * Time: 21:16
 */

class Location {
    private $locationName;

    public function __get($name) {
        return $this->$name;
    }
}