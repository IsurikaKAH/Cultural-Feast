<?php
// Include necessary files here if needed

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email entered by the user
    $email = $_POST["email"];

    // Include database connection code here
    $conn = mysqli_connect("localhost", "root", "", "recipe_website");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch all recipes
    $sql = "SELECT email FROM users";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    // Perform necessary validations on the email address
    // You can check if the email exists in your database, for example

    // If the email exists, you can send a password reset link to the user's email
    // You can use PHP's mail function or a third-party library to send emails

    // Example using PHP's mail function
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the link below to reset your password: <a href='your_reset_password_page.php'>Reset Password</a>";
        $headers = "From: your_email@example.com" . "\r\n" .
            "Content-Type: text/html; charset=UTF-8" . "\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Failed to send password reset link. Please try again later.";
        }}}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Include necessary CSS files here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="assets/forgot-password-concept-illustration_114360-1123.avif" alt="Image Description" class="img-fluid">
                            </div>

                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <!-- Your forgot password form content here -->
                                    <h5 class="font-weight-bold" style="letter-spacing: 1px;">Forgot Your Password?</h5>
                                    <p>Enter your email address below to reset your password.</p>
                                    <form method="POST" action="resetPassword.php">
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" class="form-control form-control-lg" name="email" required/>
                                            <label class="form-label" for="email">Email Address</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit" value="Reset Password">Reset Password</button>
                                        </div>
                                    </form>

                                    <!-- Link to login page -->
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Remembered your password? <a href="login.php" style="color: #393f81;">Login here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Include necessary JavaScript files here -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom scripts if any -->
</body>
</html>
