FROM php:8.2-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Создание пользователя www-data и установка прав
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

# Копируем файлы приложения
COPY ./app /var/www/html

# Устанавливаем правильные владельца и права
RUN chown -R www:www /var/www/html && \
    chmod -R 775 /var/www/html/storage && \
    chmod -R 775 /var/www/html/bootstrap/cache

# Переключаемся на пользователя www
USER www

WORKDIR /var/www/html