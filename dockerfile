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

# 9. Ajuster les permissions pour que l'utilisateur Apache (www-data) puisse accéder aux fichiers
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Installation des dépendances Symfony
RUN composer install --no-interaction --optimize-autoloader

# 10. Copier le fichier de configuration Apache personnalisé
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# 11. (Optionnel) Vous pouvez vérifier la configuration avec apachectl configtest ici si besoin

# 12. Exposer le port 80 pour l'accès HTTP
EXPOSE 80

# 13. Lancer Apache en mode foreground
CMD ["apache2-foreground"]