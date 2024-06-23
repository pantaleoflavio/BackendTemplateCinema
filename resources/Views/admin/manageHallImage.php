<!-- resources/Views/admin/manageHallImage.php -->

<?php
if (isset($_GET['hallId'])) {
    $hallId = $_GET['hallId'];
    $hall = $hallController->getHallById($hallId);

    if ($hall && isset($hall->coverPath) && !empty($hall->coverPath)) {
        $hallImage = $hall->coverPath;
    } else {
        $hallImage = null;
    }

    if (isset($_POST['submitNewImage'])) {
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/BackendTemplateCinema/assets/img/halls/";
        $fileName = basename($_FILES["newImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array(strtolower($fileType), ['jpeg', 'jpg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetFilePath)) {
                $hallController->updateHallPicture($hallId, $fileName);
                echo "<script>alert('Immagine aggiornata con successo!');</script>";
                echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=manageHallImage&hallId=$hallId'</script>";
            } else {
                echo "<script>alert('Errore durante l\'upload del file.');</script>";
            }
        } else {
            echo "<script>alert('Solo file JPEG, JPG, PNG e GIF sono permessi.');</script>";
        }
    }

    if (isset($_POST['deleteImage'])) {
        if ($hallController->clearHallPicture($hallId)) {
            echo "<script>alert('Immagine eliminata con successo!');</script>";
            echo "<script>window.location.href = 'http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=manageHallImage&hallId=$hallId'</script>";
        } else {
            echo "<script>alert('Errore durante l\'eliminazione dell\'immagine.');</script>";
        }
    }

} else {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin'</script>";
    exit;
}
?>

<div class="container my-4 col-md-9 col-lg-10">
    <h2>Gestione Immagine Sala</h2>
    <?php if ($hallImage) : ?>
        <div class="mb-3">
            <img src="<?php echo ROOT; ?>/assets/img/halls/<?php echo $hallImage; ?>" alt="Hall Image" class="img-fluid">
        </div>
    <?php else : ?>
        <div class="mb-3">
            <p>Nessuna immagine disponibile.</p>
        </div>
    <?php endif; ?>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="hallId" value="<?php echo $hallId; ?>">
        <div class="mb-3">
            <label for="newImage" class="form-label">Nuova Immagine:</label>
            <input type="file" class="form-control" id="newImage" name="newImage" accept="image/*">
        </div>
        <button type="submit" name="submitNewImage" class="btn btn-primary">Carica Nuova Immagine</button>

        <?php if ($hallImage) : ?>
            <button type="submit" name="deleteImage" class="btn btn-danger">Elimina Immagine</button>
        <?php endif; ?>
        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=hallList" class="btn btn-secondary">Indietro</a>
    </form>
</div>
