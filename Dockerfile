FROM ubuntu:16.04

WORKDIR /var/www/app

# ENV APP_DIR="/var/www/app" \
#     APP_PORT="80"

# Update
# RUN apt-get update

# base tool
RUN apt-get update && apt-get install -y curl python git unzip

RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -

# tool php7
RUN apt-get update  && apt-get install -y \
    php7.0 \
    php7.0-mysql \
    php7.0-fpm \
    php-mbstring \
    php7.0-xml \
    php7.0-gd \
    php7.0-curl \
    php7.0-zip \
    composer

# nodejs tool
RUN apt-get install -y nodejs build-essential \ 
    && npm install yarn -g 

# RUN cd /var && mkdir www && cd www && mkdir app

# VOLUME /var/lib/jenkins/workspace

CMD composer install