<?php
// Establish a database connection (same as in recipe.php)
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Include Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <title>View Recipe</title>
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

    <div id="recipe-details-container">
        <?php
            // Check if the 'recipe_id' query parameter is set
            if (isset($_GET['recipe_id'])) {
                // Get the RecipeID from the query parameter
                $recipe_id = $_GET['recipe_id'];
                
                // Fetch the recipe details from the database
                $sql = "SELECT * FROM Recipes WHERE RecipeID = $recipe_id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    // Display the full recipe details
                    echo '<h1>' . $row["RecipeName"] . '</h1>';

                    // Add the "Save Recipe" button
                    echo '<button id="save-recipe-button" class="btn btn-primary" data-recipeid="' . $recipe_id . '">Save Recipe</button>';

                    echo '<h2>Ingredients</h2>';
                    
                    // Fetch and display the ingredients for this recipe
                    $ingredients_sql = "SELECT IngredientName, Amount FROM Ingredients WHERE RecipeID = $recipe_id";
                    $ingredients_result = $conn->query($ingredients_sql);
                    
                    if ($ingredients_result->num_rows > 0) {
                        echo '<ul>';
                        while ($ingredient_row = $ingredients_result->fetch_assoc()) {
                            echo '<li>' . $ingredient_row["Amount"] . ' ' . $ingredient_row["IngredientName"] . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo 'No ingredients found for this recipe.';
                    }

                    echo '<h2>Instructions</h2>';
                    echo '<p class="recipe-instructions">' . nl2br($row["Instructions"]) . '</p>';
                } else {
                    echo "Recipe not found.";
                }
            } else {
                echo "Recipe ID not specified.";
            }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

