const playBtn = document.getElementById('play-icon');
const singlePageContainer = document.getElementById('singlePageContainer');
const backgroundVideo = document.getElementById('background-video');

function playTrailer() {
    // Nascondi l'immagine di sfondo
    singlePageContainer.style.backgroundImage = 'none';
    
    // Mostra il video se era precedentemente nascosto
    backgroundVideo.style.display = 'block';

    // Fai partire la riproduzione del video
    backgroundVideo.play();


}

// Aggiungi l'event listener al click dell'icona di play
playBtn.addEventListener('click', playTrailer);
