<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Website</title>
    <link rel="stylesheet" href="stylesnew.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .btn {
            cursor: pointer;
            height: 40px;
        }

        .card-img-top {
        width: 100%;
        height: 200px; /* Adjust the height as per your design */
        object-fit: cover; /* Ensure the image covers the entire space */
        }
    </style>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="home.php" class="navbar-brand">
            <img src="assets/Cultural_Feast_2.png" height="28" alt="CoolBrand">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
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


<!-- header -->
<header class="hero">
        <div class="hero-container">
          <div class="hero-text">
            <h1>Cultural Feast</h1>
            <h4>One place to explore multicultural deliciousness</h4>
          </div>
        </div>
      </header>

    <div class="container mt-5 border-0">
        <h2 class="font-weight-bold mb-4">All Recipes</h2>
            <form class="d-flex" action="search.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search by recipe name" aria-label="Search" name="query">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <!-- Fetch and display recipes from the database -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        session_start();


        // Check if the user is not logged in
        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page
            header("Location: login.php");
            exit();
        }

        // Include database connection code here
        $conn = mysqli_connect("localhost", "root", "", "recipe_website");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch all recipes
        $sql = "SELECT * FROM recipes";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display recipe details
                //echo '<div class="card mb-4">';
                echo '<div class="col mb-4">';
                echo '<div class="card h-100">';
                echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                echo '<a href="recipe_details.php?id=' . $row['id'] . '" class="btn btn-primary">View Recipe</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No recipes found.</p>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
    </div>

    <!-- footer -->
    <br>
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">CulturalFeast</span> Built by Group 21 || Ethnic Cohession & Social Harmony
      </p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
