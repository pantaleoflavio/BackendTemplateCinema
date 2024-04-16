<?php
    // Definisci la costante per la root del sito
    define('ROOT', "http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema");
    
    session_start();

    require_once __DIR__ . '/vendor/autoload.php';

    //INCLUDE DB AND CONTROLLER CLASSES
    use App\Controllers\MovieController;
    use App\Controllers\HallController;
    use App\Controllers\HallImagesController;
    use App\Controllers\UserController;
    use App\Controllers\ShowController;
    use App\Controllers\ShowSeatsController;
    use App\Controllers\CartController;
    use App\Controllers\billCOntroller;

    // INIT CONTROLLERS
    $movieController = new MovieController();
    $hallController = new HallController();
    $hallImagesController = new HallImagesController();
    $userController = new UserController();
    $showSeatsController = new ShowSeatsController();
    $showController = new ShowController();
    $cartController = new CartController();
    $billController = new billCOntroller();
    
    //INIT Sendmailer
    use App\Core\SendMailer;
    $sendMailer = new SendMailer();

    // Variable for route managing
    $page = $_GET['page'] ?? 'home';

    // Mappa la route vuota o 'home' alla vista home.php
    if ($page === '' || $page === 'home') {
        $page = 'home';
    }

    // Include l'header
    require_once "includes/header.php";

    // Contenuto principale
    echo '<main class="">';

    switch ($page) {
        case 'signin':
        case 'signup':
        case 'logout':
            // Pagine di autenticazione
            include_once __DIR__ . "/resources/Views/auth/" . $page . ".php";
            break;
    
        case 'admin':
            // Pagine di amministrazione
            include_once __DIR__ . "/resources/Views/admin/" . $page . ".php";
            break;

        case 'home':
            include_once __DIR__ . "/resources/Views/home.php";
            break;
        default:
            // Routing generale
            if (file_exists(__DIR__ . "/resources/Views/" . $page . ".php")) {
                include_once __DIR__ . "/resources/Views/" . $page . ".php";
            } else {
                include_once __DIR__ . "/resources/Views/error/404.php";
            }
            break;
    }

    echo '</main>';

    // Include il footer
    include_once "includes/footer.php";
?>