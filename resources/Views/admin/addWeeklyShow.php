<!-- resources/Views/admin/addWeeklyShows.php -->

<?php

$movieList = $movieController->getAllMovies();
$hallList = $hallController->getAllHalls();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addWeeklyShow']) ) {
    $movieId = htmlspecialchars(trim($_POST['movie']));
    $hallId = htmlspecialchars(trim($_POST['hall']));
    $showDate = htmlspecialchars(trim($_POST['date']));
    $showTime = htmlspecialchars(trim($_POST['time']));

    $numRows = htmlspecialchars(trim($_POST['num_rows']));
    $seatPerRow = htmlspecialchars(trim($_POST['seats_per_row']));
  
    $rows = range('A', 'Z');

    $result = $showController->addWeeklyShow($showDate, $showTime, $movieId, $hallId);

    if ($result) {
        $showId = $showController->getLastShowId();
        for ($rowIndex=0; $rowIndex < $numRows; $rowIndex++) { 
            $rowName = $rows[$rowIndex];
            for ($seatNum=1; $seatNum <= $seatPerRow; $seatNum++) { 
                $showSeatsController->addSeatsShow($showId, $seatNum, $rowName);
            }
        }



        echo "<script>alert('Show added successfully!');</script>";
        echo "<script>window.location.href='" . ROOT . "/index.php?page=admin&subPage=manageWeeklyShows'</script>";
    } else {
        echo "<script>alert('Error adding Show');</script>";
    }

}

?>

<!-- Main content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add Weekly Show</h1>
            </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="movie" class="form-label">Choose Movie:</label>
                        <select name="movie" id="movie">
                            <option value="">Choose...</option>
                            <?php  foreach($movieList as $movie): ?>
                                <option value="<?php echo $movie->id; ?>"><?php echo $movie->name; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hall" class="form-label">Choose hall:</label>
                        <select name="hall" id="hall">
                            <option value="">Choose...</option>
                            <?php  foreach($hallList as $hall): ?>
                                <option value="<?php echo $hall->id; ?>"><?php echo $hall->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Choose Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Choose Hour:</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_rows" class="form-label">How many rows do you want? (starting from A)</label>
                        <input type="number" class="form-control" id="num_rows" name="num_rows" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="seats_per_row" class="form-label">How many seats per row do you want? (minimun 1)</label>
                        <input type="number" class="form-control" id="seats_per_row" name="seats_per_row" min="1" required>
                    </div>

                    <button type="submit" name="addWeeklyShow" class="btn btn-primary">Add Movie</button>
                </form>
            


        </main>

