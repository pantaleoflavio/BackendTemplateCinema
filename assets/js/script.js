
document.addEventListener('DOMContentLoaded', function () {
    //Variables
    const searchIcon = document.getElementById('searchIcon');
    const searchInput = document.getElementById('searchInput');
    const signupButtonNavbar = document.getElementById('signupButtonNavbar');
    const signinButtonNavbar = document.getElementById('signinButtonNavbar');
    const footerArrow = document.getElementById('footerArrow');
    const bookNowForm = document.getElementById('bookNowForm');
    const loader = document.getElementById('loader');
    
    // FUNCTIONS
    // Open search icon input by click on search icon in navbar
    function toggleSearchInput() {
        const isIndexPage = window.location.pathname.endsWith('/index.php') || window.location.pathname === '/' || window.location.pathname.match(/\/resources\/Views\/$/);

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

    // If is not index redirect to index
    function redirectToIndex(e) {
        e.preventDefault();
        
        // Ottieni il percorso base della tua app
        const basePath = '/BackendTemplateCinema/resources/Views/';
    
        // Controlla se l'utente si trova su index.php tenendo conto del percorso base
        const isIndexPage = window.location.pathname.endsWith(basePath + 'index.php') ||
                            window.location.pathname === basePath ||
                            window.location.pathname === basePath.slice(0, -1); // Rimuove l'ultimo slash se presente
    
        if (isIndexPage) {
            // Se sei su index.php, apri la searchBar
            toggleSearchInput();
        } else {
            // Se non sei su index.php, reindirizza l'utente a index.php
            window.location.href = basePath + "index.php";
        }
    }

    // Search Function
    function searchFunction(e) {
        e.preventDefault(e);
        const searchTerm = e.target.value.toLowerCase();
        // DOM Elements to search
        const elementsToSearch = document.querySelectorAll('.searchable'); //class .searchable to elements searchable

        elementsToSearch.forEach(function(el) {
            if(el.textContent.toLowerCase().includes(searchTerm)) {
                el.style.display = 'block'; 
            } else {
                el.style.display = 'none';
            }
        });
    };

    // Load Spinner for Book Now
    function loadingBookNowSpinner(e) {
        e.preventDefault();

        // Show loader
        const loader = document.querySelector('.lds-ring');
        loader.classList.add('show');

        // Load simulation and redirect
        setTimeout(function() {
            window.location.href = 'bookNow.html';
        }, 2000);
    }

    // EVENT LISTENER
    searchIcon.addEventListener('click', redirectToIndex);
    footerArrow.addEventListener('click', function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
    searchInput.addEventListener('input', searchFunction);
    bookNowForm.addEventListener('submit', loadingBookNowSpinner);



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


