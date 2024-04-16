<!-- resources/Views/bookNow.php -->

<?php


$allMovies = $movieController->getAllMovies();
$allHalls = $hallController->getAllHalls();

if (isset($_GET['movieId'])){
    $movieId = $_GET['movieId'];
    $singleMovie = $movieController->getMovieById($movieId);

}

if (isset($_GET['movieId'], $_GET['hallId'])){
    $hallId = $_GET['hallId'];
    $shows = $showController->getShowsByMovieAndHall($movieId, $hallId);
}

if (isset($_GET['movieId'], $_GET['hallId'], $_GET['showId'])){
    $showId = $_GET['showId'];
    $seats = $showSeatsController->getSeatsByShowId($showId);
    //var_dump($showSeats);

    $rows = [];
    foreach ($seats as $seat) {
        $rows[$seat->row][] = $seat;
    }

    if (isset($_SESSION['userId'])) {
        if (isset($_POST['addToCart'])) {
            $movieId = intval($_GET['movieId']);
            $hallId = intval($_GET['hallId']);
            $showId = intval($_GET['showId']);
            
            $seatIds = $_POST['seats'];
            $userId = $_SESSION['userId'];
            $seatIdsString = implode(',', $seatIds);
            $cartController->addToCart($movieId, $hallId, $showId, $seatIdsString, $userId);

            echo "<script>alert('Added to cart')</script>";
            echo "<script>window.location.href='index.php?page=cart';</script>";
        }
    } else {
        echo "<script>alert('Please sign in or sign up')</script>";
    }

}
    

?>
<div class="container">
    <form action="index.php" method="GET">
        <input type="hidden" name="page" value="bookNow">
        <div class="form-group my-3">
            <label for="movieSelect">Select a movie:</label>
            <select name="movieId" id="movieSelect" class="form-control" onchange="this.form.submit()">
                <option value="">Choose...</option>
                <?php foreach ($allMovies as $movie): ?>
                    <option value="<?php echo $movie->id; ?>"><?php echo $movie->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>


    <?php if (isset($_GET['movieId'])): ?>

        <!-- Infos and Cover Movie -->
        <div id="movieInfoContainer" class="row mb-5">
            <div id="imgContainer" class="col-md-4 d-flex justify-content-center">
                <img src="<?php echo ROOT; ?>/assets/img/movies/thumbs/<?php echo $singleMovie->imagePath; ?>" alt="<?php echo $singleMovie->title; ?>" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2><?php echo $singleMovie->title; ?></h2>
                <p><?php echo $singleMovie->description; ?></p>
                <p><strong>Director:</strong><?php echo $singleMovie->director; ?></p>
                <p><strong>Duration:</strong><?php echo $singleMovie->duration; ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Select Hall -->
    <?php if (isset($_GET['movieId'])): ?>
        <form action="index.php" method="GET">
            <input type="hidden" name="page" value="bookNow">
            <input type="hidden" name="movieId" value="<?php echo htmlspecialchars($_GET['movieId']); ?>">
            <div class="row mb-3">
                <div class="col-12">
                    <h3>Select Hall</h3>
                    <select id="hallSelect" name="hallId" class="form-select" aria-label="Selezione Sala" onchange="this.form.submit()">
                        <option>Select an Hall</option>
                        <?php foreach($allHalls as $hall): ?>
                            <option value="<?php echo $hall->id; ?>" <?php echo isset($_GET['hallId']) && $_GET['hallId'] == $hall->id ? 'selected' : ''; ?>>
                                <?php echo $hall->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <!-- Select show -->
    <?php if (isset($_GET['movieId']) && isset($_GET['hallId'])): ?>
        <form action="index.php" method="GET">
            <input type="hidden" name="page" value="bookNow">
            <input type="hidden" name="movieId" value="<?php echo htmlspecialchars($_GET['movieId']); ?>">
            <input type="hidden" name="hallId" value="<?php echo htmlspecialchars($_GET['hallId']); ?>">
            
            <div class="row mb-3">
                <div class="col-12">
                    <h3>Available Shows</h3>
                    <?php if (empty($shows)): ?>
                        <p>No shows available for the selected movie and hall.</p>
                    <?php else: ?>
                        <?php foreach($shows as $show): ?>
                        <article class="mb-2">
                            <h4><?php echo $show->show_date; ?></h4>
                            <div class="d-flex flex-wrap">
                                <label class="btn btn-outline-primary m-1">
                                <input type="radio" name="showId" value="<?php echo $show->id; ?>" class="me-2" onchange="this.form.submit();"><?php echo $show->show_time; ?>
                                </label>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    <?php endif; ?>


    <!-- Select Place Section -->
    <?php if (isset($_GET['movieId']) && isset($_GET['hallId']) && isset($_GET['showId'])): ?>
        <form id="formChooseShowAndSeat" action="" method="POST" >
            <input type="hidden" name="movieId" value="<?php echo htmlspecialchars($_GET['movieId']); ?>">
            <input type="hidden" name="hallId" value="<?php echo htmlspecialchars($_GET['hallId']); ?>">
            <input type="hidden" name="showId" value="<?php echo htmlspecialchars($_GET['showId']); ?>">

            <div class="text-center mb-4">
                <h3 class="mb-3">Select Your Seats</h3>
                <div class="screen mb-2">Screen</div>
                <div class="container">
                    <?php foreach ($rows as $row => $seats): ?>
                        <div class="d-flex justify-content-around mb-2">
                            <?php foreach ($seats as $seat): ?>
                                <label class="btn btn-outline-primary m-1 <?php echo $seat->is_booked ? 'disabled' : ''; ?>">
                                    <?php echo $seat->row . $seat->seat_number; ?>
                                    <input type="checkbox" name="seats[]" value="<?php echo $seat->id; ?>" class="seat-checkbox visually-hidden" aria-label="Seat <?php echo $seat->row . $seat->seat_number; ?>" <?php echo $seat->is_booked ? 'disabled' : ''; ?>>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" name="addToCart" class="btn btn-primary mb-4">Add to Cart</button>
                </div>
            </div>
        </form>

    <?php endif; ?>
</div>