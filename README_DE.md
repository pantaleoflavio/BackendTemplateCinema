# Cinema Fake Web App

### Die Cinema Fake Web App ist eine Full-Stack-Plattform zur Verwaltung und Buchung von Filmen in einem fiktiven Kino. Dieses Projekt kombiniert ein robustes PHP-Backend mit einem eleganten Frontend, basierend auf einer benutzerdefinierten Vorlage, die ich von Grund auf neu erstellt habe.

## Verwendete Technologien

### Front-End
* HTML/CSS (mit SASS)
* JavaScript
* Swiper.js (JavaScript-Bibliothek)
* Bootstrap 5
* Benutzerdefinierte Vorlage (Für Details zur Vorlage, klicken Sie hier)

### Back-End
* PHP OOP
* Paketverwaltung mit NPM und Composer
* Docker (zur Containerisierung der Anwendung)

## Back-End-Funktionen

* Benutzer-Authentifizierung (Login/Signup/Logout)
* Dynamische Anzeige von Filmen und Kinos im Index
* Dynamische Anzeige von Details zu einzelnen Filmen und Kinos
* Buchung ("Jetzt buchen") mit dynamischer Anzeige von Filmen, Kinos, verfügbaren Shows (Datum und Uhrzeit) und Sitzplätzen
* Dynamisches Management verfügbarer Sitzplätze
* Dynamischer Warenkorb mit der Möglichkeit, Artikel zu entfernen
* Dynamischer Checkout mit Bestellvorbereitung und Benutzerdaten (Authentifizierung erforderlich)
* Zahlungsbestätigung mit Generierung eines fiktiven Tickets im PDF-Format und Versand per E-Mail
* Erfolgsseite mit Warenkorb-Entleerung
* "Jetzt buchen"-Funktion im Index, die nach der Auswahl von Film und Kino zur Buchungsseite weiterleitet
* Allgemeines Kontaktformular, implementiert mit PHPMailer
* Dynamische Anzeige der Benutzerseite, mit Benutzerinformationen und Bestellhistorie sowie der Möglichkeit, Benutzerdaten zu ändern
* Admin-Funktionalitäten

## Nutzung der App

### WENN SIE DOCKER VERWENDEN

### Voraussetzungen für die Verwendung von Docker:

#### Wenn Sie sich entscheiden, die App mit Docker zu öffnen, stellen Sie sicher, dass Sie die neueste Version von Docker Desktop installiert haben

### Ersteinrichtung

1. Starten Sie Docker Desktop.
2. Klonen Sie das Repository: Klonen Sie das Projekt-Repository in Ihre lokale Umgebung. Zum Beispiel:

```Copy code
git clone https://github.com/pantaleoflavio/BackendTemplateCinema /path/to/htdocs/
```

3. Stellen Sie sicher, dass Sie eine `.env` Datei erstellen oder die im Repository enthaltene verwenden und wie folgt anpassen:

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

3. Montieren und starten Sie den Docker-Container in Ihrem Terminal. Für die erste Verwendung können Sie diese Befehle verwenden:

```Copy code
docker-compose build
docker-compose up
```

Für nachfolgende Verwendungen, um eine reibungslose App-Leistung und bessere Effizienz aufrechtzuerhalten, empfehle ich diesen Befehl:

```Copy code
docker-compose down -v; if ($?) { docker-compose build; if ($?) { docker-compose up } }
```

4. Öffnen Sie einen Browser Ihrer Wahl und navigieren Sie zu `http://localhost:8080/` für die Hauptseite der Anwendung und `http://localhost:8081/` für die Datenbankverwaltung.

Stellen Sie sicher, dass die cinema-Datenbank existiert oder gefüllt ist; falls nicht, können Sie `http://localhost:8081/` öffnen, auf die `cinema` Datenbank klicken, auf `Importieren` klicken und die `cinema.sql` Datei importieren, die im Hauptverzeichnis dieses Projekts zu finden ist.

5. Melden Sie sich mit diesen Zugangsdaten an:

```Copy code
email: john@dean.com
password: password
```

oder Sie können einen neuen Benutzer mit der Signup-Funktion erstellen (wenn Sie das Admin-Dashboard testen möchten, denken Sie daran, die role des neuen Benutzers in der Datenbank zu ändern).

## WENN SIE DOCKER NICHT VERWENDEN

### Voraussetzungen, wenn Docker nicht verwendet wird

#### Stellen Sie vor Beginn sicher, dass Sie Folgendes installiert haben:

* Node.js und NPM: Nützlich zum Verwalten von Front-End-Abhängigkeiten und zum Kompilieren von SASS oder anderen Task-Runners.
* XAMPP: Bietet eine lokale Umgebung mit PHP, Apache-Server und MariaDB-Datenbank, was die Ausführung und das Testen der App erleichtert.
* Composer: Zum Verwalten der PHP-Abhängigkeiten des Projekts.

### Ersteinrichtung

1. Starten Sie XAMPP: Starten Sie die Apache- und MySQL-Dienste über das XAMPP Control Panel, um einen lokalen Server und eine Datenbank zu haben.
2. Klonen Sie das Repository: Klonen Sie das Projekt-Repository in Ihre lokale Umgebung. Wenn Ihr Apache-Server auf ein anderes Verzeichnis als htdocs zeigt, stellen Sie sicher, dass Sie das Projekt in das richtige Verzeichnis klonen.

```Copy code
git clone https://github.com/pantaleoflavio/BackendTemplateCinema /path/to/htdocs/
```

3. Installieren Sie die Dependencies:

#### Führen Sie im Hauptverzeichnis des Projekts den folgenden Befehl aus, um die Front-End-Abhängigkeiten über NPM zu installieren:

```Copy code
cd /path/to/htdocs/BackendTemplateCinema
npm install
```

#### Für die PHP-Abhängigkeiten stellen Sie sicher, dass Sie sich im Hauptverzeichnis des Projekts befinden, und führen dann Composer aus:

```Copy code
composer install
```

4. Datenbankkonfiguration:

* Greifen Sie von Ihrem Browser aus auf `http://localhost/phpmyadmin` zu.
* Importieren Sie die bereitgestellte `cinema.sql` Datei aus dem Projekt, um Ihre Datenbank zu strukturieren.

5. Konfigurieren Sie die `.env` Datei:

* Benennen Sie die `.env.exampe` in `.env` im Hauptverzeichnis des Projekts um
* Passen Sie die `.env` Datei mit Ihren spezifischen Konfigurationen an.

6. Starten Sie die Anwendung: Öffnen Sie Ihren Browser und navigieren Sie zu `http://localhost/BackendTemplateCinema/`, um die App zu erkunden.

## E-Mail-Konfiguration

* Um den E-Mail-Versand zu konfigurieren, stellen Sie sicher, dass die SMTP-Variablen in Ihrer .env-Datei korrekt eingestellt sind. Es ist nicht notwendig, die Code-Dateien direkt für diese Konfiguration zu ändern.

## Projektkonzept
Dieses Projekt folgt einer MVC-Architektur, mit einem Fokus auf den OOP-Ansatz zur Organisation der Anwendungslogik. Das Frontend basiert auf einer benutzerdefinierten Vorlage, die ich entwickelt habe, und ermöglicht eine einzigartige und interaktive Präsentation der Kino-Inhalte.

Zusätzlich wurde die notwendige Konfiguration für die Verwendung eines Docker-Containers hinzugefügt.