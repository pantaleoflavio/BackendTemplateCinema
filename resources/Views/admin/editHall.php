<!-- resources/Views/admin/editHall.php -->  
<?php
if (isset($_GET['hallId'])) {
    $hallId = $_GET['hallId'];
    $hall = $hallController->getHallById($hallId);
    
    if (!$hall) {
        echo "<p>La sala non è stata trovata.</p>";
        exit;
    }

    if (isset($_POST['editHall'])) {
        
        $name = htmlspecialchars(trim($_POST['name']));
        $code = null;
        $seats = filter_var($_POST['seats'], FILTER_SANITIZE_NUMBER_INT);
        $services = htmlspecialchars(trim($_POST['services']));

        $success = $hallController->updateHall($hallId, $name, $code, $seats, $services);

        if ($success) {
            echo "<script>alert('Hall aggiornato con successo');</script>";
        } else {
            echo "<script>alert('Errore durante l'aggiornamento della hall');</script>";
        }

        // Dopo l'aggiornamento, aggiorna anche l'oggetto $movie con i nuovi dati
        $hall = $hallController->getHallById($hallId);
    }
} else {
    echo "<script>alert('ID della Hall non specificato');</script>";
    exit;
}
?>
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Hall</h1>
            </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Hall Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($hall->name) ? htmlspecialchars($hall->name) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="seats" class="form-label">Seats</label>
                        <input type="number" class="form-control" id="seats" name="seats" value="<?php echo isset($hall->seats) ? htmlspecialchars($hall->seats) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="services" class="form-label">Services</label>
                        <input type="text" class="form-control" id="services" name="services" value="<?php echo isset($hall->services) ? htmlspecialchars($hall->services) : ''; ?>" required>
                    </div>

                    <button type="submit" name="editHall" class="btn btn-primary">Edit Hall</button>
                </form>
            


        </main>
