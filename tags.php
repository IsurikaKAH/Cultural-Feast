<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="stylesnew.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('assets/recipes/recipe-3.jpeg');
            background-size: cover; /* Adjust as needed */
            background-position: center; /* Adjust as needed */
            background-attachment: fixed; /* Ensures the background image remains fixed */
        }

        .category-heading {
            text-align: center;
            margin-bottom: 20px;
            color: black; /* Set the text color */
        }

        .category-container {
            background-color: #e3f2fd; /* Set your desired background color */
            padding: 15px;
            border-radius: 10px; /* Optional: Add rounded corners */
        }

        .card {
            background-color: #bbdefb; /* Set your desired background color for tags */
            border: 1px solid #2196F3; /* Optional: Add border color for tags */
            border-radius: 5px; /* Optional: Add rounded corners for tags */
        }
    </style>
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

// Define the categories
$categories = array('sinhala', 'tamil', 'muslim', 'burgher', 'other');
echo '<div class="container mt-3">';
echo '<h3 class="category-heading">Recipe Categories</h3>';

// Loop through each category
$cardsInRow = 3; // Number of cards in each row
$numCategories = count($categories);
$numRows = ceil($numCategories / $cardsInRow);

for ($row = 0; $row < $numRows; $row++) {
    echo '<div class="row mb-3">';
    
    // Loop through each card in the row
    for ($col = 0; $col < $cardsInRow; $col++) {
        $index = $row * $cardsInRow + $col;

        // Check if the category index is within the total number of categories
        if ($index < $numCategories) {
            $category = $categories[$index];
            
            echo '<div class="col-md-4">';
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'. ucfirst($category) .'</h5>';
            echo '<a href="view_category.php?category=' . $category . '">View All Recipes</a>';
            echo '<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    
    echo '</div>';
}

echo '</div>';

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
