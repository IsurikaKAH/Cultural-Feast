<?php
session_start();
// Include database connection code here
$conn = mysqli_connect("localhost", "root", "", "recipe_website");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add new recipe code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $preparation_time = $_POST["preparation_time"];
    
    // Image upload handling (you may need to modify this based on your requirements)
    $target_dir = "./uploads/"; // Specify your upload directory
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $image_path = $target_file;

    // Insert into recipes table
    $sql = "INSERT INTO recipes (name, category, description, image,preparation_time) 
            VALUES ('$name', '$category', '$description', '$image_path','$preparation_time')";

    if (mysqli_query($conn, $sql)) {
        $recipeId = mysqli_insert_id($conn); // Get the ID of the inserted recipe

        // Insert into ingredients table
        if (!empty($_POST['ingredients'])) {
            foreach ($_POST['ingredients'] as $ingredient) {
                $ingredient = mysqli_real_escape_string($conn, $ingredient);
                $sqlIngredient = "INSERT INTO ingredients (recipe_id, ingredient) 
                                 VALUES ('$recipeId', '$ingredient')";
                mysqli_query($conn, $sqlIngredient);
            }
        }

        // Insert into instructions table
        if (!empty($_POST['instructions'])) {
            foreach ($_POST['instructions'] as $instruction) {
                $instruction = mysqli_real_escape_string($conn, $instruction);
                $sqlInstruction = "INSERT INTO instructions (recipe_id, instruction) 
                                   VALUES ('$recipeId', '$instruction')";
                mysqli_query($conn, $sqlInstruction);
            }
        }

        
        ?>
        <script>
            alert("Recipe added successfully!");
        </script>

        <?php
    } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<!-- Add new recipe form HTML here -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link rel="stylesheet" href="stylesnew.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            var ingredientCounter = 1;
            var instructionCounter = 1;

            // Add a new ingredient input field
            $("#addIngredient").click(function(){
                ingredientCounter++;
                var newIngredientField = '<div><label for="ingredient' + ingredientCounter + '">Ingredient ' + ingredientCounter + ':</label><input type="text" name="ingredients[]" required><button class="removeField">Remove</button></div>';
                $("#ingredientFields").append(newIngredientField);
            });

            // Add a new instruction input field
            $("#addInstruction").click(function(){
                instructionCounter++;
                var newInstructionField = '<div><label for="instruction' + instructionCounter + '">Step ' + instructionCounter + ':</label><textarea name="instructions[]" required></textarea><button class="removeField">Remove</button></div>';
                $("#instructionFields").append(newInstructionField);
            });

            // Remove the ingredient or instruction input field
            $("#ingredientFields, #instructionFields").on("click", ".removeField", function(){
                $(this).parent().remove();
                // Adjust the counter based on the removed field type
                if ($(this).parent().find('textarea').length > 0) {
                    instructionCounter--;
                } else {
                    ingredientCounter--;
                }
            });
        });
    </script>
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
    <form method="POST" action="add_recipe.php" enctype="multipart/form-data">   
    <h3 class="font-weight-bold text-center" style="letter-spacing: 1px;">Add a New Recipe</h3>
            <div class="mb-3 border-0" >
                <label for="name" class="form-label" style="font-weight: bold;">Recipe Name:</label>
                <input type="text" class="form-control " name="name" required>
            </div>

            <div class="mb-3 border-0">
                <label for="category" class="form-label" style="font-weight: bold;">Category:</label>
                <select class="form-select" name="category" required>
                    <option value="sinhala">Sinhala</option>
                    <option value="tamil">Tamil</option>
                    <option value="muslim">Muslim</option>
                    <option value="burgher">Burgher</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="mb-3 border-0">
                <label for="description" class="form-label" style="font-weight: bold;">Description:</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>

            <div class="mb-3 border-0">
                <label for="image" class="form-label" style="font-weight: bold;">Image of the Food:</label>
                <input type="file" class="form-control form-control-sm" name="image" accept="image/*" required>
            </div>

            <div id="ingredientFields">
                <!-- Initial ingredient input field -->
                <div class="mb-3 border-0">
                    <label for="ingredients" class="form-label" style="font-weight: bold;">Ingredient 1:</label>
                    <input type="text" class="form-control" name="ingredients[]" required>
                </div>
            </div>

            <button type="button" class="btn btn-success" id="addIngredient">Add Ingredient</button>
            <br><br>
            <div id="instructionFields">
                <!-- Initial instruction input field -->
                <div class="mb-3 border-0">
                    <label for="instructions" class="form-label" style="font-weight: bold;">Step 1:</label>
                    <textarea class="form-control" name="instructions[]" required></textarea>
                </div>
            </div>

            <button type="button" class="btn btn-success" id="addInstruction">Add Instruction</button>
            <br><br>
            <div class="mb-3 border-0">
                <label for="preparation_time" class="form-label" style="font-weight: bold;">Preparation Time (minutes):</label>
                <input type="number" class="form-control" name="preparation_time" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Recipe</button>
      
    
    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rhqzI5GNAR7GPELrI93lLwIVlMlOlq5eP9JqGVj5F7Opq8" crossorigin="anonymous"></script>
</body>
</html>

