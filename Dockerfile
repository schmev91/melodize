# First stage: Build with Node.js and Yarn
FROM node:22 AS build

# Set working directory
WORKDIR /app

# Copy package.json and yarn.lock first to leverage Docker cache
COPY package.json bun.lockb ./

# Install dependencies with Yarn
RUN npm install

# Copy the rest of the project
COPY . .

# Run the build script
RUN npm run build

# Second stage: PHP 8.2 Bullseye
FROM mcr.microsoft.com/devcontainers/php:1-8.2-bullseye

# Set working directory
WORKDIR /app

# # Install MongoDB extension
# RUN apt-get update && apt-get install -y libsodium-dev \
#     && docker-php-ext-install pdo pdo_mysql sodium \
#     && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Install necessary extensions for SQLite
RUN apt-get update && apt-get install -y libsodium-dev libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite sodium \
    && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini


# Copy only the necessary files from the build stage
COPY --from=build /app /app

# Install Composer dependencies
RUN composer install --optimize-autoloader --no-dev \
    && php artisan storage:link
# Expose the port and start the application
EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]

# Custom entrypoint script
# CMD nohup php artisan serve --host=0.0.0.0 --port=8000 & \
#     php artisan schedule:work