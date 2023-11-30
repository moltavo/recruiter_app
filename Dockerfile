FROM docker.io/bitnami/laravel:9.5.1 as builder

COPY app /app

WORKDIR /
RUN apt-get update  --fix-missing
RUN apt-get install wget -y

# Fix to automatically convert CRLF docker-compose.sh to LF for Windows Users.
RUN apt-get install -y dos2unix
COPY bin/docker-entrypoint.sh /docker-entrypoint.sh
RUN dos2unix /docker-entrypoint.sh && apt-get --purge remove -y dos2unix && rm -rf /var/lib/apt/lists/*
RUN chmod a+x /docker-entrypoint.sh

# Install Composer with required libraries
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php

WORKDIR /app 

EXPOSE 8000

ENTRYPOINT ["/docker-entrypoint.sh"]