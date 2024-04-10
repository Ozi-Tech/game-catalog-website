<?php
$conn = new mysqli('localhost', 'root', '', 'videogame_catalog');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
