<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# How to Run This Project

## Prerequisites
- PHP 8.0+ and Composer
- MySQL or compatible database
- Git

## Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/leoneloliver/full-stack-challenge.git
   cd full-stack-challenge
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Set up the environment file**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run database migrations**
   ```bash
   php artisan migrate
   ```

5. **Run the database seeders**
   ```bash
   php artisan db:seed
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

Your application should now be running at `http://localhost:8000`.

## Note
Make sure to configure your database connection in the `.env` file before running migrations and seeders.
