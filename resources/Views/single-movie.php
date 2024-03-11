<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>

    <main>
        <div id="singlePageContainer" style="background-image: url('<?php echo ROOT; ?>/assets/img/movies/covers/frozen-cover.png');">
            <video id="background-video" class="" autoplay muted playsinline>
                <source src="<?php echo ROOT; ?>/assets/videos/sample_mp4.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="row vw-100 vh-100">
                <!-- First column with Play icon -->
                <div id="play-icon-container" class="col-md-6 d-none d-md-block">
                    <div id="play-icon" class="d-flex justify-content-center align-items-center">
                        <img src="<?php echo ROOT; ?>/assets/img/play.png" alt="">
                        <div id="play-trailer">
                            Trailer
                        </div>
                    </div>
                </div>
                <!-- Second column with movie infos -->
                <div class="col-12 col-md-6 offset-md-6">
                    <div class="row vh-100 d-flex justify-content-center align-items-center">
                        <div id="movie-poster" class="col-12 col-md-6">
                            <img src="<?php echo ROOT; ?>/assets/img/movies/thumbs/frozen.jpg" class="card-img-top" alt="frozen">
                        </div>
                        <div id="movie-infos" class="col-12 col-md-6">
                            <div>
                                <h4>Titolo:</h4>
                                <h3>Frozen</h3>
                                <h5>Lorem ipsum dolor sit amet</h5>
                            </div>
                            <div>
                                <h4>data di uscita:</h4>
                                <h5>20/12/2019</53>
                            </div>
                            <div>
                                <h4>durata:</h4>
                                <h5>120 min</h5>
                            </div>
                            <div>
                                <h4>regia:</h4>
                                <h5>
                                    lorem
                                    <br>
                                    ipsum
                                </h5>
                            </div>
                            <div>
                                <a href="<?php echo ROOT; ?>/resources/Views/bookNow.php" class="btn btn-primary">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <?php include_once "../../includes/footer.php" ?>