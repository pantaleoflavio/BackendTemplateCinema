<!-- resources/Views/admin/addHall.php -->  
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addHall']) ) {
    $name = htmlspecialchars(trim($_POST['name']));
    $code = null;
    $seats = filter_var($_POST['seats'], FILTER_SANITIZE_NUMBER_INT);
    $services = htmlspecialchars(trim($_POST['services']));
    $imagePath = null;

    // helper function for files, for to load in right way each movies file
    function uploadFile($fileInfo, $subdir = '') {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/" . $subdir;
        $fileName = basename($fileInfo["name"]);
        $targetFilePath = $uploadDir . $fileName;
    
        // Verifica se la directory di upload esiste, altrimenti crea la directory
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
    
        // Verifica se il file è stato caricato con successo
        if (move_uploaded_file($fileInfo["tmp_name"], $targetFilePath)) {
            return $fileName; // Restituisci solo il nome del file
        }
        return null; // Restituisci null se il caricamento del file ha fallito
    }
    
    

    // image Handel
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $imagePath = uploadFile($_FILES["image"], 'img/halls/');
    }

    $result = $hallController->addHall($name, $code, $seats, $imagePath, $services);

    if ($result) {
        echo "<script>alert('Hall added successfully');</script>";
        echo "<script>window.location.href='" . ROOT . "/index.php?page=admin&subPage=hallList'</script>";
    } else {
        echo "<script>alert('Error adding Hall');</script>";
    }

}

?>
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add Hall</h1>
            </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Hall Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="seats" class="form-label">Seats</label>
                        <input type="number" class="form-control" id="seats" name="seats" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hall Image (optional):</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="services" class="form-label">Services</label>
                        <input type="text" class="form-control" id="services" name="services" required>
                    </div>

                    <button type="submit" name="addHall" class="btn btn-primary">Add Hall</button>
                </form>
            


        </main>
