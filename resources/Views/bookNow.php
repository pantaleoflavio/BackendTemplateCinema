<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>

  <main class="container my-4">
        <!-- Infos and Cover Movie -->
        <div id="movieInfoContainer" class="row mb-5">
          <div id="imgContainer" class="col-md-4 d-flex justify-content-center">
              <img src="<?php echo ROOT; ?>/assets/img/movies/thumbs/frozen.jpg" alt="Frozen" class="img-fluid">
          </div>
          <div class="col-md-8">
              <h2>Frozen</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, architecto tempora maiores expedita facere soluta totam assumenda magni voluptate eaque in, obcaecati, fugit vero?</p>
              <p><strong>Category:</strong> Action</p>
              <p><strong>Director:</strong> Gigi Proietti</p>
              <p><strong>Duration:</strong> 123min</p>
          </div>
      </div>
  
      <!-- Select Hall -->
      <div class="row mb-3">
          <div class="col-12">
              <h3>Select Hall</h3>
              <select class="form-select" aria-label="Selezione Sala">
                  <option selected>Select an Hall</option>
                  <option value="1">Jupiter</option>
                  <option value="2">Saturn</option>
                  <option value="2">Mars</option>
                  <option value="2">Mercury</option> 
              </select>
          </div>
      </div>
  
    <form id="formChooseShowAndSeat" action="<?php echo ROOT; ?>/resources/Views/cart.php" method="">
        <!-- Available Shows per each Day -->
        <div class="row mb-3">
            <div class="col-12">
                <h3>Available Shows</h3>
                <article class="mb-2">
                    <h4>23 April</h4>
                    <div class="d-flex flex-wrap">
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T13:00" class="me-2">13:00
                        </label>
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T17:00" class="me-2">17:00
                        </label>
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T17:00" class="me-2">19:00
                        </label>
                    </div>
                </article>
                <article class="mb-2">
                    <h4>24 April</h4>
                    <div class="d-flex flex-wrap">
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T13:00" class="me-2">13:00
                        </label>
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T17:00" class="me-2">22:00
                        </label>
                    </div>
                </article>
                <article class="mb-2">
                    <h4>25 April</h4>
                    <div class="d-flex flex-wrap">
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T13:00" class="me-2">13:00
                        </label>
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T17:00" class="me-2">17:00
                        </label>
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T13:00" class="me-2">20:00
                        </label>
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T17:00" class="me-2">23:00
                        </label>
                    </div>
                </article>
                <article class="mb-2">
                    <h4>26 April</h4>
                    <div class="d-flex flex-wrap">
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T13:00" class="me-2">13:00
                        </label>
                        <label class="btn btn-outline-primary m-1">
                            <input type="radio" name="showTime" value="2023-04-23T17:00" class="me-2">17:00
                        </label>
                    </div>
                </article>

            </div>
        </div>

        <!-- Select Place Section -->
        <div class="text-center mb-4">
            <h3 class="mb-3">Select Your Seats</h3>
            <div class="screen mb-2">Screen</div>
            <div class="container">
            <!-- Row A -->
            <div class="d-flex justify-content-around mb-2">
                <label class="btn btn-outline-primary m-1">A1<input type="checkbox" name="seats" value="A1_10.00" class="seat-checkbox visually-hidden" aria-label="Seat A1"></label>
                <label class="btn btn-outline-primary m-1">A2<input type="checkbox" name="seats" value="A2_10.00" class="seat-checkbox visually-hidden" aria-label="Seat A2"></label>
                <label class="btn btn-outline-primary m-1">A3<input type="checkbox" name="seats" value="A3_10.00" class="seat-checkbox visually-hidden" aria-label="Seat A3"></label>
            </div>
            <!-- Row B -->
            <div class="d-flex justify-content-around mb-2">
                <label class="btn btn-outline-primary m-1">B1<input type="checkbox" name="seats" value="B1_10.00" class="seat-checkbox visually-hidden" aria-label="Seat B1"></label>
                <label class="btn btn-outline-primary m-1">B2<input type="checkbox" name="seats" value="B2_10.00" class="seat-checkbox visually-hidden" aria-label="Seat B2"></label>
                <label class="btn btn-outline-primary m-1">B3<input type="checkbox" name="seats" value="B3_10.00" class="seat-checkbox visually-hidden" aria-label="Seat B3"></label>
            </div>
            <!-- Row C -->
            <div class="d-flex justify-content-around mb-2">
                <label class="btn btn-outline-primary m-1">C1<input type="checkbox" name="seats" value="C1_10.00" class="seat-checkbox visually-hidden" aria-label="Seat C1"></label>
                <label class="btn btn-outline-primary m-1">C2<input type="checkbox" name="seats" value="C2_10.00" class="seat-checkbox visually-hidden" aria-label="Seat C2"></label>
                <label class="btn btn-outline-primary m-1">C3<input type="checkbox" name="seats" value="C3_10.00" class="seat-checkbox visually-hidden" aria-label="Seat C3"></label>
            </div>
            </div>
        </div>

        <!-- Button Proceed -->
            <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </div>
            </div>
    </form>
  </main>
    
<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>