<!-- resources/Views/admin/manageWeeklyShows.php -->
<?php

$allShows = $showController->getAllShowWithMovieHallAndSeats();

if (isset($_POST['deleteShow']) && isset($_POST['showId'])) {
    $result = $showController->deleteShowById($_POST['showId']);
    
    if ($result) {
        echo "<script>alert('Show deleted successfully');</script>";
        echo "<script>window.location.href='" . ROOT . "/index.php?page=admin&subPage=manageWeeklyShows'</script>";
    } else {
        echo "<script>alert('Failed to delete show');</script>";
    }
}

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1 class="mt-3">Gestione Spettacoli Settimanali</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Film</th>
                    <th>Data e Ora</th>
                    <th>Sala</th>
                    <th>Posti Totali</th>
                    <th>Posti Disponibili</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allShows as $index => $show): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $show->name; ?></td>
                    <td><?php echo $show->show_date . ' ' . $show->show_time; ?></td>
                    <td><?php echo $show->hall_name; ?></td>
                    <td><?php echo $show->total_seats; ?></td>
                    <td><?php echo $show->available_seats; ?></td>
                    <td class="d-flex flex-sm-column flex-md-row justify-content-between">
                        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=manageWeeklyShows&showId=<?php echo $show->id; ?>" class="btn btn-primary">Modify Show</a>
                        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=manageWeeklyShows&showId=<?php echo $show->id; ?>" class="btn btn-secondary">Modify Seats</a>
                        <form class="bg-danger text-center" method="post" action="<?php echo ROOT; ?>/index.php?page=admin&subPage=manageWeeklyShows" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                            <input type="hidden" name="showId" value="<?php echo $show->id; ?>">
                            <button type="submit" name="deleteShow" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=addWeeklyShow" class="btn btn-success">Aggiungi Spettacolo</a>
</main>
