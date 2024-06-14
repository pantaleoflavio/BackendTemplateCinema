<!-- resources/Views/admin/index.php -->
<?php
    $allShows = $showController->getAllShowWithMovieHallAndSeats();
    $allMovies = $movieController->getAllMovies();
    $userCount = count($userController->getAllUsers());

?>

<!-- Main content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row">
        <h1 class="d-flex justify-content-center text-uppercase mt-2">admin dashboard</h1>
    </div>
    <h4>View of shows</h4>
    <div id="ticketsSummary">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Show</th>
                        <th>Date and Hour</th>
                        <th>Hall</th>
                        <th>Total Seats</th>
                        <th>Available Seats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allShows as $show) : ?>
                        <tr>
                            <td><?php echo $index; ?></td>
                            <td><?php echo $show->name; ?></td>
                            <td><?php echo $show->show_date . " - " . $show->show_time; ?></td>
                            <td><?php echo $show->hall_name; ?></td>
                            <td><?php echo $show->total_seats; ?></td>
                            <td><?php echo $show->available_seats; ?></td>
                        </tr>
                    <?php
                        $index ++;
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>

    <!-- Film della Settimana -->
    <h4>Movies of the week</h4>
    <div id="weeklyMovies" class="row">
        <?php 
            $count = 0;
            foreach($allMovies as $movie) : 
                // Apri una nuova riga Bootstrap ogni volta che inizia una nuova riga
                if ($count % 4 == 0) {
                    echo '<div class="row">';
                }
        ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo ROOT; ?>/assets/img/movies/thumbs/<?php echo $movie->image_path; ?>" class="card-img-top" style="height: 250px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $movie->name; ?></h5>
                            <p class="card-text"><?php echo $movie->description; ?></p>
                            <a href="#" class="btn btn-primary">details</a>
                        </div>
                    </div>
                </div>
        <?php 
                // Chiudi la riga Bootstrap ogni volta che raggiungi la quarta card
                if ($count % 4 == 3 || $count == count($allMovies) - 1) {
                    echo '</div>';
                }
                $count++;
            endforeach; 
        ?>
    </div>

    <!-- Total users -->
    <h4>Total users</h4>
    <div id="totalUsers">
        <div class="alert alert-info" role="alert">
            Total number of users signed: <strong><?php echo $userCount; ?></strong>
        </div>
    </div>
</main>
</div>
</div>

