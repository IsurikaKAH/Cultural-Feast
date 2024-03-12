<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="stylesnew.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
    .swiper-image {
        max-width: 100%; /* Set the maximum width of the image */
        height: 700px; /* Allow the image height to adjust according to the aspect ratio */
    }
    .button-container {
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    }

    .btn-primary {
        margin-right: 10px;
    }

    
    .logo-container{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 120px;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 1; /* Ensure the overlay is above the image */
    }

    .logo1 {
        position: absolute;
        width:460px;
        top: 10px;
        left: 400px;
        z-index: 2; /* Ensure the logo is above the overlay */
    }


</style>

</head>
<body>

<header class="header-area header-sticky" style="background-color:white;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.php" class="logo">
                        <img src="assets/Cultural_Feast_2.png" height="28" alt="CoolBrand">
                    </a>
                    <ul class="nav">
                        <li><a href="index.php" class="active" style="color:black;">Home</a></li>
                        <li><a href="login.php" style="color:black;">Log In</a></li>
                        <li><a href="register.php" style="color:black;">Sign Up</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="swiper-container">
    <div class="swiper-wrapper">
    <div class="swiper-slide">
            <img src="assets/recipes/recipe-4.jpeg" alt="Image 1" class="swiper-image">
            <div class="logo-container">
                <img src="assets/Cultural_Feast_2.png" height="96" alt="CoolBrand" class="logo1">
                <div class="overlay"></div>
            </div>
            <div class="button-container">
                <a href="login.php" class="btn btn-primary">Get Started</a>
            </div>
        </div>
        <div class="swiper-slide">
            <img src="assets/recipes/recipe-3.jpeg" alt="Image 1" class="swiper-image">
            <div class="logo-container">
                <img src="assets/Cultural_Feast_2.png" height="96" alt="CoolBrand" class="logo1">
                <div class="overlay"></div>
            </div>
            <div class="button-container">
                <a href="login.php" class="btn btn-primary">Get Started</a>
            </div>
        </div><div class="swiper-slide">
            <img src="assets/recipes/recipe-2.jpeg" alt="Image 1" class="swiper-image">
            <div class="logo-container">
                <img src="assets/Cultural_Feast_2.png" height="96" alt="CoolBrand" class="logo1">
                <div class="overlay"></div>
            </div>
            <div class="button-container">
                <a href="login.php" class="btn btn-primary">Get Started</a>
            </div>
        </div><div class="swiper-slide">
            <img src="assets/recipes/recipe-1.jpeg" alt="Image 1" class="swiper-image">
            <div class="logo-container">
                <img src="assets/Cultural_Feast_2.png" height="96" alt="CoolBrand" class="logo1">
                <div class="overlay"></div>
            </div>
            <div class="button-container">
                <a href="login.php" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>


<footer class="page-footer">
    <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">CulturalFeast</span> Built by Group 21 || Ethnic Cohession & Social Harmony
    </p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rhqzI5GNAR7GPELrI93lLwIVlMlOlq5eP9JqGVj5F7Opq8" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
        delay: 5000, // 5000 milliseconds = 5 seconds
    },
    });
</script>

</body>
</html>
