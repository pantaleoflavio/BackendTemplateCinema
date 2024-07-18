<!-- resources/Views/admin/manageWeeklyShows.php -->
<?php

$allShows = $showController->getAllShowWithMovieHallAndSeats();

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
                    <td>
                        <a href="editShow.php?showId=<?php echo $show->id; ?>" class="btn btn-primary">Modifica</a>
                        <a href="deleteShow.php?showId=<?php echo $show->id; ?>" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=addWeeklyShow" class="btn btn-success">Aggiungi Spettacolo</a>
</main>
