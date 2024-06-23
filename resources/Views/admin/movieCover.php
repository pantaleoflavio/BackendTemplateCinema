<!-- resources/Views/admin/movieImage.php -->

<?php

if (isset($_GET['movieId'])) {
    $movieId = $_GET['movieId'];
    $movie = $movieController->getMovieById($movieId);

    if ($movie && isset($movie->coverPath)) {
        $movieCover = $movie->coverPath;
    } else {
        $movieCover = null; 
    }

    if (isset($_POST['submitNewCover'])) {
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/BackendTemplateCinema/assets/img/movies/covers/";
        $fileName = basename($_FILES["newCover"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array(strtolower($fileType), ['jpeg', 'jpg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["newCover"]["tmp_name"], $targetFilePath)) {
                $movieController->updateMovieCover($movieId, $fileName);
                echo "<script>alert('Cover aggiornata con successo!');</script>";
                echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=movieCover&movieId=$movieId'</script>";
            } else {
                echo "<script>alert('Errore durante l'upload del file.');</script>";
            }
        } else {
            echo "<script>alert('Solo file JPEG, JPG, PNG, e GIF sono permessi.');</script>";
        }
    }

    if (isset($_POST['deleteCover'])) {
        if ($movieController->clearMovieCover($movieId)) {
            echo "<script>alert('Cover eliminata con successo!');</script>";
            echo "<script>window.location.href = 'http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=movieCover&movieId=$movieId'</script>";
        } else {
            echo "<script>alert('Errore durante l'eliminazione della cover.');</script>";
        }
    }

} else {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin'</script>";
}
?>

<div class="container mt-4 col-md-9 col-lg-10">
    <h2>Gestione Cover</h2>
    <?php if ($movieCover) : ?>
        <div class="mb-3">
            <img src="<?php echo ROOT; ?>/assets/img/movies/covers/<?php echo $movieCover; ?>" alt="Movie Cover" class="img-fluid">
        </div>
    <?php else : ?>
        <div class="mb-3">
            <p>Nessuna foto disponibile.</p>
        </div>
    <?php endif; ?>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="movieId" value="<?php echo $movieId; ?>">
        <div class="mb-3">
            <label for="newCover" class="form-label">Nuova Immagine:</label>
            <input type="file" class="form-control" id="newCover" name="newCover">
        </div>
        <button type="submit" name="submitNewCover" class="btn btn-primary">Carica Nuova Cover</button>

        <?php if ($movieCover) : ?>
            <button type="submit" name="deleteCover" class="btn btn-danger">Elimina Cover</button>
        <?php endif; ?>
        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieList" class="btn btn-secondary">Indietro</a>
    </form>
</div>
