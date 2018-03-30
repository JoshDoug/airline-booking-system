<?php
/**
 * Created by PhpStorm.
 * User: jds
 * Date: 29/03/2018
 * Time: 15:22
 */

class Administrator {
    private $adminId;
    private $password = ''; // No need to store this in an object when it's only getting checked at login - more secure
    private $firstName;
    private $lastName;
    private $companyEmail;

    public function __get($name) {
        return $this->$name;
    }
}