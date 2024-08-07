<!-- resources/Views/cart.php -->

<?php
if (!isset($_SESSION['userId'])) {

    echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
} else {
    $userId = $_SESSION['userId'];
    $cartItems = $cartController->getCartProUser($userId);

    if (isset($_GET['deleteCartElementById'])) {
        $cartElementId = $_GET['deleteCartElementById'];
        $deleteElementFromCart = $cartController->removeFromCart($cartElementId);
        
        echo "<script>window.location.href='" . ROOT . "/index.php?page=cart'</script>";
    }


}


?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
    <?php if ($cartItemCount > 0) : ?>
        <div class="row fs-4">
            <h1>Your Cart</h1>
            <?php foreach ($cartItems as $item) : ?>
                <div id="showDetails" class="col-12">
                    <h2>Show Details</h2>
                    <p><strong>Movie:</strong> <?php echo htmlspecialchars($movieController->getMovieById($item->movie_id)->title)?></p>
                    <p><strong>Hall:</strong> <?php echo htmlspecialchars($hallController->getHallById($item->hall_id)->name)?></p>
                    <p><strong>Date and Time:</strong> <?php echo htmlspecialchars($showController->getShowById($item->show_time_id)->showDate)?>, <?php echo htmlspecialchars($showController->getShowById($item->show_time_id)->showTime)?></p>
                    <p><strong>Seats:</strong>
                        <?php
                            $seatIdsArray = explode(',', $item->seat_ids);
                            $price = 0;
                            foreach ($seatIdsArray as $seatId) {
                                $singleSeat = $showSeatsController->getSeatById($seatId);
                                $price += $singleSeat->price;
                                echo htmlspecialchars($singleSeat->seatNumber) . htmlspecialchars($singleSeat->row) . ", ";
                            }

                            ?>
                    </p>
                    <p><strong>Price:</strong> <?php echo htmlspecialchars($price); ?> €</p>
                    <div class=""><a style="text-decoration: none;" href="index.php?page=cart&deleteCartElementById=<?php echo $item->id ?>" class="bg-danger text-white">Delete this element</a></div>
                </div>  
            <?php $checkoutUrl = "index.php?page=checkout&seatIds=" . urlencode($item->seat_ids);?>
            <?php endforeach;?>

            <div class="text-center my-4">
                <a href="<?php echo $checkoutUrl;?>" type="submit" class="btn btn-success">Go to Checkout</a>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <h1>Your Cart is empty</h1>
        </div>
    <?php endif; ?>
</div>
