<!-- resources/Views/admin/movieImage.php -->

<?php

if (isset($_GET['movieId'])) {
    $movieId = $_GET['movieId'];
    $movie = $movieController->getMovieById($movieId);

    if ($movie && isset($movie->imagePath) && !empty($movie->imagePath)) {
        $movieImage = $movie->imagePath;
    } else {
        $movieImage = null; 
    }

    if (isset($_POST['submitNewImage'])) {
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/BackendTemplateCinema/assets/img/movies/thumbs/";
        $fileName = basename($_FILES["newImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array(strtolower($fileType), ['jpeg', 'jpg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetFilePath)) {
                $movieController->updateMoviePicture($movieId, $fileName);
                echo "<script>alert('Immagine aggiornata con successo!');</script>";
                echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=movieImage&movieId=$movieId'</script>";
            } else {
                echo "<script>alert('Errore durante l'upload del file.');</script>";
            }
        } else {
            echo "<script>alert('Solo file JPEG, JPG, PNG, e GIF sono permessi.');</script>";
        }
    }

    if (isset($_POST['deleteImage'])) {
        if ($movieController->clearMoviePicture($movieId)) {
            echo "<script>alert('Immagine eliminata con successo!');</script>";
            echo "<script>window.location.href = 'http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=movieImage&movieId=$movieId'</script>";
        } else {
            echo "<script>alert('Errore durante l'eliminazione dell'immagine.');</script>";
        }
    }

} else {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin'</script>";
}
?>

<div class="container mt-4 col-md-9 col-lg-10">
    <h2>Gestione Foto</h2>
    <?php if ($movieImage) : ?>
        <div class="mb-3">
            <img src="<?php echo ROOT; ?>/assets/img/movies/thumbs/<?php echo $movieImage; ?>" alt="Movie Photo" class="img-fluid">
        </div>
    <?php else : ?>
        <div class="mb-3">
            <p>Nessuna foto disponibile.</p>
        </div>
    <?php endif; ?>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="movieId" value="<?php echo $movieId; ?>">
        <div class="mb-3">
            <label for="newImage" class="form-label">Nuova Immagine:</label>
            <input type="file" class="form-control" id="newImage" name="newImage" accept="image/*">
        </div>
        <button type="submit" name="submitNewImage" class="btn btn-primary">Carica Nuova Immagine</button>

        <?php if ($movieImage) : ?>
            <button type="submit" name="deleteImage" class="btn btn-danger">Elimina Foto</button>
        <?php endif; ?>
        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieList" class="btn btn-secondary">Indietro</a>
    </form>
</div>
