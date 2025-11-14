FROM php:8.2-apache

# Arguments
ARG USER_ID=1000
ARG GROUP_ID=1000

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    libicu-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installation des extensions PHP
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl \
    opcache

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Activer mod_rewrite pour Symfony
RUN a2enmod rewrite

# Copier la configuration Apache
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Configuration utilisateur
RUN groupadd -g ${GROUP_ID} appuser || true \
    && useradd -u ${USER_ID} -g appuser -m appuser || true

# Configuration du répertoire de travail
WORKDIR /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Exposer le port
EXPOSE 80

CMD ["apache2-foreground"]