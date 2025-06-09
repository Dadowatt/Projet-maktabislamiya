# Étape 1 : image pour installer les dépendances avec Composer
FROM composer:latest AS composer

# Étape 2 : image PHP + Apache
FROM php:8.2-apache

# Active les modules Apache
RUN a2enmod rewrite

# Installe les extensions PHP nécessaires à Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Copie les fichiers du projet dans le conteneur
COPY . /var/www/html

# Donne les bons droits
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copie Composer depuis l'image précédente
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Installe les dépendances PHP en mode production
RUN composer install --no-dev --optimize-autoloader

# Copie le fichier .env si tu veux, mais Render utilise les variables d'env, donc tu peux ignorer ceci :
# RUN cp .env.example .env

# Génère la clé d’application (sera écrasée si la clé est dans les envVars Render)
# Tu peux aussi le faire via startCommand dans render.yaml
# RUN php artisan key:generate

# Expose le port 80
EXPOSE 80
