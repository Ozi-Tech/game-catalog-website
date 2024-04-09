<!-- Group Members: Ritika., Ekene Ndubueze, Michael Li
     File Name: Assignment 2
     Date Modified: April 4, 2024
     Description: A gaming catalog website to search through various games list and 
                  add them to the collection. Also the user has to sign-in or
                  sign-up to search through it -->

<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("Location: login.php");
exit;
?>
