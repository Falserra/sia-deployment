# 1. Use a small PHP image with the necessary engine
FROM php:8.2-fpm-alpine

# 2. Install MySQL support (so Lumen can talk to your DB)
RUN docker-php-ext-install pdo pdo_mysql

# 3. Set the "Home" directory inside the container
WORKDIR /var/www

# 4. Copy your code from your PC into the container
COPY . .

# 5. Bring in Composer to install your dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 6. Open the port for the Gateway (8002)
EXPOSE 8002

# 7. Start the server
# 0.0.0.0 tells it to listen to external requests (like Postman or Railway)
CMD ["php", "-S", "0.0.0.0:8001", "-t", "public"]