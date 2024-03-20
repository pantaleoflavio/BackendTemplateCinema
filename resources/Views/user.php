<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>

<?php

if (!isset($_SESSION['userId'])) {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/resources/Views/'</script>";
} else {
    $userId = $_SESSION['userId'];
    $singleUser = $userController->getSingleUser($userId);
}



?>

<main class="container my-4">
    <div class="row">
        <h1 class="d-flex justify-content-center">This is your page</h1>
    </div>
    <div class="row">
        <!-- Users data -->
        <section id="user-info" class="col-12 col-lg-6">
            <h2>User</h2>
            <p>Full Name: <?php echo $singleUser->fullname; ?></p>
            <p>Username: <?php echo $singleUser->username; ?></p>
            <p>Email: <?php echo $singleUser->email; ?></p>

            <!-- Profile Pic -->
            <div class="profile-picture">
                <img src="<?php echo ROOT; ?>/assets/img/users/<?php echo $singleUser->user_pic; ?>" alt="Profile Image">
            </div>

            <!-- Link per modificare il profilo -->
            <a href="">Modifica Profilo</a>
        </section>
    
        <!-- Prenotations hronology -->
        <section id="booking-history" class="col-12 col-lg-6">
            <h2>Cronologia Prenotazioni</h2>
            <!-- Mostra la cronologia delle prenotazioni dell'utente qui -->
        </section>
    </div>
</main>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>