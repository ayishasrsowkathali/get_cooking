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

    <!-- Bootstrap Carousel -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/chickenparmesan.png" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h3>Chicken Parmesan</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/chickenalfredo.png" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h3>Chicken Alfredo</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/chickentikkamasala.png" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h3> Chicken Tikka Masala</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/fishfry.png" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h3> Fish Fry</h3>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" ariahidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <footer>
        <p>&copy; 2023 Get Cooking</p>
    </footer>
</body>
</html>
