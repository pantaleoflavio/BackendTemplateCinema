<!-- resources/Views/checkout.php -->

<?php
if (!isset($_SESSION['userId'])) {

    echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
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


        //GENERATION PDF TICKET

        $dateTicket = date('Y-m-d_His');
        // Creation new PDF Tocket
        $pdfTicket = new TCPDF();
        // Add a page
        $pdfTicket->AddPage();
        //font
        $pdfTicket->SetFont('helvetica', '', 12);
        $textTicket = $dateTicket . '<br>' .'Order and Ticket details: ' . $finalOrder . '<br>' . 'Customer: ' .  $customer . '<br>';
        // ticket text
        $pdfTicket->writeHTML($textTicket, true, false, true, false, '');
        // Random content for QR Code
        $QRContent = 'Data:' . uniqid() . ' Random:' . rand();
        // Sposta il cursore verso il basso per lasciare spazio al QR Code
        $pdfTicket->SetY($pdfTicket->GetY() + 10);
        // Parametri per la generazione del QR Code
        $styleQR = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => array(255,255,255),
            'module_width' => 1,
            'module_height' => 1
        );
        // add QR Code to PDF
        $pdfTicket->write2DBarcode($QRContent, 'QRCODE,H', '', '', 50, 50, $styleQR, 'N');
        // path and name of pdf
        $pathTicket = __DIR__ . '/../../generatedTickets/ticket_' . $dateTicket . '.pdf';
         // Save pdf
        $pdfTicket->Output($pathTicket, 'F');

        //GENERATION BILL AND SEATS BECOME BOOKED
        $bill = $billController->createBill($customer, $adress, $email, $order_notes, $total, $finalOrder, $userId);

        if (isset($_GET['seatIds']) && !empty($_GET['seatIds'])) {
            $seatIds = explode(',', $_GET['seatIds']);
            
            foreach ($seatIds as $seatId) {
                $seatId = (int) $seatId;
                $seatIsBooked = $showSeatsController->setSeatToBooked($seatId);
                
            }
        }

        $sendMailer->sendPDFTicket($email, $pathTicket); // insert in form $email befor payment your mail

        echo "<script>window.location.href='" . ROOT . "/index.php?page=success&successPayment'</script>";
    }

}


?>

<div class="container mt-5 mb-5 text-black bg-white">
    <div class="row"><h1 class="text-success d-flex justify-content-center">Checkout</h1></div>
    <form method="post" action="">
    <div class="row">
        <!-- Order Infos -->
        <div class="col-12 col-md-6 text-dark">
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
                                $singleSeat = $showSeatsController->getSeatById($seatId);
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
</div>