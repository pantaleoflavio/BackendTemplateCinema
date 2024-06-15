<!-- resources/Views/admin/trailer.php -->

<?php
    $movieTrailer = null;

    if (isset($_GET['movieId'])) {
        $movieId = $_GET['movieId'];
        $movie = $movieController->getMovieById($movieId);
        
        if ($movie && isset($movie->trailer)) {
            $movieTrailer = $movie->trailer;
        }

        if (isset($_POST['deleteTrailer'])) {
            $movieController->clearMovieTrailer($movieId);
            $movieTrailer = null;
            echo "<script>alert('Trailer eliminato con successo.');</script>";
            echo "<script>window.location.href = window.location.href;</script>";
        }

    } else {
        echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin'</script>";
    }


?>
<div class="container mt-4 col-md-9 col-lg-10">
    <h2>Manage Trailer</h2>
    <?php if($movieTrailer) : ?>
        <div class="mb-3">
            <video width="100%" controls>
                <source src="<?php echo ROOT; ?>/assets/videos/<?php echo $movieTrailer; ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    <?php else : ?>
        <div class="mb-3">
            <p>nessun trailer</p>
        </div>
    <?php endif; ?>
        <div  class="d-flex align-items-center justify-content-start">
            <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=trailerChange&movieId=<?php echo $movieId; ?>" class="btn btn-primary">Change Trailer</a>
            <form method="post" class="ms-2 me-2">
                <button type="submit" name="deleteTrailer" class="btn btn-danger">Delete Trailer</button>
            </form>
            <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieList" class="btn btn-secondary">Back</a>
    </div>
</div>

