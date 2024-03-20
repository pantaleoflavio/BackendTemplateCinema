<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>
<?php
if (!isset($_SESSION['userId'])) {

    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/resources/Views/'</script>";
} else {
    $userId = $_SESSION['userId'];
    $cartItems = $cartController->getCartProUser($userId);
    //var_dump($theCart);

}


?>

  <main class="container mt-5 mb-5 text-black bg-white">
    <?php if ($cartItemCount > 0) : ?>
        <div class="row">
            <h1>Your Cart</h1>
            <?php foreach ($cartItems as $item) : ?>
                <div id="showDetails" class="col-12">
                    <h2>Show Details</h2>
                    <p><strong>Movie:</strong> <?php echo $movieController->getMovieById($item->movie_id)->title?></p>
                    <p><strong>Hall:</strong> <?php echo $hallController->getHallById($item->hall_id)->name?></p>
                    <p><strong>Date and Time:</strong> <?php echo $showController->getShowById($item->show_time_id)->showDate?>, <?php echo $showController->getShowById($item->show_time_id)->showTime?></p>
                    <p><strong>Seats:</strong>
                        <?php
                            $seatIdsArray = explode(',', $item->seat_ids);
                            $totalPrice = 0;
                            foreach ($seatIdsArray as $seatId) {
                                $singleSeat = $showSeatsController->getSeatPerId($seatId);
                                $totalPrice += $singleSeat->price;
                                echo $singleSeat->seatNumber . $singleSeat->row. ", ";
                            }
                        ?>
                    </p>
                    <p><strong>Total Price:</strong> <?php echo $totalPrice; ?> €</p>
                </div>
            <?php endforeach;?>

            <div class="text-center my-4">
                <button class="btn btn-success">go to checkout</button>
            </div>
        </div>
    <?php else : ?>
        <div class="row d-flex justify-content-center align-items-center">
            <h1>Your Cart is empty</h1>
        </div>
    <?php endif; ?>
</main>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>