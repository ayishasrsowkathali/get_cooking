<?php
// Path: my_account.php
include 'connect.php'; // Include the database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include Bootstrap JavaScript (Popper.js is required) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Include Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <title> My Account</title>
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="image\mylogo.png" alt="Logo" width="200">
            </a>
            <!-- Navigation Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="recipe.php">Recipes </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="metric.php"> Metrics </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userpage.php">
                    <i class="fa fa-star"></i> Favorites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my_account.php">
                        <i class="fa fa-fw fa-user"></i> My Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
            </ul>
            <form method="POST" action="search.php" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </header>

    <!-- Show username, Email and an option to change password -->
    <div id = "user-details-container">
    <?php
        // Include your database connection code here (e.g., connect to the database using mysqli or PDO)

        // Assuming you've connected to the database, you can retrieve the user's data
        session_start(); // Assuming you use sessions to track logged-in users

        if(isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];

            // Use prepared statements to prevent SQL injection
            $sql = "SELECT full_name, email FROM Users WHERE id = ?";
            $stmt = mysqli_prepare($connection, $sql);
            
            if ($stmt) {
                // Bind the user ID to the query
                mysqli_stmt_bind_param($stmt, "i", $userId);
                
                // Execute the query
                mysqli_stmt_execute($stmt);
                
                // Bind the result variables
                mysqli_stmt_bind_result($stmt, $fullName, $email);
                
                if (mysqli_stmt_fetch($stmt)) {
                    // Display the user's name and email
                    echo "Name: " . htmlspecialchars($fullName) . "<br>";
                    echo "Email: " . htmlspecialchars($email);
                } else {
                    echo "User not found";
                }
                
                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                // Handle SQL query preparation error
                echo "Error in SQL query preparation";
            }
            
            // Close the database connection
            mysqli_close($connection); // Replace $connection with your database connection variable
        } else {
            echo "User not logged in";
        }
        ?>

    </div>
</body>
</html>
