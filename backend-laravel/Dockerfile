FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip git unzip && \
    docker-php-ext-install pdo_mysql gd

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
COPY . .

# Dar permisos a la carpeta antes de instalar
RUN chown -R www-data:www-data /var/www/html
# Ejecutar composer como root para evitar fallos de permisos en AWS
RUN composer install --no-interaction --optimize-autoloader --no-dev

CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000