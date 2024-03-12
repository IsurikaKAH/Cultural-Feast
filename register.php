<?php
session_start();
// Include database connection code here
$conn = mysqli_connect("localhost", "root", "", "recipe_website");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Registration code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<!-- User registration form HTML here -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form method="POST" action="register.php">

        <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                <div class="d-flex align-items-center mb-3 pb-1">
                        <img src="./assets/Cultural_Feast_2.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                <img src="assets/main.jpeg"
                    class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                    alt="Sample photo">
                    
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                    <form class="px-md-2">

                    <div class="form-outline mb-4">
                        <input type="text" id="username" class="form-control" name="username" required/>
                        <label class="form-label" for="username">Name</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control" name="password" required/>
                        <label class="form-label" for="password">Password</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control form-control-lg" name="email" required/>
                    <label class="form-label" for="email">Email address</label>
                  </div>
                                     

                    
                    <button type="submit" class="btn btn-success btn-lg mb-1" value="Register">Register</button>

                    </form>

                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

    </form>
</body>
</html>
