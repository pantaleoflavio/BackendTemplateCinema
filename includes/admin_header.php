<?php
    if($_SESSION['role'] !== 'admin'){
        echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/'</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Cinema App</title>

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

    <!-- Personal Styles -->
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/index-admin.css" rel="stylesheet">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <button class="btn btn-primary d-block d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">Menu</span>
            </button>
            
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo ROOT; ?>/index.php?page=home">
                                <i class="fas fa-home"></i> Main Site
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT; ?>/index.php?page=admin">
                                <i class="fa-solid fa-hammer"></i> Admin Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT; ?>/index.php?page=admin&subPage=userList">
                                <i class="fa-solid fa-user"></i> Users List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieList">
                                <i class="fa-solid fa-video"></i> Movies List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT; ?>/index.php?page=admin&subPage=hallList">
                                <i class="fa-solid fa-tv"></i> Halls List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT; ?>/index.php?page=admin&subPage=???">
                                <i class="fa-solid fa-ticket"></i> Weekliy Shows
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ROOT; ?>/index.php?page=admin&subPage=???">
                                <i class="fa-brands fa-shopify"></i> Received Orders
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>