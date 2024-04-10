<?php
// Start the session
session_start();
// Include the database connection file
include 'connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$userId = $_SESSION['id'];

// Check for search parameter
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$isSearch = !empty($searchTerm); // Determine if this is a search operation

// Prepare the base SQL query
$sql = "SELECT g.id, g.title, g.image_path, g.description
        FROM games g
        JOIN user_games ug ON g.id = ug.game_id
        WHERE ug.user_id = ?";

// Append search condition if there is a search term
if ($isSearch) {
    $sql .= " AND g.title LIKE ?";
}

$stmt = $conn->prepare($sql);

// Bind parameters based on whether a search term is provided
if ($isSearch) {
    $searchTermLike = "%" . $searchTerm . "%";
    $stmt->bind_param("is", $userId, $searchTermLike);
} else {
    $stmt->bind_param("i", $userId);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!-- HTML for the dashboard page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/javaScript.js" defer ></script>
</head>
<body class="homepage">
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                     <li class="nav-right"><a href="dashboard.php"><?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                <?php endif; ?>
                <li style="position: absolute; top: 0; right: 0;">
                    <form action="search.php" class="searchform" method="GET">
                    <input type="search" name="search" class="searchbar" placeholder="Search">
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="dashboarduser">Welcome, <?php echo htmlspecialchars($username); ?>!</div>
        <div class="dashboarduser">This is your dashboard.</div>
</div>
        <div class="gamesgrid">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='game'>";
                    echo "<div><p class='gamet'>" . htmlspecialchars($row["title"]) . "</p></div>";
                    echo "<img class='pic' src='" . htmlspecialchars($row["image_path"]) . "' alt='" . htmlspecialchars($row["title"]) . "'>";
                    echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                    echo '<button class="remove-from-collection" data-game-id="' . $row['id'] . '">Remove from Collection</button>';
                    echo "</div>"; // End of the game div
                }
            } else {
                echo $isSearch ? "<p class='nothing'>No games in your collection match this search.</p>" : "<p class='nothing'>No games found in your collection.</p>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; Smile</p>
    </footer>
</body>
</html>
