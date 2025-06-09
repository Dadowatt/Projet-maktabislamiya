# Étape 1 : Builder Composer
FROM composer:latest AS composer

# Étape 2 : PHP avec Apache
FROM php:8.2-apache

# Installer les dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Activer le module rewrite d'Apache
RUN a2enmod rewrite

# Définir le répertoire racine sur /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copier les fichiers du projet
COPY . /var/www/html

# Définir les permissions correctes
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP (production)
RUN composer install --no-dev --optimize-autoloader

# Copier le .env s'il n'est pas déjà injecté par Render (optionnel si tu ne gères pas les variables dans le Dashboard)
# RUN cp .env.example .env

# Générer la clé d'application (inutile si tu la définis dans Render)
# RUN php artisan key:generate

# Appliquer les migrations
RUN php artisan migrate --force

# Nettoyer et regénérer le cache de configuration
RUN php artisan config:clear && php artisan config:cache

EXPOSE 80
