<!-- resources/Views/admin/addMovie.php -->  
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addMovie']) ) {
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $duration = filter_var($_POST['duration'], FILTER_SANITIZE_NUMBER_INT);
    $release_date = htmlspecialchars(trim($_POST['release_date']));
    $director = htmlspecialchars(trim($_POST['director']));
    $trailerPath = $imagePath = $coverPath = null;

    // helper function for files, for to load in right way each movies file
    function uploadFile($fileInfo, $subdir = '') {
        
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/BackendTemplateCinema/assets/" . $subdir;
        $fileName = basename($fileInfo["name"]);
        $targetFilePath = $uploadDir . $fileName;
        
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($fileInfo["tmp_name"], $targetFilePath)) {
            return $subdir . $fileName;
        }
        return null;
    }


    // trailer Handel
    if (isset($_FILES["trailer"]) && $_FILES["trailer"]["error"] == UPLOAD_ERR_OK) {
        $trailerPath = uploadFile($_FILES["trailer"], 'videos/');
    }

    // image Handel
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $imagePath = uploadFile($_FILES["image"], 'img/movies/thumbs/');
    }

    // cover Handel
    if (isset($_FILES["cover"]) && $_FILES["cover"]["error"] == UPLOAD_ERR_OK) {
        $coverPath = uploadFile($_FILES["cover"], 'img/movies/covers/');
    }

    $result = $movieController->addMovie($name, $description, $duration, $release_date, $trailerPath, $imagePath, $coverPath, $director);
    

    if ($result) {
        echo "<script>alert('Movie added successfully');</script>";
        echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=movieList'</script>";
    } else {
        echo "<script>alert('Error adding movie');</script>";
    }

}

?>
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add Movie</h1>
            </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Movie Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (in minutes):</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Release Date:</label>
                        <input type="date" class="form-control" id="release_date" name="release_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="trailer" class="form-label">Trailer (optional):</label>
                        <input type="file" class="form-control" id="trailer" name="trailer" accept="video/*">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Movie Image (optional):</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Movie Cover (optional):</label>
                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Director:</label>
                        <input type="text" class="form-control" id="director" name="director" required>
                    </div>
                    <button type="submit" name="addMovie" class="btn btn-primary">Add Movie</button>
                </form>
            


        </main>
    </div>
</div>