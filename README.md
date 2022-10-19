<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/alhidayah-projects/backend-api.git">
    <img src="./public/assets/logo.png" alt="Logo" width="200" height="270">
  </a>

  <h2 align="center">Alhidayah Baitul Hatim</h2>
</p>

# setup sanctum package

```
composer require laravel/sanctum
```

```
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

```
php artisan migrate
```

```
php artisan make:controller Api/AuthController
```

```
php artisan serve
```

**Endpoint AUTH**

-   POST : `/api/register` (register)
-   POST :`/api/login` (login)
-   GET :`/api/user` (get user by token)
-   POST :`/api/logout` (logout)
-   PUT :`/api/user` (update user)
-   POST :`/api/forgot-password` (forgot password)
-   POST :`/api/reset-password` (reset password)

**Endpoint Contact**

-   POST : `/api/contact`
-   GET : `/api/contact`
-   GET : `/api/contact/{id}`
-   DELETE : `/api/contact/{id}`
-   DELETE : `/api/contact`
