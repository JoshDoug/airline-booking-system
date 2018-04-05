<?php
if (!isset($_SESSION['authenticatedAdmin'])){
    header('Location: login.php');
}