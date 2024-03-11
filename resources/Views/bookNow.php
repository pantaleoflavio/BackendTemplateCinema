
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../../favicon/favicon.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="../../node_modules//bootstrap/dist/css/bootstrap.min.css">

    <!-- Swipe JS library -->
    <link rel="stylesheet" href="../../node_modules/swiper/swiper-bundle.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="../../assets/public/css/styles.css">
    <link rel="stylesheet" href="../../assets/public/css/book-now.css">

    <title>Book Now</title>
</head>
<body>
  <!-- Navigation Bar with logo and secondary menu -->
  <header>
      <div class="container logo-container">
          <a class="navbar-brand" href="index.html">
              <img src="../../assets/img/musa-vision-logo.png" alt="CINE VISION" height="40">
          </a>
      </div>
      <nav class="main-menu container navbar navbar-expand-lg">
          <!-- Toggler -->
            <ul class="navbar-nav ">
                <!-- Elementi del menu principale -->
                <li class="nav-item">
                    <a class="nav-link active" href="index.html#movies-wall"><i class="fa-solid fa-film"></i>Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.html#halls-wall"><i class="fa-solid fa-couch"></i>Halls</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.html#booknow-hall"><i class="fa-solid fa-ticket"></i>Book Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.html#contact"><i class="fa-solid fa-phone"></i>Contacts</a>
                </li>
            </ul>
      </nav>
      <nav class="secondary-menu container navbar navbar-expand-lg">
        <!-- Toggler -->
        <ul class="navbar-nav">
          <!-- Elementi del menu secondario -->
          <li id="signupButtonNavbar" class="nav-item">
              <button class="nav-link signButton" data-bs-toggle="modal" data-bs-target="#signUpModal">SIGN UP</button>
          </li>
          <li id="signinButtonNavbar" class="nav-item">
              <button class="nav-link signButton" data-bs-toggle="modal" data-bs-target="#signInModal">SIGN IN</button>
          </li>
          <li class="nav-item">
              <a  id="searchIcon" class="nav-link signButton" href="#"><i class="fa fa-search"></i></a> 
              <input type="text" id="searchInput"  style="display: none;" class="nav-link search-input" placeholder="Cerca...">
          </li>
        </ul>
      </nav>
  </header>

  <main class="container my-4">
        <!-- Infos and Cover Movie -->
        <div id="movieInfoContainer" class="row mb-5">
          <div id="imgContainer" class="col-md-4 d-flex justify-content-center">
              <img src="../../assets/img/movies/thumbs/frozen.jpg" alt="Frozen" class="img-fluid">
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
  
    <form action="" method="">
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
              <a href="cart.html" class="btn btn-primary">Add to Cart</a>
          </div>
      </div>
    </form>
  </main>

    <!-- Footer -->
    <footer class="footer text-white py-4">
    <div class="container">
      <div class="row align-items-center text-center">
        <!-- Logo Column -->
        <div class="col-12 col-md-3 mb-3">
          <a href="#" class="navbar-brand d-inline">
            <img src="../../assets/img/musa-vision-logo.png" alt="CINE VISION" height="100">
          </a>
        </div>
        <!-- Social Icons Column -->
        <div class="social-container col-12 col-md-3 mb-3">
          <a href="https://facebook.com" target="_blank" class="text-white me-2 pe-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://instagram.com" target="_blank" class="text-white">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
        <!-- Contact Info Column -->
        <div class="col-12 col-md-3 mb-3 text-md-center">
          <div class="contact-info">
            <p>Telefono: 123 456 7890</p>
            <p>Email: info@cinevision.com</p>
          </div>
        </div>
        <!-- Back to Top Button Column -->
        <div class="col-12 mb-3 col-md-3 text-md-end">
          <div id="footerArrow" class="btn btn-primary rounded-circle">
            <i class="fas fa-chevron-up"></i>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
    <!-- Sign In Modal -->
    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="signInModalLabel">Accedi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form>
                  <div class="mb-3">
                      <label for="signInEmail" class="form-label">Your Email</label>
                      <input type="email" class="form-control" id="signInEmail" required>
                      </div>
                  <div class="mb-3">
                      <label for="signInPassword" class="form-label">Password</label>
                      <input type="password" class="form-control" id="signInPassword" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
              </form>
              </div>
          </div>
      </div>
    </div>

  <!-- Sign up Modal -->
  <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="signUpModalLabel">Sign up</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form>
                  <div class="mb-3">
                      <label for="signUpEmail" class="form-label">Your email</label>
                      <input type="email" class="form-control" id="signUpEmail" required>
                  </div>
                  <div class="mb-3">
                      <label for="signUpPassword" class="form-label">Password</label>
                      <input type="password" class="form-control" id="signUpPassword" required>
                  </div>
                  <div class="mb-3">
                      <label for="confirmPassword" class="form-label">confirm Password</label>
                      <input type="password" class="form-control" id="confirmPassword" required>
                  </div>
                  <button type="submit" class="btn btn-primary">complete your registration</button>
              </form>
              </div>
          </div>
      </div>
  </div>

      
    <!-- Swipe JS library -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script -->
    <script src="../../assets/js/script.js"></script>
        <!-- Script Single Movie -->
        <script src="../../assets/js/book-now.js"></script>
</body>
</html>