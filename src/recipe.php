<?php
include 'connect.php'; // Include the database connection file

// Your PHP code for retrieving and displaying recipes goes here
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include Bootstrap JavaScript (Popper.js is required)
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Recipes</title>
</head>
</head>
<body>
    <!-- Header and navigation bar (if needed) -->
    <!-- You can use your existing header code here -->

    <header class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="image/mylogo.png" alt="Logo" width="200">
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
                <div class="input-group mb-3">
                    <input class="form-control" name="recipeName" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit" name="search">Search</button>
                </div>
            </form>
        </div>
    </header>

    <div id="recipe-grid-view-container">
        <h1>Recipes</h1>
            <?php
                // Fetch recipes from the database
                $sql = "SELECT RecipeID, RecipeName, ImageURL FROM Recipes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output the recipes as a grid of clickable images
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="recipe-card">';
                        echo '<a href="view_recipe.php?recipe_id=' . $row["RecipeID"] . '">';
                        echo '<img src="' . $row["ImageURL"] . '" alt="' . $row["RecipeName"] . '">';
                        echo '<h5>' . $row["RecipeName"] . '</h5>';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo "No recipes found.";
                }
            mysqli_close($conn); // Close the database connection
            ?>
    </div>

    <!-- Footer and other page content (if needed) -->
    <footer>
        <p>&copy; 2023 Get Cooking</p>
    </footer>
</body>
</html>
