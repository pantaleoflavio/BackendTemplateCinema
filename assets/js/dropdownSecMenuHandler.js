$(document).ready(function() {
    $('.navbar-toggler').click(function() {
        $('#navbarSecondary').toggle();
    });

    // Selezione del bottone hamburger menu
    var navbarToggler = document.querySelector('.navbar-toggler');

    
    function toggleMargin() {
        var navbarCollapse = document.querySelector('.navbar-collapse');
        
        if (navbarCollapse.classList.contains('show')) {
            navbarToggler.style.marginTop = '5rem';
            navbarToggler.style.marginBottom = '1rem';
        } else {
            navbarToggler.style.marginTop = '';
            navbarToggler.style.marginBottom = '';
        }
    }

    // Event Listener
    navbarToggler.addEventListener('click', function() {
        let navbarCollapse = document.querySelector('.navbar-collapse');
        navbarCollapse.classList.toggle('show');
        toggleMargin();
    });
});
