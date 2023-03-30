FROM php:7.0.33-apache-stretch

ENV APACHE_DOCUMENT_ROOT /var/www/html/web
ENV COMPOSER_ALLOW_SUPERUSER=1
ARG BUILD_ENV

RUN  apt-get update && apt-get install -y ca-certificates gnupg

RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y nodejs


RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN /usr/sbin/a2enmod rewrite && /usr/sbin/a2enmod headers && /usr/sbin/a2enmod expires

RUN apt-get update && apt-get install -y libzip-dev zip libssl-dev \
    libcurl4-openssl-dev

RUN docker-php-ext-install pdo pdo_mysql mysqli

# RUN apt-get install -y libtidy-dev && docker-php-ext-install tidy && docker-php-ext-enable tidy


RUN pecl install mongodb-1.2.0 && docker-php-ext-enable mongodb

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer require mongodb/mongodb
RUN composer require vlucas/phpdotenv


RUN if [ "$BUILD_ENV" = "development" ]; then \
        pecl install xdebug-2.5.5 && docker-php-ext-enable xdebug && \
        echo 'zend_extension=/usr/local/etc/php/conf.d/docker-php-ext-xdebug' >> /usr/local/etc/php/php.ini && \
        echo 'xdebug.mode=develop,debug' >> /usr/local/etc/php/php.ini && \
        echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/php.ini && \
        echo 'xdebug.start_with_request=yes' >> /usr/local/etc/php/php.ini && \
        echo 'session.save_path = "/tmp"' >> /usr/local/etc/php/php.ini; \
    fi

COPY start.sh /usr/local/bin/start.sh

# Make the shell script executable
RUN chmod +x /usr/local/bin/start.sh

# Start the shell script as the command to keep the container running
CMD ["/usr/local/bin/start.sh"]