FROM php:8.1.2-apache

# Installation des dépendances nécessaires
RUN apt-get update && apt-get install -y \
    curl \
    git \
    libzip-dev \
    unzip

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Installez Node.js et npm
RUN apt-get update && apt-get install -y nodejs npm
# Installation d'Angular CLI
RUN npm install -g @angular/cli

# Installation de l'extension mysqli pour PHP
RUN docker-php-ext-install mysqli

# Installation de Laravel
RUN composer global require laravel/installer

# Exposer le port 80 pour Apache
EXPOSE 80
     
