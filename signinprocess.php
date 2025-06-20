<?php
require "database.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];

// Ensure no output has been sent before setting cookies or headers
ob_start();

// Query to check user credentials
$rs = database::s("SELECT * FROM user WHERE `email`='" . $email . "' AND `password`='" . $password . "' ");
$n = $rs->num_rows;

if ($n == 1) {
    $user = $rs->fetch_assoc();

    if ($user["status"] == "2") {
        echo "Sorry, you are blocked by admins.";
    } else {
        $_SESSION["user"] = $user;
        echo "Success";
        
        // Set cookies based on remember option
        if ($remember == "true") {
            setcookie("e", $email, time() + (60 * 60 * 24));  // 1 day
            setcookie("p", $password, time() + (60 * 60 * 24));  // 1 day
        } else {
            setcookie("e", "", time() - 3600);  // Expired cookie
            setcookie("p", "", time() - 3600);  // Expired cookie
        }
    }
} else {
    echo "Invalid details";
}

ob_end_flush();
