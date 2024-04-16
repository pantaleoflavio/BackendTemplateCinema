<!-- resources/Views/single-movie.php -->

<?php
// validation single movie wall, if there is valid movie id
if (!isset($_GET['movieId'])) {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/'</script>";
} else {
    $movieId = ($_GET['movieId']);

    //INIT MOVIE METHOD FOR SINGLE MOVIE
    $singleMovie = $movieController->getMovieById($movieId);
}
?>

        <div id="singlePageContainer" style="background-image: url('<?php echo ROOT; ?>/assets/img/movies/covers/<?php echo $singleMovie->coverPath; ?>');">
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
                            <img src="<?php echo ROOT; ?>/assets/img/movies/thumbs/<?php echo $singleMovie->imagePath; ?>" class="card-img-top" alt="frozen">
                        </div>
                        <div id="movie-infos" class="col-12 col-md-6">
                            <div>
                                <h4>Titolo:</h4>
                                <h3><?php echo $singleMovie->title; ?></h3>
                                <h5><?php echo $singleMovie->description; ?></h5>
                            </div>
                            <div>
                                <h4>data di uscita:</h4>
                                <h5><?php echo $singleMovie->releaseDate; ?></53>
                            </div>
                            <div>
                                <h4>durata:</h4>
                                <h5><?php echo $singleMovie->duration; ?></h5>
                            </div>
                            <div>
                                <h4>regia:</h4>
                                <h5>
                                    <?php echo $singleMovie->director; ?>
                                </h5>
                            </div>
                            <div>
                                <a href="index.php?page=bookNow&movieId=<?php echo $singleMovie->id; ?>" class="btn btn-primary">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
