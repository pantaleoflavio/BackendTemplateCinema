<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>
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
 
}

?>

<main class="container my-4">
    <?php if (!isset($_GET['movieId'])): ?>
        <form action="" method="GET">
            <div class="form-group">
                <label for="movieSelect">Select a movie:</label>
                <select name="movieId" id="movieSelect" class="form-control" onchange="this.form.submit()">
                    <option value="">Choose...</option>
                    <?php foreach ($allMovies as $movie): ?>
                        <option value="<?php echo $movie->id; ?>"><?php echo $movie->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
    <?php else : ?>

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
        <form action="" method="GET">
            <input type="hidden" name="movieId" value="<?php echo $_GET['movieId']; ?>">
            <div class="row mb-3">
                <div class="col-12">
                    <h3>Select Hall</h3>
                    <select id="hallSelect" name="hallId" class="form-select" aria-label="Selezione Sala" onchange="this.form.submit()">
                        <option>Select an Hall</option>
                        <?php foreach($allHalls as $hall): ?>
                            <option value="<?php echo $hall->id; ?>" <?php echo isset($_GET['hallId']) && $_GET['hallId'] == $hall->id ? 'selected' : ''; ?>><?php echo $hall->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <!-- Select show -->
    <?php if (isset($_GET['movieId']) && isset($_GET['hallId'])): ?>
        <form action="" method="GET">
        <input type="hidden" name="movieId" value="<?php echo $_GET['movieId']; ?>">
        <input type="hidden" name="hallId" value="<?php echo $_GET['hallId']; ?>">
        
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
        <form id="formChooseShowAndSeat" action="checkout.php" method="POST">
            <input type="hidden" name="movieId" value="<?php echo $_GET['movieId']; ?>">
            <input type="hidden" name="hallId" value="<?php echo $_GET['hallId']; ?>">
            <input type="hidden" name="showId" value="<?php echo $_GET['showId']; ?>">

            <div class="text-center mb-4">
                <h3 class="mb-3">Select Your Seats</h3>
                <div class="screen mb-2">Screen</div>
                <div class="container">
                <!-- Row A -->
                <div class="d-flex justify-content-around mb-2">
                    <label class="btn btn-outline-primary m-1">A1<input type="checkbox" name="seats" value="A1_10.00" class="seat-checkbox visually-hidden" aria-label="Seat A1"></label>
                    <label class="btn btn-outline-primary m-1">A2<input type="checkbox" name="seats" value="A2_10.00" class="seat-checkbox visually-hidden" aria-label="Seat A2"></label>
                    <label class="btn btn-outline-primary m-1">A3<input type="checkbox" name="seats" value="A3_10.00" class="seat-checkbox visually-hidden" aria-label="Seat A3"></label>
                </div>
                <!-- Row B -->
                <div class="d-flex justify-content-around mb-2">
                    <label class="btn btn-outline-primary m-1">B1<input type="checkbox" name="seats" value="B1_10.00" class="seat-checkbox visually-hidden" aria-label="Seat B1"></label>
                    <label class="btn btn-outline-primary m-1">B2<input type="checkbox" name="seats" value="B2_10.00" class="seat-checkbox visually-hidden" aria-label="Seat B2"></label>
                    <label class="btn btn-outline-primary m-1">B3<input type="checkbox" name="seats" value="B3_10.00" class="seat-checkbox visually-hidden" aria-label="Seat B3"></label>
                </div>
                <!-- Row C -->
                <div class="d-flex justify-content-around mb-2">
                    <label class="btn btn-outline-primary m-1">C1<input type="checkbox" name="seats" value="C1_10.00" class="seat-checkbox visually-hidden" aria-label="Seat C1"></label>
                    <label class="btn btn-outline-primary m-1">C2<input type="checkbox" name="seats" value="C2_10.00" class="seat-checkbox visually-hidden" aria-label="Seat C2"></label>
                    <label class="btn btn-outline-primary m-1">C3<input type="checkbox" name="seats" value="C3_10.00" class="seat-checkbox visually-hidden" aria-label="Seat C3"></label>
                </div>
                </div>
            </div>

            <!-- Button Proceed -->
            <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </div>
            </div>
        </form>
    <?php endif; ?>
</main>
    
<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>