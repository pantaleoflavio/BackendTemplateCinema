<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>

  <main class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
              <form action="checkout.php">
                  <div class="card-header">
                      Order Details
                  </div>
                  <ul class="list-group list-group-flush list-group-item mb-5">
                      <li class="list-group-item">Movie: <strong>Frozen</strong></li>
                      <li class="list-group-item">Date and Time: <strong>23 April - 17:00</strong></li>
                      <li class="list-group-item">Seats: <strong>A1, A2</strong></li>
                      <li class="list-group-item">Total Price: <strong>€20.00</strong></li>
                      <button class="btn-close bg-danger float-end" aria-label="Cancel" onclick="removeOrder(this)"></button>
                  </ul>
                  <ul class="list-group list-group-flush list-group-item  mb-5">
                      <li class="list-group-item">Movie: <strong>Frozen</strong></li>
                      <li class="list-group-item">Date and Time: <strong>23 April - 17:00</strong></li>
                      <li class="list-group-item">Seats: <strong>A1, A2</strong></li>
                      <li class="list-group-item">Total Price: <strong>€20.00</strong></li>
                      <button class="btn-close bg-danger float-end" aria-label="Cancel" onclick="removeOrder(this)"></button>
                  </ul>
              </div>

              <div class="d-flex justify-content-between">
                  <a href="<?php echo ROOT; ?>/index.php#booknow-hall" class="btn btn-secondary">Back to Booking</a>
                  <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
              </div>
            </form>
        </div>
    </div>
</main>


<script>
    function removeOrder(element) {

        const orderItem = element.closest('.list-group-item');
        
        if (orderItem) {
            orderItem.remove();
        }
    }
</script>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>