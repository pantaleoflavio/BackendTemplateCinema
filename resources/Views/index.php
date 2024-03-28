<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>
<?php 
// INIT METHOD FOR INDEX PAGE
$allMovies = $movieController->getAllMovies();
$allHalls = $hallController->getAllHalls();

//INIT CONTACT FORM
$contactForm = new SendMailer();

if (isset($_POST['sendMessage'])) {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userMessage = $_POST['message'];

    $contactForm->sendContactForm($userEmail, $userName, $userMessage);

    echo "<script>alert('Email sent successfully')</script>";
}

?>

    <main>
        <!-- Slider main container Hero Gallery -->
        <div id="heroGalleryContainer" class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-1.jpg');">Slide 1</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-2.jpg');">Slide 2</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-3.jpg');">Slide 3</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-4.jpg');">Slide 4</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-5.jpg');">Slide 5</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-6.jpg');">Slide 6</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-7.jpg');">Slide 7</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-8.jpg');">Slide 8</div>
                <div class="swiper-slide" style="background-image: url('<?php echo ROOT; ?>/assets/img/a-9.jpg');">Slide 9</div>
            </div>

        
            <!-- If we need navigation buttons -->
            <div class="swiper-button swiper-button-prev"></div>
            <div class="swiper-button swiper-button-next"></div>
        
            <!-- If we need scrollbar -->
            <div class="scrollbar swiper-scrollbar"></div>
        </div>

        <!-- Movies Wall -->
        <div id="movies-wall" class="movie-wall-container container mt-5">
            <div class="title-container">
                <h2 class="section-title text-center mb-4">Movies</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                <!-- Card -->
                <?php foreach($allMovies as $allMovie) : ?>
                    <div class="col searchable">
                        <div class="card">
                            <img src="<?php echo ROOT; ?>/assets/img/movies/thumbs/<?php echo $allMovie->image_path; ?>" class="card-img-top" alt="Pinocchio">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $allMovie->name; ?></h5>
                                <a href="<?php echo ROOT; ?>/resources/Views/single-movie.php?movieId=<?php echo $allMovie->id; ?>" class="btn btn-primary">Info movie</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- Halls Wall -->
        <div id="halls-wall" class="halls-wall-container container mt-5">
            <div class="title-container">
                <h2 id="MovieWallTitle" class="section-title text-center mb-4">Halls</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

                <?php foreach($allHalls as $allHall) : ?>
                    <!-- Card -->
                    <div class="col">
                        <div class="card">
                            <img src="<?php echo ROOT; ?>/assets/img/halls/<?php echo $allHall->cover_path; ?>" class="card-img-top" alt="Jupiter">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $allHall->name; ?></h5>
                                <a href="<?php echo ROOT; ?>/resources/Views/single-hall.php?id=<?php echo $allHall->id; ?>" class="btn btn-primary">Info Hall</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- Book Now -->
        <div id="booknow-hall" class="booknow-container mt-5 pb-5 rounded ">
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="card booking-card">
                    <div class="title-container card-header text-center card-title">
                        <h2 class="rounded-top section-title booknow-title bg text-center mb-0">Book Now</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="rounded-start d-none d-md-block col-md-6 image-booking-now">
                            <img src="<?php echo ROOT; ?>/assets/img/sala-1.png" alt="" srcset="">
                        </div>
                        <div class="col-sm-12 col-md-6 card-body">
                            <form id="booknowForm" method="get" action="bookNow.php">

                                <div class="mb-3">
                                    <label for="movieId" class="form-label">Choose a movie</label>
                                    <select class="form-select" id="movieId" name="movieId">
                                        <option >Open this select menu</option>
                                        <?php foreach($allMovies as $movie) : ?>
                                            <option value="<?php echo $movie->id; ?>" ><?php echo $movie->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="hallId" class="form-label">Choose a Hall</label>
                                    <select class="form-select" id="hallId" name="hallId">
                                        <option selected>Open this select menu</option>
                                        <?php foreach($allHalls as $hall) : ?>
                                            <option value="<?php echo $hall->id; ?>"><?php echo $hall->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="d-grid gap-2 justify-content-center">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
              </div>
            </div>
        </div>

        <!-- Contact-->
        <div id="contact" class="">
            <div class="container py-5">
              <div class="row justify-content-center">
                <div class="col-12">
                  <h2 class="text-center mb-4">Contact Us</h2>
                  <p class="text-left text-center-sm">Do you have questions? We'd love to respond. Fill out the form below and we will reply as soon as possible.</p>
                  
                  <!-- contact form -->
                  <form method="post">
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Il tuo nome">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="La tua email">
                    </div>
                    <div class="mb-3">
                      <label for="messaggio" class="form-label">Message</label>
                      <textarea class="form-control" id="messaggio" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" name="sendMessage" class="btn btn-primary">Send</button>
                  </form>
                </div>
                
                <div id="map-container" class="col-12">
                  <!-- Map image -->
                  <h3 class="mt-5 mt-lg-0">Where you can find us</h3>
                  <p>123 Via del Cinema, 00100 Roma, Italia</p>
                  <img src="<?php echo ROOT; ?>/assets/img/map.png" alt="Map" class="img-fluid">
                </div>
              </div>
            </div>
        </div>
          
          

    </main>

    <!-- Footer -->
    <?php include_once "../../includes/footer.php" ?>