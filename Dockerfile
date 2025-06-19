# === Stage 1: Build composer dependencies ===
FROM composer:2.7 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --prefer-dist --no-scripts --no-interaction --optimize-autoloader


# Copy seluruh kode aplikasi
COPY . .

# === Stage 2: PHP runtime + Node.js (buat Tailwind) ===
FROM php:8.3-fpm-alpine AS app

# Install dependencies sistem
RUN apk add --no-cache \
    bash \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    zlib-dev \
    curl \
    git \
    unzip \
    tzdata \
    netcat-openbsd \
    nodejs \
    npm && \
    docker-php-ext-install pdo pdo_mysql zip intl opcache && \
    cp /usr/share/zoneinfo/Asia/Jakarta /etc/localtime && \
    echo "Asia/Jakarta" > /etc/timezone

# Copy source code
WORKDIR /var/www

COPY --from=vendor /app /var/www
COPY --from=vendor /app/vendor /var/www/vendor

# Hapus cache Laravel lama
RUN rm -rf bootstrap/cache/*.php

# Jalankan build Tailwind
RUN npm install && npm run build


# Copy entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Buat folder yang perlu dan atur permission
RUN mkdir -p /var/www/storage/logs /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Ganti user ke www-data
USER www-data

ENTRYPOINT ["/entrypoint.sh"]