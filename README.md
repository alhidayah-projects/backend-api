<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/alhidayah-projects/backend-api.git">
    <img src="./public/assets/logo.png" alt="Logo" width="300" height="300">
  </a>

  <h2 align="center">Al-hidayah Baitul Hatim</h2>
</p>

**setup sanctum package**

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
-   GET : `/api/user`

**Endpoint Contact**

-   POST : `/api/contact`
-   GET : `/api/contact`
-   GET : `/api/contact/{id}`
-   DELETE : `/api/contact/{id}`
-   DELETE : `/api/contact`

**Endpoint Rekening**

-   POST : `/api/rekening`
-   GET : `/api/rekening`
-   GET : `/api/rekening{id}`
-   PUT : `/api/rekening{id}`
-   DELETE : `api/rekening{id}`
-   DELETE : `api/rekening`
