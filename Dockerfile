# Base image: PHP-FPM 8.2
FROM php:8.2-fpm

# Install system dependencies + Nginx
RUN apt-get update && apt-get install -y \
    nginx \
    netcat-openbsd \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js & npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm cache clean --force

# Set working directory
WORKDIR /var/www/html

# Copy entire project
COPY . .

# Install backend & frontend dependencies
RUN composer install --no-interaction --optimize-autoloader \
    && npm ci \
    && npm run build

# Copy Nginx config & entrypoint
RUN rm -rf /etc/nginx/sites-enabled/
COPY nginx/default.conf /etc/nginx/conf.d/default.conf
COPY entrypoint.sh ./entrypoint.sh
RUN chmod +x ./entrypoint.sh && chmod -R 777 storage bootstrap/cache

# Expose web
EXPOSE 80

# Start script
ENTRYPOINT ["/bin/sh", "./entrypoint.sh"]