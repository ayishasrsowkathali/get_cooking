<?php
include 'connect.php'; // Include the database connection file

// Your PHP code for retrieving and displaying recipes goes here
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Include Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <title> Search Results</title>
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
                <div class="input-group mb-3">
                    <input class="form-control" name="recipeName" type="text" placeholder="Search" aria-label="Search for a recipe">
                    <button class="btn btn-outline-primary" type="submit" name="search">Search</button>
                </div>
            </form>
        </div>
    </header>

    <div class="container mt-4">        
        <?php
        // Check if the search form is submitted
        if (isset($_POST['search'])) { 
            $searchTerm = $_POST['recipeName'];
            // Query to retrieve recipes from the database
            $recipeSql = "SELECT RecipeID, RecipeName, Category, Instructions, ImageURL FROM Recipes WHERE RecipeName LIKE '%$searchTerm%'";
            $recipeResult = mysqli_query($conn, $recipeSql);
            


            if (mysqli_num_rows($recipeResult) > 0) {
                while ($recipeRow = mysqli_fetch_assoc($recipeResult)) {
                    echo '<div class="recipe">';
                    echo '<h2>' . $recipeRow['RecipeName'] . '</h2>';
                    echo '<p><strong>Category:</strong> ' . $recipeRow['Category'] . '</p>';

                    // Query to retrieve ingredients for this recipe
                    $ingredientSql = "SELECT * FROM Ingredients WHERE RecipeID = " . $recipeRow['RecipeID'];
                    $ingredientResult = mysqli_query($conn, $ingredientSql);

                    if (mysqli_num_rows($ingredientResult) > 0) {
                        echo '<p><strong>Ingredients:</strong></p>';
                        echo '<ul>';
                        while ($ingredientRow = mysqli_fetch_assoc($ingredientResult)) {
                            echo '<li>' . $ingredientRow['IngredientName'] . "\t-\t". $ingredientRow['Amount'] . '</li>';
                        }
                        echo '</ul>';
                    }

                    echo '<p><strong>Instructions:</strong><p>';
                    echo '<p>' . nl2br($recipeRow['Instructions']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No recipes found.</p>';
            }

            mysqli_close($conn); // Close the database connection
        }
        ?>
    </div>
</body>
</html>
