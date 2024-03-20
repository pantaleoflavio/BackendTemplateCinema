<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>
<?php
if (!isset($_SESSION['userId'])) {

    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/resources/Views/'</script>";
}

?>

  <main class="container mt-5 mb-5 text-black bg-white">
    <div class="row">
    <h1>Your Cart</h1>
        <div id="showDetails" class="col-12">
            <h2>Show Details</h2>
            <p><strong>Movie:</strong> Frozen</p>
            <p><strong>Date and Time:</strong> 23 April, 13:00</p>
            <p><strong>Hall:</strong> Jupiter</p>
            <p><strong>Seats:</strong> 3A</p>
            <p><strong>Total Price:</strong> 30 €</p>
        </div>
        <div id="showDetails" class="col-12">
            <h2>Show Details</h2>
            <p><strong>Movie:</strong> Tolo Tolo</p>
            <p><strong>Date and Time:</strong> 23 April, 13:00</p>
            <p><strong>Hall:</strong> Jupiter</p>
            <p><strong>Seats:</strong> 4A</p>
            <p><strong>Total Price:</strong> 20 €</p>
        </div>
        <div class="text-center my-4">
            <button class="btn btn-success">go to checkout</button>
        </div>
    </div>
</main>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>