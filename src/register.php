<?php
require_once '../private/initialise.php';
// Customer can either register fresh and just create an account, OR can register using a previously booked flight a la Swiss Airways
// (No need to register when booking flight but to edit any details you need to create an account

// So need to check if the customer already has a password if they try to register via a booking

if (isset($_POST['registerNew'])) {
    $expected = ['firstName', 'lastName', 'email', 'password', 'confirm'];
    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value) {
        if (in_array($key, $expected)) {
            $$key = trim($value); // Use a variable variable (pretty cool)
            if (empty($$key)) {
                $errors = true;
            }
        }
    }
    // Proceed only if there are no errors
    if (!$errors) {
        if ($password === $confirm) {
            // Check that the email hasn't already been registered
            $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':kNumber', $kNumber);
            $stmt->execute();
            if ($stmt->fetchColumn() != 0) {
                $errors['failed'] = "kNumber is already registered. If this is your kNumber, then please log in, otherwise check you've entered your kNumber correctly.";
            } else {
                try {
                    $sql = 'INSERT INTO user (kNumber, fName, lName, kMail, pwd)
                            VALUES (:kNumber, :fName, :lName, :kMail, :pwd)';
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':kNumber', $kNumber);
                    $stmt->bindParam(':fName', $fName);
                    $stmt->bindParam(':lName', $lName);
                    $stmt->bindParam(':kMail', $kMail);
                    // Store an encrypted version of the password
                    $stmt->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
                    $stmt->execute();
                } catch (\PDOException $e) {
                    $error = $e->getMessage();
                }
                // The rowCount() method returns 1 if the record is inserted,
                // so redirect the user to the login page
                if ($stmt->rowCount()) {
                    header('Location: login.php');
                    exit;
                }
            }
        }
    }
} elseif (isset($_POST['registerBooking'])) {
    $expected = ['firstName', 'lastName', 'email', 'password', 'confirm'];
    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value) {
        if (in_array($key, $expected)) {
            $$key = trim($value); // Use a variable variable (pretty cool)
            if (empty($$key)) {
                $errors = true;
            }
        }
    }
    // Proceed only if there are no errors
    if (!$errors) {
        if ($password === $confirm) {
            // Check that the email hasn't already been registered
            $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':kNumber', $kNumber);
            $stmt->execute();
            if ($stmt->fetchColumn() != 0) {
                $errors['failed'] = "kNumber is already registered. If this is your kNumber, then please log in, otherwise check you've entered your kNumber correctly.";
            } else {
                try {
                    $sql = 'INSERT INTO user (kNumber, fName, lName, kMail, pwd)
                            VALUES (:kNumber, :fName, :lName, :kMail, :pwd)';
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':kNumber', $kNumber);
                    $stmt->bindParam(':fName', $fName);
                    $stmt->bindParam(':lName', $lName);
                    $stmt->bindParam(':kMail', $kMail);
                    // Store an encrypted version of the password
                    $stmt->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
                    $stmt->execute();
                } catch (\PDOException $e) {
                    $error = $e->getMessage();
                }
                // The rowCount() method returns 1 if the record is inserted,
                // so redirect the user to the login page
                if ($stmt->rowCount()) {
                    header('Location: login.php');
                    exit;
                }
            }
        }
    }
}

require_once(VIEW_ROOT . '/registerView.php');
?>