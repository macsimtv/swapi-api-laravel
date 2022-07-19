FROM webdevops/php-apache:8.0-alpine

COPY . .

RUN composer install

RUN php artisan key:generate
RUN php artisan migrate
RUN php artisan data:scrape
