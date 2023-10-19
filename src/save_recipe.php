<?php
// Include your database connection code
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include Bootstrap JavaScript (Popper.js is required) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Include Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <title> Saved Recipes</title>
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
                    <a class="nav-link" href="recipe.php">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Metrics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <i class="fa fa-fw fa-user"></i>Login
                    </a>
                </li>
            </ul>
            <form method="POST" action="search.php" class="d-flex">
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button> -->
                <div class="input-group mb-3">
                    <input class="form-control" name="recipeName" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit" name="search">Search</button>
                </div>
            </form>
        </div>
    </header>

    <div id="recipe-details-container">
    <?php
        // Check if the user is logged in
        session_start(); // Start the session
        if (isset($_SESSION['user_id'])) {
            // User is logged in
            if (isset($_GET['recipe_id'])) {
                $recipe_id = $_GET['recipe_id'];
                $user_id = $_SESSION['user_id']; // Get the user's ID from the session

                // Check if the recipe is not already saved by the user
                $check_sql = "SELECT * FROM UserSavedRecipes WHERE UserID = $user_id AND RecipeID = $recipe_id";
                $check_result = $conn->query($check_sql);

                if ($check_result->num_rows == 0) {
                    // Insert the record into UserSavedRecipes table
                    $insert_sql = "INSERT INTO UserSavedRecipes (UserID, RecipeID) VALUES ($user_id, $recipe_id)";
                    if ($conn->query($insert_sql) === TRUE) {
                        echo "Recipe saved successfully!";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                } else {
                    echo "Recipe is already saved by this user.";
                }
            }
        } else {
            // User is not logged in, you can redirect to the login page
            header("Location: login.php");
            exit;
        }
        ?>

    </div>
</body>
</html>