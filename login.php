<?php
session_start();
// Include database connection code here
$conn = mysqli_connect("localhost", "root", "", "recipe_website");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: home.php");
            
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<!-- User login form HTML here -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form method="POST" action="login.php">
    <section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="assets/about.jpeg"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                    <form>

                    <div class="d-flex align-items-center mb-3 pb-1">
                        <img src="./assets/Cultural_Feast_2.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>

                    <h5 class="font-weight-bold" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="form-outline mb-4">
                        <input id="username" class="form-control form-control-lg" type="text" name="username"/>
                        <label class="form-label" for="username">Username</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control form-control-lg" name="password" required/>
                        <label class="form-label" for="password">Password</label>
                        <!-- Show/hide eye icon -->
                        <span toggle="#password" class="field-icon toggle-password">👁️</span>
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit" value="Login">Login</button>
                    </div>

                    <a class="small text-muted" href="forgotPassword.php">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php"
                        style="color: #393f81;">Register here</a></p>
                    </form>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('password');
            const togglePassword = document.querySelector('.toggle-password');

            togglePassword.addEventListener('click', function () {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                // Change eye icon based on password visibility
                this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
            });
        });
    </script>
</body>
</html>

