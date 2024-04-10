<?php
// Start the session
session_start();
// Include the database connection file
include 'connect.php';

// Process search
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    // Redirect back to index.php with search parameter
    $searchTerm = trim($_GET['search']);
    header("Location: index.php?search=" . urlencode($searchTerm));
    exit;
} else {
    // Redirect back if no search term is provided or if it's just whitespace
    header("Location: index.php");
    exit;
}
?>
