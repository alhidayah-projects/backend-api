<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## setup sanctum package

-   composer require laravel/sanctum
-   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
-   php artisan migrate
-   php artisan make:controller Api/AuthController
-   php artisan serve

## Endpoint AUTH

-   POST /api/register (regiter)
-   POST /api/login (login)
-   GET /api/user (get user by token)
-   POST /api/logout (logout)
-   PUT /api/user (update user)
-   POST /api/forgot-password (forgot password)
-   POST /api/reset-password (reset password)

## Endpoint Contact

-   POST /api/contact
-   GET /api/contact
-   GET /api/contact/{id}
-   DELETE /api/contact/{id}
