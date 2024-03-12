<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="stylesnew.css">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="view.css">

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



<?php
session_start();
// Include database connection code here
$conn = mysqli_connect("localhost", "root", "", "recipe_website");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $category = mysqli_real_escape_string($conn, $_GET["category"]);

    // Perform the search in the recipes table for the selected category
    $sql = "SELECT * FROM recipes WHERE category = '$category'";
    $result = mysqli_query($conn, $sql);

    // Display recipes for the selected category as cards
    echo '<div class="container mt-3">';
echo '<header class="hero">';
echo '<div class="hero-container" style="background-color: rgba(0, 0, 0, 0.5);">';
echo '<div class="hero-text">';
echo '<h3>' . ucfirst($category) . ' Recipes</h3>';
echo '</div>';
echo '</div>';
echo '</header>';



    if (mysqli_num_rows($result) > 0) {
        echo '<div class="card-container">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['name'] . '</h5>';
            echo '<p class="card-text">' . $row['description'] . '</p>';
            echo '<a href="recipe_details.php?id=' . $row['id'] . '" class="btn btn-primary">View Recipe</a>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo '<p>No recipes found for ' . ucfirst($category) . '</p>';
    }

    echo '</div>';
}

mysqli_close($conn);
?>


<!-- footer -->
<br>
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">CulturalFeast</span> Built by Group 21 || Ethnic Cohession & Social Harmony
      </p>
    </footer>

</body>
</html>