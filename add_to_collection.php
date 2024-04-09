<!-- Group Members: Ritika., Ekene Ndubueze, Michael Li
     File Name: Assignment 2
     Date Modified: April 4, 2024
     Description: A gaming catalog website to search through various games list and 
                  add them to the collection. Also the user has to sign-in or
                  sign-up to search through it -->
                  
<?php
// Start the session
session_start();
// Include the database connection file
include 'connect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_POST['game_id'])) {
    $userId = $_SESSION['id']; // Ensure you have user_id in your session
    $gameId = $_POST['game_id'];

    // Prevent duplicate entries
    $checkStmt = $conn->prepare("SELECT * FROM user_games WHERE user_id = ? AND game_id = ?");
    $checkStmt->bind_param("ii", $userId, $gameId);
    $checkStmt->execute();
    if ($checkStmt->get_result()->num_rows === 0) {
        $stmt = $conn->prepare("INSERT INTO user_games (user_id, game_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $userId, $gameId);
        if ($stmt->execute()) {
            echo "Game added to collection.";
        } else {
            echo "Error adding game to collection.";
        }
    } else {
        echo "Game already in collection.";
    }
} else {
    echo "User not logged in or game ID not provided.";
}
?>
