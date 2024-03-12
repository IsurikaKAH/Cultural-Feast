<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Set Menus</title>
    <link rel="stylesheet" href="stylesnew.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="home.php" class="navbar-brand">
            <img src="assets/Cultural_Feast_2.png" height="28" alt="CoolBrand">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="home.php" class="nav-item nav-link active">Home</a>
                <a href="tags.php" class="nav-item nav-link">Tags</a>
                <a href="add_recipe.php" class="nav-item nav-link">Add Recipe</a>
                <a href="menus.php" class="nav-item nav-link">Menus</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
<h2 class="font-weight-bold mb-4">All Menus</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="Menus/menu1.html">
                <img src="assets/menu.avif" alt="Menu 1" class="img-fluid">
                <h4 class="text-center mt-2">Menu 1</h4>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="Menus/menu2.html">
                <img src="assets/menu.avif" alt="Menu 2" class="img-fluid">
                <h4 class="text-center mt-2">Menu 2</h4>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="Menus/menu3.html">
                <img src="assets/menu.avif" alt="Menu 3" class="img-fluid">
                <h4 class="text-center mt-2">Menu 3</h4>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="Menus/menu4.html">
                <img src="assets/menu.avif" alt="Menu 4" class="img-fluid">
                <h4 class="text-center mt-2">Menu 4</h4>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="Menus/menu5.html">
                <img src="assets/menu.avif" alt="Menu 5" class="img-fluid">
                <h4 class="text-center mt-2">Menu 5</h4>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="Menus/menu6.html">
                <img src="assets/menu.avif" alt="Menu 6" class="img-fluid">
                <h4 class="text-center mt-2">Menu 6</h4>
            </a>
        </div>
    </div>
</div>

<footer class="page-footer mt-5">
    <p>&copy; <span id="date"></span> <span class="footer-logo">CulturalFeast</span> Built by Group 21 || Ethnic Cohesion & Social Harmony</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rhqzI5GNAR7GPELrI93lLwIVlMlOlq5eP9JqGVj5F7Opq8" crossorigin="anonymous"></script>
</body>
</html>
