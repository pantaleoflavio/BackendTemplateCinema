<?php
    session_start();
    // Definisci la costante per la root del sito
    define('ROOT', "http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema");

    //INCLUDE DB AND CONTROLLER CLASSES
    include __DIR__ . "/../app/Core/db.classes.php";
    include __DIR__ . "/../app/Controllers/movie-controller.classes.php";
    include __DIR__ . "/../app/Controllers/hall-controller.classes.php";
    include __DIR__ . "/../app/Controllers/hall-images-controller.classes.php";
    include __DIR__ . "/../app/Controllers/show-controller.classes.php";
    include __DIR__ . "/../app/Controllers/user-controller.classes.php";
    include __DIR__ . "/../app/Controllers/show-seats-controller.classes.php";
    include __DIR__ . "/../app/Controllers/cart-controller.classes.php";
    include __DIR__ . "/../app/Controllers/bill-controller.classes.php";
    
    //ADD LIBRARIES FROM VENDOR AND FUNCTIONALITY CLASSES
    include __DIR__ . "/../app/Core/sendmailer.classes.php";
    require_once __DIR__ . '/../vendor/autoload.php';

    // INIT CONTROLLERS
    $movieController = new MovieController();
    $hallController = new HallController();
    $hallImagesController = new HallImagesController();
    $showController = new ShowController();
    $userController = new UserController();
    $showSeatsController = new ShowSeatsController();
    $cartController = new CartController();
    $billController = new billCOntroller();
    
    if(isset($_SESSION['userId'])){
        $cartItemCount = count($cartController->getCartProUser($_SESSION['userId']));
        $userImage = $userController->getSingleUser($_SESSION['userId'])->user_pic;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="<?php echo ROOT; ?>/favicon/favicon.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo ROOT; ?>/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?php echo ROOT; ?>/node_modules//bootstrap/dist/css/bootstrap.min.css">

    <!-- Swipe JS library -->
    <link rel="stylesheet" href="<?php echo ROOT; ?>/node_modules/swiper/swiper-bundle.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/index.css">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/single-movie.css">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/single-hall.css">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/book-now.css">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/checkout.css">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/signup.css">

    <title>Cinema App</title>
</head>
<body>
    <!-- Navigation Bar with logo and secondary menu -->
    <header>
        <div class="container logo-container">
            <a class="navbar-brand" href="<?php echo ROOT; ?>/resources/Views/index.php">
                <img src="<?php echo ROOT; ?>/assets/img/musa-vision-logo.png" alt="CINE VISION" height="40">
            </a>
        </div>
        <nav class="main-menu container navbar navbar-expand-lg">
            <!-- Toggler -->
                <ul class="navbar-nav ">
                    <!-- Elementi del menu principale -->
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo ROOT; ?>/resources/Views/index.php#movies-wall"><i class="fa-solid fa-film"></i>Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo ROOT; ?>/resources/Views/index.php#halls-wall"><i class="fa-solid fa-couch"></i>Halls</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo ROOT; ?>/resources/Views/index.php#booknow-hall"><i class="fa-solid fa-ticket"></i>Book now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo ROOT; ?>/resources/Views/index.php#contact"><i class="fa-solid fa-phone"></i>Contacts</a>
                    </li>
                </ul>
        </nav>
        <nav class="secondary-menu container navbar navbar-expand-lg">

            <!-- Contenitore del menu dropdown -->
            <div class="collapse navbar-collapse" id="navbarSecondary" style="background-color: #01011b; z-index: 99; margin-top:100px;">
                <ul class="navbar-nav d-flex justify-content-center align-items-center">
                    <?php if (!isset($_SESSION['userId'])) : ?>
                        <!-- no session user -->
                        <li id="signupButtonNavbar" class="nav-item">
                            <a class="nav-link signButton" href="<?php echo ROOT;?>/auth/signup.php">SIGNUP</a>
                        </li>
                        <li id="signinButtonNavbar" class="nav-item">
                            <a class="nav-link signButton" href="<?php echo ROOT;?>/auth/signin.php">SIGNIN</a>
                        </li>
                    <?php else : ?>
                        <!-- with session user -->
                        <li id="signoutButtonNavbar" class="nav-item">
                            <a href="<?php echo ROOT; ?>/auth/logout.php" class="nav-link signButton">SIGN OUT</a>
                        </li>
                        <li id="avatar-container" class="nav-item d-flex align-items-center justify-content-center">
                            <a href="<?php echo ROOT; ?>/user.php?id=<?php echo $_SESSION['userId']; ?>" class="nav-link">
                                <div class="avatar-header"><img src="<?php echo ROOT; ?>/assets/img/users/<?php echo $userImage; ?>" alt="User Image"></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo ROOT; ?>/cart.php" class="nav-link text-white">
                                <i class="fa fa-shopping-basket"></i> <span class="badge badge-primary"><?php echo $cartItemCount > 0 ? $cartItemCount : '0'; ?></span>
                            </a>
                        </li>
                        <?php if ($_SESSION['role'] === 'admin') : ?>
                            <li id="adminButtonNavbar" class="nav-item">
                                <a href="<?php echo ROOT; ?>/admin.php" class="nav-link signButton">Admin</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li class="nav-item d-flex align-items-center justify-content-center">
                        <a id="searchIcon" class="nav-link signButton" href="#"><i class="fa fa-search"></i></a> 
                        <input type="text" id="searchInput" style="display: none;" class="nav-link search-input" placeholder="Search your Movie...">
                    </li>
                </ul>
            </div>
            <!-- Bottone toggle per mobile -->
            <button class="navbar-toggler bg-primary" style="z-index: 99;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSecondary" aria-controls="navbarSecondary" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>



    </header>
