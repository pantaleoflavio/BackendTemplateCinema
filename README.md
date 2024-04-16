# Cinema Fake Web App

### The Cinema Fake Web App is a full-stack platform for managing and booking movies at an imaginary cinema. This project combines a robust PHP back-end with an elegant front-end, based on a custom template I created from scratch.

## Technologies Used

### Front-End

* HTML/CSS (with SASS)
* JavaScript
* Swiper.js (JavaScript library)
* Bootstrap 5
* Custom template (For details on the template, [click here](https://github.com/pantaleoflavio/cinemaAppFS))

### Back-End

* PHP OOP
* Package management with NPM and Composer

## Back-End Features

* User authentication (login/signup/logout)
* Dynamic display on index of movies and theaters
* Dynamic display of individual movie and theater details
* Booking ("Book Now") with dynamic display of selected movie, theater, available shows (date and time), and seating
* Dynamic management of available seats
* Dynamic cart with the ability to remove items
* Dynamic checkout with order preparation and user data (authentication required)
* Payment confirmation with the generation of a fake ticket in PDF format and email dispatch
* Success page with cart clearance
* "Book Now" functionality on index that redirects to the booking page after selecting movie and theater
* Generic contact form implemented with PHPMailer
* Dynamic display of the user page, with user information and order history, and the ability to modify user data

## How to Use the App

### Prerequisites

#### Before you start, make sure you have installed:

* Node.js and NPM: Useful for managing front-end dependencies and compiling SASS or other task runners.
* XAMPP: Provides a local environment with PHP, Apache server, and MariaDB database, facilitating app execution and testing.
* Composer: To manage the project's PHP dependencies.

### Initial Setup

1. Starting XAMPP: Launch Apache and MySQL services from the XAMPP Control Panel to have a local server and database operational.

2. Cloning the Repository: Clone the project's repository into your local environment. If your Apache server points to a directory other than htdocs, make sure to clone the project into the correct directory.

```Copy code
git clone https://github.com/pantaleoflavio/BackendTemplateCinema /path/to/htdocs/
```

3. Installing Dependencies:

#### In the project's main directory, run the following command to install front-end dependencies via NPM:

```Copy code
cd /path/to/htdocs/BackendTemplateCinema
npm install
```

#### For PHP dependencies, make sure you're in the main project directory and then execute Composer:

```Copy code
composer install
```

4. Database Configuration:

* Access http://localhost/phpmyadmin from your browser.
* Import the cinema.sql file provided in the project to structure your database.

5. Configuration of the File .env:

* Rename the file `.env.example` to `.env` in your main directory of the project
* Modify the file `.env` with your configurations.


6. Launching the Application: Open your browser and navigate to http://localhost/BackendTemplateCinema/resources/Views/ to start exploring the app.

## Email Sending Configuration

* To configure email sending, make sure the SMTP variables in your .env file are set correctly. It's not necessary to modify the code files directly for this configuration.

## Project Concept
****This project follows an MVC architecture, with a focus on the OOP approach to organize application logic. The front-end is based on a custom template I developed, allowing for a unique and interactive presentation of the cinema's contents.