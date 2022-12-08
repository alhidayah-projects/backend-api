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

-   POST : `/api/register` only admin
-   POST :`/api/login`
-   POST :`/api/logout`
-   PUT :`/api/user`
-   POST :`/api/forgot-password`
-   POST :`/api/reset-password`
-   GET : `/api/user`
-   DELETE : `/api/user/{id}` only admin

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

**Endpoint Donate**

-   POST : `/api/donate`
-   PUT : `/api/donate/{id}` (approve/reject)
-   DELETE : `/api/donate/{id}`
-   DELETE : `api/donate`
-   GET : `api/donate`
-   GET : `api/donate/{id}`

**Endpoint**

-   POST:`/api/article`
-   GET:`/api/article`
-   GET:`/api/article{id}`
-   PUT:`/api/article{id}`
-   DELETE:`/api/article{id}`
-   DELETE:`/api/article`

**Endpoint Gallery**

-   POST: `api/gallery`
-   PUT : `api/gallery/{id}`
-   GET :`api/gallery`
-   GET : `api/gallery/{id}`
-   DELETE : `api/gallery/{id}`
-   DELETE : `api/gallery`

**Endpoint Anak**

-   POST: `api/anak`
-   GET: `api/anak`
-   GET: `api/anak/{id}`
-   DELETE: `api/anak{id}`
-   DELETE:`api/anak`
-   PUT: `api/anak{id}`

**Endpoint Yayasan**

-   POST :`api/yayasan`
