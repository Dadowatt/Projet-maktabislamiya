FROM php:8.2-apache

# Installer les extensions PHP requises
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Activer mod_rewrite pour Laravel
RUN a2enmod rewrite

# Définir le bon DocumentRoot vers "public"
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Modifier la configuration Apache pour utiliser le bon DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copier le code de l’application
COPY . /var/www/html

# Fixer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP Laravel
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Créer le fichier .env si besoin
# ENV variables seront injectées par Render
RUN php artisan config:cache

# Exposer le port 80
EXPOSE 80
