<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>

<?php

if (!isset($_SESSION['id'])) {
    echo 'not logged';
}


?>

<main class="container my-4">
    <h1>Profilo Utente</h1>
    <!-- Users data -->
    <section id="user-info">
        <h2>Informazioni Utente</h2>
        <p>Username: <?php echo 'user'; ?></p>
        <p>Email: <?php echo 'email'; ?></p>

        <!-- Profile Pic -->
        <div class="profile-picture">
            <img src="<?php echo 'https://randomuser.me/api/portraits/lego/1.jpg'; ?>" alt="Profile Image">
        </div>

        <!-- Link per modificare il profilo (facoltativo) -->
        <a href="">Modifica Profilo</a>
    </section>

    <!-- Prenotations hronology -->
    <section id="booking-history">
        <h2>Cronologia Prenotazioni</h2>
        <!-- Mostra la cronologia delle prenotazioni dell'utente qui -->
    </section>

</main>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>