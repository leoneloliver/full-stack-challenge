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
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Set correct permissions
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Create .env file from example if it doesn't exist
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Create SQLite database
RUN mkdir -p /var/www/database
RUN touch /var/www/database/database.sqlite
RUN chmod 777 /var/www/database/database.sqlite

# Install dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Generate application key if not set
RUN php artisan key:generate --force

# Run migrations
RUN php artisan migrate --force

# Create storage link
RUN php artisan storage:link

# Enable error logging
RUN touch /var/www/storage/logs/laravel.log
RUN chmod 777 /var/www/storage/logs/laravel.log

# Install and build frontend assets
RUN npm install
RUN npm run build

# Set up a health check
HEALTHCHECK --interval=30s --timeout=30s --start-period=5s --retries=3 \
    CMD curl -f http://localhost:8000 || exit 1

# Expose port 8000 and start php-fpm server
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
