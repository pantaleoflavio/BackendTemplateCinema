
document.addEventListener('DOMContentLoaded', function () {
    //Variables
    const searchIcon = document.getElementById('searchIcon');
    const searchInput = document.getElementById('searchInput');
    const elementsToHideBySearch = document.querySelectorAll('.elementsToHideBySearch');
    const footerArrow = document.getElementById('footerArrow');
    
    // FUNCTIONS
    // Funzione per controllare se la pagina attuale è 'index.php' o la root
    function isIndexPage() {
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page');
        const pathname = window.location.pathname;
        const basePath = '/';
    
        // Verifica che il pathname sia uno dei percorsi base e che la pagina sia 'home' o non definita
        return (pathname === basePath || pathname === basePath + 'index.php' || pathname === '/') &&
               (!page || page === 'home');
    }

    // Funzione per reindirizzare alla home
    function redirectToHome() {
        window.location.href = '/index.php?page=home';
    }

    // Funzione per aprire la barra di ricerca
    function openSearchInput() {
        searchInput.style.display = 'block';
        elementsToHideBySearch.forEach(element => element.style.display = 'none');
    }

    // Funzione per chiudere la barra di ricerca
    function closeSearchInput() {
        searchInput.style.display = 'none';
        elementsToHideBySearch.forEach(element => element.style.display = 'block');
    }

    // Funzione toggle per la barra di ricerca
    function toggleSearchInput() {
        if (searchInput.style.display === 'block') {
            closeSearchInput();
        } else {
            openSearchInput();
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


    // EVENT LISTENER
    searchIcon.addEventListener('click', function(e) {
        e.preventDefault();
        // Se non siamo sulla pagina index o home, reindirizza
        if (!isIndexPage()) {
            redirectToHome();
        } else {
            // Altrimenti, apri la barra di ricerca
            toggleSearchInput();
        }
    });
    footerArrow.addEventListener('click', function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
    searchInput.addEventListener('input', searchFunction);
});


