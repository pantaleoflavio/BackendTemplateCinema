# Usa l'immagine di base PHP 8.2 con Apache
FROM php:8.2.18-apache

# Imposta la directory di lavoro
WORKDIR /var/www/html

# Installare le dipendenze necessarie per PHP e strumenti
RUN apt-get update && apt-get install -y \
    curl \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Installazione di Node.js e npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Verifica dell'installazione di Node.js e npm
RUN node -v && npm -v

# Installazione di Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia dei file di configurazione
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Installazione delle dipendenze del progetto
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install
RUN npm install

# Copia il resto dei file del progetto nella directory di lavoro
COPY . .

# Espone le porte necessarie
EXPOSE 80
