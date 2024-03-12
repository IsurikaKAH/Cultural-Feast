<?php
// Start the session
session_start();

// Include database connection code here
$conn = mysqli_connect("localhost", "root", "", "recipe_website");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipeId = $_POST["recipe_id"];

    // Retrieve user ID from session (replace 'user_id' with your actual session variable)
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    
    

    $commentText = mysqli_real_escape_string($conn, $_POST["comment_text"]);

    $sql = "INSERT INTO comments (recipe_id, user_id, comment_text) 
            VALUES ('$recipeId', '$userId', '$commentText')";

    if (mysqli_query($conn, $sql)) {
        header("Location: recipe_details.php?id=" . $recipeId);
        exit();
    } else {
        echo "Error adding comment: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
