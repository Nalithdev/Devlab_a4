# Utiliser une image PHP avec FPM et Composer
FROM php:8.2-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install \
    intl \
    opcache \
    pdo_mysql \
    zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
WORKDIR /home/nalith/www/devlab_a4
COPY . .

# Installer les dépendances Symfony
RUN composer install --no-dev --optimize-autoloader

# Changer les permissions
RUN chown -R www-data:www-data /home/nalith/www/devlab_a4

# Exposer le port pour le conteneur
EXPOSE 9000

# Commande de démarrage par défaut
CMD ["php-fpm"]
