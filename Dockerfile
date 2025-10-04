# Simple PHP-Apache image with CI3
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libsqlite3-dev \
 && docker-php-ext-install pdo pdo_sqlite \
 && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html

WORKDIR /var/www/html

# Copy app
COPY . /var/www/html

# Set DirectoryIndex
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
    && echo "<Directory /var/www/html>\n    AllowOverride All\n</Directory>" >> /etc/apache2/apache2.conf

# Writable directories
RUN mkdir -p application/cache/sessions application/database \
 && chown -R www-data:www-data application/cache application/database \
 && chmod -R 775 application/cache application/database

EXPOSE 80
CMD ["apache2-foreground"]
