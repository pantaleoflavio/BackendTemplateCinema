<!-- resources/Views/admin/editWeeklyShow.php -->
<?php
if (isset($_GET['showId'])) {
    $show = $showController->getShowById($_GET['showId']);
    $movieTitle = $movieController->getMovieById($show->movieId)->title;
    $hallName = $hallController->getHallById($show->hallId)->name;

    if (isset($_POST['editWeeklyShow'])) {
        $showDate = $_POST['date'];
        $showTime = $_POST['time'];

        $result = $showController->updateShow($_GET['showId'], $showDate, $showTime);

        if ($result) {
            echo "<script>alert('Show edited successfully!');</script>";
            $show = $showController->getShowById($_GET['showId']);
        } else {
            echo "<script>alert('Errore durante l'aggiornamento dello show');</script>";
        }
        

    }
    


} else {
    echo "<script>alert('Show ID  not specified');</script>";
    exit;
}

 

?>

<!-- Main content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Weekly Show</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <h2>Movie: <?php echo $movieTitle; ?></h2>
        </div>
        <div class="mb-3">
            <h2>Hall: <?php echo $hallName; ?></h2>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Choose Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $show->showDate; ?>" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Choose Hour:</label>
            <input type="time" class="form-control" id="time" name="time" value="<?php echo $show->showTime; ?>" required>
        </div>

        <button type="submit" name="editWeeklyShow" class="btn btn-primary">Edit Show</button>
    </form>
</main>