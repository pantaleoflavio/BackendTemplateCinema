<!-- resources/Views/single-hall.php -->

<?php
// validation single hall wall, if there is valid hall id
if (!isset($_GET['id'])) {
  echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
} else {
    $hallId = ($_GET['id']);

    //INIT HALL METHOD FOR SINGLE HALL
    $singleHall = $hallController->getHallById($hallId);
    $hallImages = $hallImagesController->getPicsBySingleHall($hallId);
    var_dump($singleHall);
}
?>

    <div id="single-hall-wall">
      <div id="single-hall-infos" class="row vw-100 vh-60 flex-row">
          <div class="row vh-100 d-flex justify-content-center align-items-center">
              <div id="hall-poster" class="col-12 col-md-6">
                  <img src="<?php echo ROOT; ?>/assets/img/sala-1.png" class="card-img-top" alt="<?php echo $singleHall->name; ?>">
              </div>
              <div id="hall-infos" class="col-12 col-md-6">
                  <div>
                      <h4>Hall Name:</h4>
                      <h3><?php echo $singleHall->name; ?></h3>
                  </div>
                  <div>
                      <h4>Seats:</h4>
                      <h5><?php echo $singleHall->seats; ?></h5>
                  </div>
                  <div>
                      <h4>Services:</h4>
                      <h5>
                        <ul>
                          
                        <?php
                        //Explode services string and loop it
                          $services = $singleHall->services;
                          $servicesArray = explode(',', $services);
                          foreach ($servicesArray as $service) {
                            echo "<li>" . htmlspecialchars($service) . "</li>";
                          }
                        ?>

                        </ul>
                      </h5>
                  </div>
                  <div>
                      <a href="index.php?page=bookNow" class="btn btn-primary">
                          Book Now
                      </a>
                  </div>
              </div>
          </div>
      </div>
      <div id="single-hall-gallery" class="row vw-100 flex-row">
        <div class="swiper" id="hallGallery">
          <div class="swiper-wrapper">
            <?php foreach($hallImages as $hallImage) : ?>
              <div class="swiper-slide"><img src="<?php echo ROOT; ?>/assets/img/halls/<?php echo $hallImage->image_path; ?>" alt="<?php echo $singleHall->name; ?>"></div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
