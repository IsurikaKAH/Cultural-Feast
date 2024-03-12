<?php
// Include database connection code here
$conn = mysqli_connect("localhost", "root", "", "recipe_website");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add comment code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $recipe_id = $_POST["recipe_id"];
    $comment = $_POST["comment"];

    $sql = "INSERT INTO comments (user_id, recipe_id, comment) VALUES ('$user_id', '$recipe_id', '$comment')";

    if (mysqli_query($conn, $sql)) {
        echo "Comment added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
