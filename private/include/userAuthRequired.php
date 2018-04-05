<?php
if (!isset($_SESSION['authenticatedUser'])){
    header('Location: login.php');
}