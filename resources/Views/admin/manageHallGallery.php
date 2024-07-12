<!-- resources/Views/admin/manageHallGallery.php -->

<?php
if (isset($_GET['hallId'])) {
    $hallId = $_GET['hallId'];
    $hallImages = $hallImagesController->getPicsBySingleHall($hallId);


    if (isset($_POST['submitNewImage'])) {
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/halls/";
        $fileName = basename($_FILES["newImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array(strtolower($fileType), ['jpeg', 'jpg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetFilePath)) {
                $hallImagesController->addSingleImage($hallId, $fileName);
                echo "<script>alert('Immagine aggiornata con successo!');</script>";
                echo "<script>window.location.href='" . ROOT . "/index.php?page=admin&subPage=manageHallGallery&hallId=$hallId'</script>";
            } else {
                echo "<script>alert('Errore durante l\'upload del file.');</script>";
            }
        } else {
            echo "<script>alert('Solo file JPEG, JPG, PNG e GIF sono permessi.');</script>";
        }
    }

    if (isset($_POST['updateImage'])) {
        $imageId = $_POST['oldImageId'];
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/halls/";
        $fileName = basename($_FILES["newImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
        if (in_array(strtolower($fileType), ['jpeg', 'jpg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetFilePath)) {
                // Chiamata corretta al metodo updateImage per aggiornare il percorso dell'immagine
                $hallImagesController->updateSingleImage($imageId, $fileName);
                echo "<script>alert('Immagine aggiornata con successo!');</script>";
                echo "<script>window.location.href='" . ROOT . "/index.php?page=admin&subPage=manageHallGallery&hallId=$hallId'</script>";
            } else {
                echo "<script>alert('Errore durante l\'upload del file.');</script>";
            }
        } else {
            echo "<script>alert('Solo file JPEG, JPG, PNG e GIF sono permessi.');</script>";
        }
    }

    if (isset($_POST['deleteImage'])) {
        $oldImageId = $_POST['oldImageId'];
        if ($hallImagesController->deleteSingleImage($oldImageId)) {
            echo "<script>alert('Immagine eliminata con successo!');</script>";
            echo "<script>window.location.href='" . ROOT . "/index.php?page=admin&subPage=manageHallGallery&hallId=$hallId'</script>";
        } else {
            echo "<script>alert('Errore durante l\'eliminazione dell\'immagine.');</script>";
        }
    }

} else {
    echo "<script>window.location.href='" . ROOT . "/index.php?page=admin'</script>";
    exit;
}
?>

    <div class="container mt-4 col-md-9 col-lg-10">
        <h2>Manage Hall Gallery</h2>
        <div class="row">

            <?php if(!empty($hallImages)) : ?>
                <?php foreach($hallImages as $hallImage) : ?>
                    <div class="col-md-4 mb-3 ">
                        <img src="<?php echo ROOT; ?>/assets/img/halls/<?php echo $hallImage->image_path; ?>" alt="<?php echo $hallImage->id; ?>" class="img-fluid" style="width:350px; height:250px">
                        <div class="mt-2">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div>
                            <input type="hidden" name="oldImageId" value="<?php echo $hallImage->id; ?>">
                                <div class="mb-3">
                                    <label for="newImage" class="form-label">Nuova Immagine:</label>
                                    <input type="file" class="form-control" id="newImage" name="newImage" accept="image/*">
                                </div>
                                <button name="updateImage" class="btn btn-primary btn-sm my-2">Change</button>
                            </div>
                            <button type="submit" name="deleteImage" class="btn btn-danger">Delete Image</button>
                        </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Non ci sono immagini per questa sala.</p>
            <?php endif; ?>

        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
            <input type="hidden" name="hallId" value="<?php echo $hallId; ?>">
                <div class="mb-3">
                    <label for="newImage" class="form-label">Nuova Immagine:</label>
                    <input type="file" class="form-control" id="newImage" name="newImage" accept="image/*">
                </div>
                <button name="submitNewImage" class="btn btn-primary btn-sm my-2">Add</button>
            </div>
        </form>
        <div>
            <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=hallList" class="btn btn-secondary">Back</a>
        </div>
    </div>


