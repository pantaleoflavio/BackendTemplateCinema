<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>
<?php
if (!isset($_SESSION['userId'])) {

    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/resources/Views/'</script>";
}  else {
    
    if (isset($_GET['successPayment'])) {
        $deleteCart = $cartController->EmptyCartAfterPaying($_SESSION['userId']);
        
    }


}
?>


<main  class="container-fluid bg-white h-100 d-flex justify-content-center align-items-center">
    <div class="row ">
        <div class="text-center my-4">
            <h1 class="text-success">the payment has been successful </h1>
        </div>
        <div class="text-center my-4">
            <a href="index.php" class="btn btn-secondary">Return to home</a>
        </div>
    </div>
</main>
<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>