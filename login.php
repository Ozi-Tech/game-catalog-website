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

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // or email, depending on your form
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, so start a new session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            
            // Redirect user to home page
            header("location: index.php");
            exit;
        } else {
            // Display an error message if password is not valid
            echo "The password you entered was not valid.";
        }
    } else {
        echo "No account found with that username.";
    }
    $stmt->close();
}
$conn->close();
?>

<!-- HTML for the login page -->
<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, inital-scale=1.0">
            <meta name="description" content="Login">
           
            <title>Login</title>
            <link rel="stylesheet" href="css/style.css">
            <script src="js/javaScript.js" defer ></script>
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
            <h2>Login Form</h2>
            <form action="login.php" method="post">
                <table>
                    <tr>
                        <td><label for="username">Username: </label></td>
                        <td><input type="text" id="username" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td><input type="password" id="password" name="password" required></td>
                    </tr>
                </table>
                <input type="submit" value="Login"> <br>  
            </form>
            <p>Don't have an account? <br> <a href="signup.php">Sign Up</a></p>
        </div>
    </body>
</html>

