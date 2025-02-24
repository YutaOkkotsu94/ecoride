# Utilisation de PHP avec Apache
FROM php:8.2-apache

# Installation des extensions nécessaires
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Activation du module Apache rewrite
RUN a2enmod rewrite

# Définition du répertoire de travail
WORKDIR /var/www/html

# Copie des fichiers Symfony dans le conteneur
COPY . .

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installation des dépendances Symfony
RUN composer install --no-dev --optimize-autoloader

# Droits sur le dossier var/
RUN chown -R www-data:www-data var

# Exposer le port 80
EXPOSE 80

CMD ["apache2-foreground"]