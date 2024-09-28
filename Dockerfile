FROM php:8.2-apache

RUN apt-get update && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli
RUN docker-php-ext-configure mysqli --with-mysqli=mysqlnd

WORKDIR /var/www/

COPY . .


CMD ["apache2ctl", "-D", "FOREGROUND"]