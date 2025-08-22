# ============================
# Stage 1 - Build frontend (Node)
# ============================
FROM node:20-alpine AS frontend

WORKDIR /app

# Copiamos package.json y lock
COPY package*.json ./
COPY vite.config.js ./
COPY resources ./resources
COPY tailwind.config.js ./tailwind.config.js
COPY postcss.config.js ./postcss.config.js
RUN mkdir public

# Instalamos dependencias
RUN npm install

# Compilamos assets (Tailwind, Vite o Mix)
RUN npm run build



# ============================
# Stage 2 - Build PHP/Laravel
# ============================
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libonig-dev \
    libxml2-dev \
    curl \
    zip \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install pdo_mysql mbstring xml zip bcmath intl \
    && apt-get clean

# Fix de Git ownership para Composer
RUN git config --global --add safe.directory /var/www/html

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crear directorio
WORKDIR /var/www/html

# Copiar composer.* primero (para aprovechar caché)
COPY composer.json composer.lock ./
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Copiar código Laravel

# Copiar assets ya compilados desde el stage frontend
COPY --from=frontend /app/public/build ./public/build

# Exponer PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
