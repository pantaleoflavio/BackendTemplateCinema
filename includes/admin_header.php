<?php
    if($_SESSION['role'] !== 'admin'){
        echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
    }
    // Index for the tables in the admin pages
    $index = 1;
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

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <!-- Bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Personal Styles -->
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/public/css/index-admin.css" rel="stylesheet">

</head>
<body>
    <div class="container-fluid bg-light">
        <div class="row">
            <button class="btn btn-primary d-block d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">Menu</span>
            </button>
            
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
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
                            <a class="nav-link" href="<?php echo ROOT; ?>/index.php?page=admin&subPage=manageWeeklyShows">
                                <i class="fa-solid fa-ticket"></i> Weekliy Shows
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fa-brands fa-shopify"></i> Received Orders
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>