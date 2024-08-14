# Cinema Fake Web App

### The Cinema Fake Web App is a full-stack platform for managing and booking movies at an imaginary cinema. This project combines a robust PHP backend with an elegant frontend, based on a custom template that I created from scratch.

## Technologies Used

### Front-End

* HTML/CSS (with SASS)
* JavaScript
* Swiper.js (JavaScript library)
* Bootstrap 5
* Custom Template (For details on the template, [click here](https://github.com/pantaleoflavio/cinemaAppFS))

### Back-End

* PHP OOP
* Package management with NPM and Composer
* Docker (for application containerization)

## Back-End Features

* User authentication (login/signup/logout)
* Dynamic display of movies and theaters on the index page
* Dynamic display of details for individual movies and theaters
* Booking ("Book Now") with dynamic display of movies, theaters, available shows (date and time), and seats
* Dynamic management of available seats
* Dynamic cart with the ability to remove items
* Dynamic checkout with order preparation and user data (authentication required)
* Payment confirmation with generation of a fictitious ticket in PDF format and email delivery
* Success page with cart clearing
* "Book Now" feature on the index page that redirects to the booking page after selecting a movie and theater
* Generic contact form implemented with PHPMailer
* Dynamic display of the user page, with user information and order history, and the ability to modify user data
* Admin functionalities

## How to Use the App

## IF YOU USE DOCKER

### Prerequisites for Using Docker:

#### If you choose to open the app with Docker, make sure to install the latest version of Docker Desktop

### Initial Setup

1. Start Docker Desktop.
2. Clone the Repository: Clone the project repository into your local environment. For example:

```Copy code
git clone https://github.com/pantaleoflavio/BackendTemplateCinema /path/to/htdocs/
```

3. Make sure to create a .env file, or use the one included in this repository and modify it as follows:

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

4. On your terminal, mount and start the Docker container. For the first use, you can use these commands:

```Copy code
docker-compose build
docker-compose up
```

For subsequent uses, to maintain smooth app performance and better efficiency, I recommend this command:

```Copy code
docker-compose down -v; if ($?) { docker-compose build; if ($?) { docker-compose up } }
```

5. After building the Docker Container, run:

```Copy code
cd BackendTemplateCinema
docker exec -it cinema bash
composer install
npm install
```

This way the Composer and Npm dependencies will be installed directly into the Container, without having to have the various programs installed.

6. Open a browser of your choice and navigate to `http://localhost:8080/` for the main application page and `http://localhost:8081/` for database management.

Ensure that the cinema database exists or is populated; if not, you can open `http://localhost:8081/`, click on the `cinema` database, click on `import`, and import the `cinema.sql` file found in the main directory of this project.

7. Log in with these credentials:

```Copy code
email: john@dean.com
password: password
```

or you can create a new user with the `signup` feature (if you want to test the Admin dashboard, remember to change the new user's `role` in the database).

## IF YOU DO NOT USE DOCKER

### Prerequisites for Not Using Docker

#### Before starting, make sure to have installed:

* Node.js and NPM: Useful for managing front-end dependencies and compiling SASS or other task runners.
* XAMPP: Provides a local environment with PHP, Apache server, and MariaDB database, facilitating the execution and testing of the app.
* Composer: To manage the PHP dependencies of the project.

### Initial Setup

1. Start XAMPP: Start the Apache and MySQL services from the XAMPP Control Panel to have a local server and database operational.
2. Clone the Repository: Clone the project repository into your local environment. If your Apache server points to a directory other than htdocs, make sure to clone the project into the correct directory.

```Copy code
git clone https://github.com/pantaleoflavio/BackendTemplateCinema /path/to/htdocs/
```

3. Install Dependencies:

#### In the main project directory, run the following command to install the front-end dependencies via NPM:

```Copy code
cd /path/to/htdocs/BackendTemplateCinema
npm install
```

#### For PHP dependencies, make sure to be in the main project directory and then run Composer:

```Copy code
composer install
```

4. Database Configuration:

* Access `http://localhost/phpmyadmin` from your browser.
* Import the provided `cinema.sql` file from the project to structure your database.

5. Configure the .env File:

* Rename the `.env.exampe` to `.env` in the main project directory
* Modify the .env file with your specific configurations.

6. Start the Application: Open your browser and navigate to http://localhost/BackendTemplateCinema/ to start exploring the app.

## Email Configuration

* To configure email sending, make sure the SMTP variables in your .env file are set correctly. There is no need to modify the code files directly for this configuration.

## Project Concept

This project follows an MVC architecture, with a focus on the OOP approach to organize the application logic. The front-end is based on a custom template that I developed, allowing for a unique and interactive presentation of cinema content.

Additionally, the necessary configuration for using a Docker container has been added.