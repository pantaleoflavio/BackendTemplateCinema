<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>

<?php

if (!isset($_SESSION['userId'])) {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/resources/Views/'</script>";
} else {
    $userId = $_SESSION['userId'];
    $singleUser = $userController->getSingleUser($userId);
    $bookingHistory = $billCOntroller->getBillsProUser($userId);
}



?>

<main class="container my-4">
    <div class="row">
        <h1 class="d-flex justify-content-center">This is your page</h1>
    </div>
    <div class="row">
        <!-- Users data -->
        <section id="user-info" class="col-12 col-lg-6 py-2">
            <h2>User</h2>
            <p>Full Name: <?php echo $singleUser->fullname; ?></p>
            <p>Username: <?php echo $singleUser->username; ?></p>
            <p>Email: <?php echo $singleUser->email; ?></p>

            <!-- Profile Pic -->
            <div class="profile-picture">
                <img src="<?php echo ROOT; ?>/assets/img/users/<?php echo $singleUser->user_pic; ?>" alt="Profile Image">
            </div>

            <!-- Link per modificare il profilo -->
            <div class="mt-2">
                <a class="btn btn-secondary text-white" style="text-decoration: none;" href="user-settings.php">Modify your Profile</a>
            </div>
        </section>
    
        <!-- Prenotations chronology -->
        <section id="booking-history" class="col-12 col-lg-6 py-2">
            <h2>Cronologia Prenotazioni</h2>
            <?php

            if (!empty($bookingHistory)) {
                foreach ($bookingHistory as $booking) {
                    echo "<div class='booking-entry'>";
                    echo "<p><strong>Date of order:</strong> " . htmlspecialchars($booking->created_at) . "</p>";
                    echo "<p><strong>Send Adress:</strong> " . htmlspecialchars($booking->adress) . "</p>";
                    echo "<p><strong>Name:</strong> " . htmlspecialchars($booking->customer) . "</p>";
                    echo "<p><strong>Email:</strong> " . htmlspecialchars($booking->email) . "</p>";

                    echo "<p><strong>List of the order:</strong></p>";
                    $orderDetails = json_decode($booking->orderList, true);

                    // Verifica che la decodifica sia andata a buon fine
                    if ($orderDetails !== null) {
                        echo "<ul>";
                        // Ora puoi accedere ai dettagli dell'ordine come array associativo
                        echo "<li>" . htmlspecialchars($orderDetails['movieTitle']) . " - " . htmlspecialchars($orderDetails['hallName']) . " - " . htmlspecialchars($orderDetails['showDetails']) . " - Seats: " . htmlspecialchars($orderDetails['seats']) . "</li>";
                        echo "</ul>";
                    } else {
                        echo "Errore nel decodificare i dettagli dell'ordine.";
                    }

                    echo "</div><hr>";
                }
            } else {
                echo "<p>You don't still order nothing</p>";
            }
            ?>
        </section>
    </div>
</main>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>