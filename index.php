<?php

// Start the session
session_start();

// Include the database connection file
include 'connect.php';

// Redirect to login page if user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
} 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1.0">
		<meta name="description" content="Home Page">
        <title>Home</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/javaScript.js" defer ></script>
    </head>
    <body class="homepage">
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if (!isset($_SESSION['username'])): ?>
                        <!-- Show these links only if the user is not logged in -->
                        <li><a href="login.php">Login</a></li>
                        <li><a href="signup.php">Signup</a></li>
                    <?php else: ?>
                        <!-- Show these links only if the user is logged in -->
                        <li><a href="dashboard.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php endif; 
                    ?>

                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-right"><a href="dashboard.php"><?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <?php endif; ?>
                    <li class="search_container" style="position: absolute; top: 0; right: 0;">
                        <form action="search.php" class="searchform" method="GET">
                            <input type="search" name="search" class="searchbar" placeholder="Search">
                        </form>
                    </li>
                    <?php
                        // Check for search parameter
                        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
                        $isSearch = !empty($searchTerm); // Determine if this is a search operation

                        // Dynamic SQL query based on search
                        $sql = "SELECT title, image_path, description FROM games";
                        if ($isSearch) {
                            $sql .= " WHERE title LIKE ?";
                        }

                        $stmt = $conn->prepare($sql);

                        if ($isSearch) {
                            $searchTermLike = "%" . $searchTerm . "%";
                            $stmt->bind_param("s", $searchTermLike);
                        }
                        $stmt->execute();
                        $result = $stmt->get_result();
                    ?>
                </ul>
            </nav>
        </header>
            <div class="banner">
                <image src="images/background.jpeg" class="bannerimage"></image>
            </div>
            <div class="gamesgrid">
                <?php
                    if ($isSearch) {
                        if ($result->num_rows > 0) {
                            // Display search results
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='game'>";
                                echo "<div><p class='gamet'>" . htmlspecialchars($row["title"]) . "</p></div>";
                                echo "<img class='pic' src='" . htmlspecialchars($row["image_path"]) . "' alt='" . htmlspecialchars($row["title"]) . "''>";
                                echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                                echo '<button class="add-to-collection" data-game-id="' . $row['id'] . '">Add to Collection</button>';
                                echo "</div>";
                            }
                        } else {
                            echo "0 results found";
                        }
                    } else {
                        // Your SQL query
                        $sql = "SELECT id, title, image_path, description FROM games";
                        $result = $conn->query($sql);
                    
                        // Check if there are results
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                // Start of the echo statement for displaying game title, image, and description
                                echo "<div class='game'>";
                                echo "<div><p class='gamet'>" . htmlspecialchars($row["title"]) . "</p></div>";
                                // Fixed: Ensure the image path is correctly inserted into the src attribute
                                echo "<img class='pic' src='" . htmlspecialchars($row["image_path"]) . "' alt='" . htmlspecialchars($row["title"]) . "'>";
                                echo "<p>" . htmlspecialchars($row["description"]) .  "</p>";
                                echo '<button class="add-to-collection" data-game-id="' . $row['id'] . '">Add to Collection</button>';
                                echo "</div>"; // End of the game div
                                
                            }
                        } else {
                            echo "0 results found";
                        }
                    }
                ?>
            </div>
        <footer>
            <p>&copy; Smile</p>
        </footer>
    </body>
</html>
