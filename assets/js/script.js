
document.addEventListener('DOMContentLoaded', function () {
    const searchIcon = document.getElementById('searchIcon');
    const searchInput = document.getElementById('searchInput');
    const signupButtonNavbar = document.getElementById('signupButtonNavbar');
    const signinButtonNavbar = document.getElementById('signinButtonNavbar');
    const footerArrow = document.getElementById('footerArrow');
    
    // Open search icon input by click on search icon in navbar
   
    function toggleSearchInput() {
        if (searchInput.style.display === 'none') {
            openSearchInput();
        } else {
            closeSearchInput();
        }
    }

    function openSearchInput() {
        signupButtonNavbar.style.display = 'none';
        signinButtonNavbar.style.display = 'none';
        searchInput.style.display = 'block';
        searchInput.classList.add('open');
    }

    function closeSearchInput() {
        signupButtonNavbar.style.display = 'block';
        signinButtonNavbar.style.display = 'block';
        searchInput.style.display = 'none';
        searchInput.classList.remove('open');
    }


    // EVENT LISTENER
    searchIcon.addEventListener('click', toggleSearchInput);
    footerArrow.addEventListener('click', function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });



    // Hero Gallery/Swipe Js Init

    const swiper = new Swiper('.swiper', {
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


