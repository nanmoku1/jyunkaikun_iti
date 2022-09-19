FROM php:7.2-fpm

RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash -

#git, nodejs, その他必要な物、後で使いそうな物インストール
RUN apt-get update

RUN apt-get install -y \
 git \
 build-essential \
 default-mysql-client \
 zip \
 vim \
 unzip \
 nodejs

#pdoインストール
RUN docker-php-ext-install pdo_mysql

#xdebugインストール
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug


#composerインストール
RUN curl -sS https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

#volumeマウントして結局マウントしたパーミッションに変わるので意味がない
#RUN chmod -R 777 /var/www/html
