<?php
// Start the session
session_start();
// Include the database connection file
include 'connect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_POST['game_id'])) {
    $userId = $_SESSION['id']; // Assuming you store user ID in session
    $gameId = $_POST['game_id'];

    // Prepare the SQL statement to remove the game from the user's collection
    $stmt = $conn->prepare("DELETE FROM user_games WHERE user_id = ? AND game_id = ?");
    $stmt->bind_param("ii", $userId, $gameId);
    if ($stmt->execute()) {
        echo "Game removed from collection.";
    } else {
        echo "Error removing game from collection.";
    }
} else {
    echo "User not logged in or game ID not provided.";
}
?>
