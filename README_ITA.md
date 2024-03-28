# Cinema Fake Web App

### La Cinema Fake Web App è una piattaforma full-stack per la gestione e la prenotazione di film presso un cinema immaginario. Questo progetto combina un robusto back-end PHP con un elegante front-end, basato su un template personalizzato che ho creato da zero.

## Tecnologie Utilizzate

### Front-End

* HTML/CSS (con SASS)
* JavaScript
* Swiper.js (libreria JavaScript)
* Bootstrap 5
* Template personalizzato (Per dettagli sul template, [clicca qui](https://github.com/pantaleoflavio/cinemaAppFS))

### Back-End

* PHP OOP
* Gestione pacchetti con NPM e Composer

## Funzionalità Back-End

* Autenticazione utente (login/signup/logout)
* Visualizzazione dinamica in index di film e sale
* Visualizzazione dinamica di dettagli per film e sala singoli
* Prenotazione ("Book Now") con visualizzazione dinamica di film, sala, show disponibili (data e ora), e posti a sedere
* Gestione dinamica dei posti disponibili
* Carrello dinamico con possibilità di rimuovere elementi
* Checkout dinamico con preparazione dell'ordine e dati utente (necessaria autenticazione)
* Conferma del pagamento con generazione di un biglietto fittizio in formato PDF e spedizione via email
* Pagina di successo con svuotamento del carrello
* Funzionalità "Book Now" in index che reindirizza alla pagina di prenotazione dopo la selezione di film e sala
* Form di contatto generico implementato con PHPMailer
* Visualizzazione dinamica della pagina utente, con informazioni utente e storico ordini, e possibilità di modificare i dati utente

## Come Utilizzare l'App

### Prerequisiti

#### Prima di iniziare, assicurati di avere installato:

* Node.js e NPM: Utili per gestire le dipendenze front-end e compilare SASS o altri task runners.
* XAMPP: Fornisce un ambiente locale con PHP, server Apache e database MariaDB, facilitando l'esecuzione e il testing dell'app.
* Composer: Per gestire le dipendenze PHP del progetto.

### Setup Iniziale

1. Avvio di XAMPP: Avvia i servizi Apache e MySQL dal XAMPP Control Panel per avere un server locale e un database operativi.
2. Clonazione del Repository: Clona il repository del progetto nel tuo ambiente locale. Se il tuo server Apache punta a una directory diversa da htdocs, assicurati di clonare il progetto nella directory corretta.

```Copy code
git clone https://github.com/pantaleoflavio/BackendTemplateCinema /path/to/htdocs/
```

3. Installazione delle Dipendenze:

#### Nella directory principale del progetto, esegui il seguente comando per installare le dipendenze front-end tramite NPM:

```Copy code
cd /path/to/htdocs/BackendTemplateCinema
npm install
```

#### Per le dipendenze PHP, assicurati di essere nella directory principale del progetto e poi esegui Composer:

```Copy code
composer install
```

4. Configurazione del Database:

* Accedi a http://localhost/phpmyadmin dal tuo browser.
* Importa il file cinema.sql fornito nel progetto per strutturare il tuo database.

5. Avvio dell'Applicazione: Apri il tuo browser e naviga a http://localhost/BackendTemplateCinema/resources/Views/ per iniziare a esplorare l'app.

## Configurazione dell'Invio Email

* Per la funzionalità di invio email, apri app/Core/sendmailer.php e personalizza il metodo configure() con i dettagli del tuo server SMTP. È necessario modificare SMTP_USERNAME e SMTP_PASSWORD con le tue credenziali.

* Per la funzionalita di invio email nel form dei contatti, e necessario modificare l'email del destinatario, dove vuoi che arrivi la email, nella funzione sendContactForm().

## Concept del Progetto
****Questo progetto segue un'architettura MVC, con un focus sull'approccio OOP per organizzare la logica applicativa. Il front-end è basato su un template personalizzato che ho sviluppato, consentendo una presentazione unica e interattiva dei contenuti del cinema.
