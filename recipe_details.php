<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="stylesnew.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

    
    <div class="container mt-5 border-0">
        <?php
        session_start();
        // Include database connection code here
        $conn = mysqli_connect("localhost", "root", "", "recipe_website");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if recipe ID is provided in the URL
        if (isset($_GET['id'])) {
            $recipeId = $_GET['id'];

            // Fetch the selected recipe details
            $sql = "SELECT * FROM recipes WHERE id = $recipeId";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Display recipe details
                echo '<h2 class="font-weight-bold mb-4">' . $row['name'] . '</h2>';
                echo '<img src="' . $row['image'] . '" class="img-fluid mb-4" alt="' . $row['name'] . '">';
                echo '<h6 class="font-weight-bold mb-4"> Preparation Time: ' . $row['preparation_time'] . ' minutes </h6>';
                echo '<p class="lead">' . $row['description'] . '</p>';
                echo '<h4>Ingredients:</h4>';
                echo '<ul>';
                
                // Fetch and display ingredients
                $sqlIngredients = "SELECT * FROM ingredients WHERE recipe_id = $recipeId";
                $resultIngredients = mysqli_query($conn, $sqlIngredients);

                while ($ingredient = mysqli_fetch_assoc($resultIngredients)) {
                    echo '<li>' . $ingredient['ingredient'] . '</li>';
                }

                echo '</ul>';

                echo '<h4>Instructions:</h4>';
                echo '<ol>';

                // Fetch and display instructions
                $sqlInstructions = "SELECT * FROM instructions WHERE recipe_id = $recipeId";
                $resultInstructions = mysqli_query($conn, $sqlInstructions);

                while ($instruction = mysqli_fetch_assoc($resultInstructions)) {
                    echo '<li>' . $instruction['instruction'] . '</li>';
                }

                echo '</ol>';
                
                // Additional details like preparation time can be displayed here

            } else {
                echo '<p>Recipe not found.</p>';
            }
        } else {
            echo '<p>Invalid recipe ID.</p>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    <!-- Add share buttons with Font Awesome icons -->
    <div class="mb-4">
        <button class="btn btn-primary me-2" onclick="shareOnFacebook()"><i class="fab fa-facebook-square"></i></button>
        <button class="btn btn-success me-2" onclick="shareOnWhatsApp()"><i class="fab fa-whatsapp-square"></i></button>
        <button class="btn btn-info" onclick="shareByEmail()"><i class="fas fa-envelope-square"></i></button>
    </div>



    <h4>Comments:</h4>
    
        <!-- Comment form -->
        <form method="POST" action="add_comment.php">
            <input type="hidden" name="recipe_id" value="<?php echo $recipeId; ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            <label for="comment_text" class="form-label">Add a Comment:</label>
            <textarea class="form-control" name="comment_text" required></textarea>
            <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
        </form>
    
        <br>
    <!-- Display existing comments -->
    <?php
    // Include database connection code here
    $conn = mysqli_connect("localhost", "root", "", "recipe_website");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sqlComments = "SELECT comments.*, users.username 
                    FROM comments 
                    JOIN users ON comments.user_id = users.id
                    WHERE recipe_id = $recipeId 
                    ORDER BY created_at DESC";
    $resultComments = mysqli_query($conn, $sqlComments);

    if (mysqli_num_rows($resultComments) > 0) {
        while ($comment = mysqli_fetch_assoc($resultComments)) {
            echo '<div class="border p-2 mb-2">';
            echo '<p class="mb-0">' . $comment['comment_text'] . '</p>';
            echo '<small class="text-muted">Posted by ' . $comment['username'] . ' on ' . $comment['created_at'] . '</small>';
            echo '</div>';
        }
    } else {
        echo '<p>No comments yet.</p>';
    }
    ?>
    </div>

    <!-- footer -->
    <br>
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">CulturalFeast</span> Built by Group 21 || Ethnic Cohession & Social Harmony
      </p>
    </footer>

    <script>
    function shareOnFacebook() {
        var url = window.location.href;
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url), '_blank');
    }

    function shareOnWhatsApp() {
        var url = window.location.href;
        window.open('whatsapp://send?text=' + encodeURIComponent(url), '_blank');
    }

    function shareByEmail() {
        var subject = 'Check out this recipe!';
        var body = 'Hey, I found this amazing recipe and wanted to share it with you. ' + window.location.href;
        window.location.href = 'mailto:?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
    }
</script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rhqzI5GNAR7GPELrI93lLwIVlMlOlq5eP9JqGVj5F7Opq8" crossorigin="anonymous"></script>

</body>
</html>
