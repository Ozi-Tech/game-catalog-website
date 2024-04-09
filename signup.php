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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User already exists.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        if ($stmt->execute()) {
            header("Location: login.php");
            // Redirect to login page or somewhere else
            // header("Location: login.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!-- HTML for signup page -->
<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Sign-up & Sign-in">
            
            <title>Signup</title>
            <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
        <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h2>Signup Form</h2>
            <form action="signup.php" method="post" id="signup-form">
                <table>
                    <tr>
                        <td><label for="username">Username: </label></td>
                        <td><input type="text" id="username" name="username" required></td>
                        <td><div class="error" id="nameError"></div></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input type="email" id="email" name="email" required></td>
                        <td><div class="error" id="emailError"></div></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td><input type="password" id="password" name="password" required></td>
                        <td><div class="error" id="passError"></div></td>
                    </tr>
                </table>
                <input type="submit" value="Sign Up"><br>
            </form>
            <p>Already have an account? <br> <a href="login.php">Login</a></p>
        </div>
        <script src="js/javaScript.js"></script>

    </body>
</html>
