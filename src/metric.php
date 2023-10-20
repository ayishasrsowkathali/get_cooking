<?php
include 'connect.php'; // Include the database connection file

// Your PHP code for retrieving and displaying recipes goes here
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
    <title>Get Cooking</title>
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
                    <a class="nav-link" href="metric.php">Metrics</a>
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

    <div id="metrics-container">
        <h1>Meausurement Conversion Chart</h1>

        <?php
            // Fetch measurement chart from the database
            $sql = "SELECT Cup, Ounces, MilliLiters, Tablespoons FROM measurements";
            $result = $conn->query($sql);

            // Display measurement chart
            if ($result->num_rows > 0) {
                echo "<table class='table table-striped table-hover'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>Cup</th>";
                echo "<th scope='col'>Ounces</th>";
                echo "<th scope='col'>MilliLiters</th>";
                echo "<th scope='col'>Tablespoons</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Cup"] . "</td>";
                    echo "<td>" . $row["Ounces"] . "</td>";
                    echo "<td>" . $row["MilliLiters"] . "</td>";
                    echo "<td>" . $row["Tablespoons"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "0 results";
            }
            mysqli_close($conn); // Close the database connection

        ?>
    </div>
    <footer>
        <p>&copy; 2023 Get Cooking</p>
    </footer>
</body>
</html>