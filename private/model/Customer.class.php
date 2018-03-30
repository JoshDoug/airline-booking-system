<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 29/03/2018
 * Time: 15:40
 */

class Customer {
    private $customerId;
    private $firstName;
    private $lastName;
    private $email;
    private $password = ''; // No need to store this in an object when it's only getting checked at login - more secure

    public function __get($name) {
        return $this->$name;
    }
}