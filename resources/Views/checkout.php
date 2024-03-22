<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>
<?php
if (!isset($_SESSION['userId'])) {

    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/resources/Views/'</script>";
}  else {
    $userId = $_SESSION['userId'];
    $cartItems = $cartController->getCartProUser($userId);
    $user = $userController->getSingleUser($userId);

    if (isset($_POST['procedePay'])) {
        $customer = $_POST['fullname'];
        $adress = $_POST['adress'];
        $email = $_POST['email'];
        $order_notes = $_POST['order_notes'];
        $total = $_POST['totalPrice'];
        $finalOrder = $_POST['orderList'];

    }

}


?>

  <main class="container mt-5 mb-5 text-black bg-white">
    <div class="row"><h1 class="text-success d-flex justify-content-center">Checkout</h1></div>
    <form method="post" action="">
    <div class="row">
        <!-- Order Infos -->
        <div class="col-12 col-md-6">
            <?php foreach ($cartItems as $item) : ?>
                <div id="showDetails" class="col-12">
                    <h2>Show Details</h2>
                    <p><strong>Movie:</strong> <?php echo htmlspecialchars($movieTitle = $movieController->getMovieById($item->movie_id)->title)?></p>
                    <p><strong>Hall:</strong> <?php echo htmlspecialchars($hallName = $hallController->getHallById($item->hall_id)->name)?></p>
                    <p><strong>Date and Time:</strong> <?php echo htmlspecialchars($showDate = $showController->getShowById($item->show_time_id)->showDate)?>, <?php echo htmlspecialchars($showTime = $showController->getShowById($item->show_time_id)->showTime)?></p>
                    <p><strong>Seats:</strong>
                        <?php
                            $seatIdsArray = explode(',', $item->seat_ids);
                            $seatDetails = "";
                            $price = 0;
                            foreach ($seatIdsArray as $seatId) {
                                $singleSeat = $showSeatsController->getSeatPerId($seatId);
                                $price += $singleSeat->price;
                                $seatDetail = htmlspecialchars($singleSeat->seatNumber) . htmlspecialchars($singleSeat->row) . ", ";
                                echo $seatDetail;
                                $seatDetails .= $seatDetail;
                            }
                        ?>
                    </p>
                    <p><strong>Price:</strong> <?php echo htmlspecialchars($price); ?> €</p>
                    <?php $totalPrice = ($totalPrice ?? 0) + $price; ?>
                    <input type="hidden" name="totalPrice" value="<?php echo htmlspecialchars($totalPrice); ?>">
                    <?php
                        $orderDetails = [
                            'movieTitle' => $movieTitle,
                            'hallName' => $hallName,
                            'showDetails' => $showDate . ", " . $showTime,
                            'seats' => $seatDetails,
                        ];
                        $orderList = json_encode($orderDetails);
                    ?>
                    <input type="hidden" name="orderList" value='<?php echo htmlspecialchars($orderList); ?>'>
                    <p><strong>Order:</strong> <?php echo htmlspecialchars($orderList)?></p>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- User Infos -->
        <div id="userDetails" class="col-12 col-md-6">
            <h2>User Details</h2>
            <fieldset>
                <div class="form-group pb-1">
                    <input name="fullname" value="<?php echo htmlspecialchars($user->fullname); ?>" class="form-control" placeholder="Name" type="text" required>
                </div>
                <div class="form-group pb-1">
                    <input name="email" value="<?php echo htmlspecialchars($user->email); ?>" class="form-control" placeholder="Email Address" type="email" required>
                </div>
                <div class="form-group pb-1">
                    <input name="adress" type="text" class="form-control" placeholder="Adress" required>
                </div>
                <div class="form-group pb-1">
                    <textarea name="order_notes" class="form-control" placeholder="Order Notes"></textarea>
                </div>
            </fieldset>
        </div>

        <div class="text-center my-4">
            <button type="submit" name="procedePay" class="btn btn-success">Confirm and Pay</button>
        </div>
        </div>
    </form>

</main>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>