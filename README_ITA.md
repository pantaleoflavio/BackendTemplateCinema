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
* Docker (per la containerizzazione dell'applicazione)

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
* Funzionalita' Admin

## Come Utilizzare l'App

## SE UTILIZZI DOCKER

### Prerequisiti se Utilizzi Docker:

#### Se scegli di Aprire l'App con Docker, ricorda di installare la versione piu' aggiornata di Docker Desktop

### Setup Iniziale

1. Avvia Docker Desktop.
2. Clonazione del Repository: Clona il repository del progetto nel tuo ambiente locale. Ad esempio:

```Copy code
git clone https://github.com/pantaleoflavio/BackendTemplateCinema /path/to/htdocs/
```

3. Assicurati di creare un file `.env`, o di utilizzare quello incluso in questo Repository e modificarlo come segue:

```Copy code
DB_HOST=db
DB_NAME=cinema
DB_USER=root
DB_PASS=
SMTP_HOST=hostYouWillUseForEmailTesting
SMTP_USERNAME=your_email@email.com
SMTP_PASSWORD=your_password
SMTP_PORT=587
SMTP_RECIPIENT=your_destination_email@email.com

```

4. Sul tuo terminale monta e avvia il Container Docker. Per il primo utilizzo puoi usare questi comandi:

```Copy code
docker-compose build
docker-compose up
```

Per Utilizzi successivi, per mantenere una buona fluidita' dell'app e prestazioni migliori, consiglio questo comando:

```Copy code
docker-compose down -v; if ($?) { docker-compose build; if ($?) { docker-compose up } }
```

5. Dopo aver montato il Container Docker, esegui:

```Copy code
cd BackendTemplateCinema
docker exec -it cinema bash
composer install
npm install
```

In questo modo verranno installate le dipendenze Composer e Npm direttamente nel Container, senza dover avere i vari programmi installati.

6. Apri sul un Browser a tua scelta il percorso `http://localhost:8080/` per la pagina principale dell'Applicazione e `http://localhost:8081/` per la gestione del Database.

7. Assicurati che il database `cinema` esista o che sia popolato, nel caso puoi aprire `http://localhost:8081/`cliccare sul database `cinema`, clicca su `importa` ed importa il file `cinema.sql` che troverai nella directory principale di questo progetto.

8. Fai il il login con questi dati:

```Copy code
email: john@dean.com
password: password
```

oppure puoi creare un nuovo utente con la funzionalita' `signup` (se vuoi testare la dashboard Admin, ricordati di modificare il `role` del nuovo user nel Database)

## SE NON UTILIZZI DOCKER

### Prerequisiti se non Utilizzi Docker

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

* Access `http://localhost/phpmyadmin` from your browser.
* Importa il file `cinema.sql` fornito nel progetto per strutturare il tuo database.

5. Configurazione del File .env:

* Rinomina il file `.env.exampe` in `.env` nella directory principale del progetto
* Modifica il file `.env` con le tue configurazioni specifiche.

6. Avvio dell'Applicazione: Apri il tuo browser e naviga a http://localhost/BackendTemplateCinema/ per iniziare a esplorare l'app.

## Configurazione dell'Invio Email

* Per configurare l'invio email, assicurati che le variabili SMTP nel tuo file .env siano impostate correttamente. Non è necessario modificare i file di codice direttamente per questa configurazione.

## Concept del Progetto

****Questo progetto segue un'architettura MVC, con un focus sull'approccio OOP per organizzare la logica applicativa. Il front-end è basato su un template personalizzato che ho sviluppato, consentendo una presentazione unica e interattiva dei contenuti del cinema.

Inoltre e' stata aggiunta la configurazione necessaria per utilizzare un Container Docker.
