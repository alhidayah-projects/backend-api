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
