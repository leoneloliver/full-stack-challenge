FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libzip-dev \
    sqlite3 \
    libsqlite3-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd zip

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader

# Set correct permissions
RUN chmod -R 777 /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 777 /var/www

# Create .env file from example if it doesn't exist
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Create SQLite database
RUN mkdir -p /var/www/database
RUN touch /var/www/database/database.sqlite
RUN chmod 777 /var/www/database/database.sqlite

# Generate application key if not set
RUN php artisan key:generate --force

# Setup environment variables for database
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/database/database.sqlite
ENV APP_ENV=production
ENV APP_DEBUG=true

# Run migrations and seeders
RUN php artisan migrate:fresh --force
RUN php artisan db:seed --force

# Create storage link
RUN php artisan storage:link

# Enable error logging
RUN touch /var/www/storage/logs/laravel.log
RUN chmod 777 /var/www/storage/logs/laravel.log

# Install and build frontend assets
RUN npm install
RUN npm run build

# Expose port 8000 and start php-fpm server
EXPOSE 8000

# Command to run PHP's built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
