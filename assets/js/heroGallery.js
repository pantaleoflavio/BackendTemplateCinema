document.addEventListener('DOMContentLoaded', function() {
    // Hero Gallery/Swipe Js Init
    var swiper = new Swiper('#heroGalleryContainer', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoplay: {
            delay: 1500,
        },
        speed: 1500,
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
    
        // If we need pagination
        pagination: {
        el: '.swiper-pagination',
        },
    
        // Navigation arrows
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
    
        // And if we need scrollbar
        scrollbar: {
        el: '.swiper-scrollbar',
        },

    });

});
  