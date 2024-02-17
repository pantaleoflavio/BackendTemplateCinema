document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper("#hallGallery", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        autoplay: false,
        loop: true,
        effect: 'fade',
        
    });

    swiper.autoplay.stop();
});
  