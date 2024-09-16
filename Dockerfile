FROM ubuntu:latest

RUN apt-get update && \
    apt-get install -y apache2 php php-cli php-mysql && \
    apt-get clean

WORKDIR /var/www/html/

COPY . .


CMD ["apache2ctl", "-D", "FOREGROUND"]