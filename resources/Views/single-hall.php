<!-- Header and Nav Bar-->
<?php include_once "../../includes/header.php" ?>

  <main>
    <div id="single-hall-wall">
      <div id="single-hall-infos" class="row vw-100 vh-60 flex-row">
          <div class="row vh-100 d-flex justify-content-center align-items-center">
              <div id="hall-poster" class="col-12 col-md-6">
                  <img src="<?php echo ROOT; ?>/assets/img/sala-1.png" class="card-img-top" alt="hall">
              </div>
              <div id="hall-infos" class="col-12 col-md-6">
                  <div>
                      <h4>Hall Name:</h4>
                      <h3>Saturn</h3>
                  </div>
                  <div>
                      <h4>Seats:</h4>
                      <h5>120</h5>
                  </div>
                  <div>
                      <h4>Services:</h4>
                      <h5>
                        <ul>
                          <li>Mega Seats</li>
                          <li>Extra Feet Place</li>
                        </ul>
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
      <div id="single-hall-gallery" class="row vw-100 flex-row">
        <div class="swiper" id="hallGallery">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo ROOT; ?>/assets/img/halls/foto_01.png" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo ROOT; ?>/assets/img/halls/foto_02.png" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo ROOT; ?>/assets/img/halls/foto_03.png" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo ROOT; ?>/assets/img/halls/foto_04.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo ROOT; ?>/assets/img/halls/jupiter.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo ROOT; ?>/assets/img/halls/mars.jpg" alt=""></div>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </main>

<!-- Footer -->
<?php include_once "../../includes/footer.php" ?>