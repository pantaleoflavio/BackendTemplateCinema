<!-- resources/Views/success.php -->
<?php
if (!isset($_SESSION['userId'])) {

    echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
}  else {
    
    if (isset($_GET['successPayment'])) {
        $deleteCart = $cartController->emptyCart($_SESSION['userId']);
        
    }


}
?>


<div  class="container-fluid bg-white h-100 d-flex justify-content-center align-items-center">
    <div class="row ">
        <div class="text-center my-4">
            <h1 class="text-success">the payment has been successful </h1>
            <br>
            <h3>YOu will receive per email your ticket</h3>
        </div>
        <div class="text-center my-4">
            <a href="<?php echo ROOT; ?>/index.php?page=home" class="btn btn-secondary">Return to home</a>
        </div>
    </div>
</div>
