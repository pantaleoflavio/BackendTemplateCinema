<!-- resources/Views/admin/editMovie.php -->  

<?php
if (isset($_GET['movieId'])) {
    $movieId = $_GET['movieId'];
    $movie = $movieController->getMovieById($movieId);
    
    if (!$movie) {
        echo "<p>Il film non è stato trovato.</p>";
        exit;
    }

    if (isset($_POST['editMovie'])) {
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $release_date = $_POST['release_date'];
        $director = $_POST['director'];

        $success = $movieController->updateMovie($movieId, $title, $description, $duration, $release_date, $director);

        if ($success) {
            echo "<script>alert('Film aggiornato con successo');</script>";
        } else {
            echo "<script>alert('Errore durante l'aggiornamento del film');</script>";
        }

        // Dopo l'aggiornamento, aggiorna anche l'oggetto $movie con i nuovi dati
        $movie = $movieController->getMovieById($movieId);
    }
} else {
    echo "<script>alert('ID del film non specificato');</script>";
    exit;
}
?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Movie</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Movie title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($movie->title) ? htmlspecialchars($movie->title) : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required><?php echo isset($movie->description) ? htmlspecialchars($movie->description) : ''; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (in minutes):</label>
            <input type="number" class="form-control" id="duration" name="duration" value="<?php echo isset($movie->duration) ? $movie->duration : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date:</label>
            <input type="date" class="form-control" id="release_date" name="release_date" value="<?php echo isset($movie->releaseDate) ? $movie->releaseDate : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="director" class="form-label">Director:</label>
            <input type="text" class="form-control" id="director" name="director" value="<?php echo isset($movie->director) ? htmlspecialchars($movie->director) : ''; ?>" required>
        </div>
        <button type="submit" name="editMovie" class="btn btn-primary">Update Movie</button>
        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieList" class="btn btn-secondary">Back</a>
    </form>
</main>