<!-- resources/Views/admin/trailerChange.php -->
<?php
    $movieTrailer = null;

    if (isset($_GET['movieId'])) {
        $movieId = $_GET['movieId'];

        if (isset($_POST['submitNewTrailer'])) {

            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/videos/";
            $fileName = basename($_FILES["newTrailer"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            if ($fileType == 'mp4') {
                if (move_uploaded_file($_FILES["newTrailer"]["tmp_name"], $targetFilePath)) {
                    
                    $movieController->updateMovieTrailer($movieId, $fileName);
                    echo "<script>alert('Trailer aggiornato con successo!');</script>";
                    echo "<script>window.location.href='" . ROOT . "/index.php?page=admin&subPage=trailer&movieId=$movieId'</script>";
                } else {
                    echo "<script>alert('Errore durante l'upload del file.');</script>";
                }

            } else {
                echo "<script>alert('Solo file MP4 sono permessi.');</script>";
            }

        }
    } else {
        echo "<script>window.location.href='" . ROOT . "/index.php?page=admin'</script>";
    }
?>

<div class="container mt-4 col-md-9 col-lg-10">
    <h2>Cambia Trailer</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="movieId" value="<?php echo $_GET['movieId']; ?>">
        <div class="mb-3">
            <label for="newTrailer" class="form-label">Nuovo Trailer:</label>
            <input type="file" class="form-control" id="newTrailer" name="newTrailer" accept="video/mp4">
        </div>
        <button type="submit" name="submitNewTrailer" class="btn btn-primary">Carica Nuovo Trailer</button>
        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=trailer&movieId=<?php echo $movieId; ?>" class="btn btn-secondary">Indietro</a>
    </form>
</div>