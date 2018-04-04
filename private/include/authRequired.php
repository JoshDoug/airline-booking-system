<?php
// The login page is relative for each, so the same include should be usable
if (!isset($_SESSION['authenticatedCustomer']) || !isset($_SESSION['authenticatedCustomer'])){
    header('Location: login.php');
}