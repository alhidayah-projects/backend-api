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
-   PUT : `/api/contact/{id}`

**Endpoint Rekenings**

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

**Endpoint Article**

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
-   PUT : `api/yayasan/{id}`
-   DELETE : `api/yayasan/{id}`
-   GET : `api/yayasan`

**Endpoint Landing**

-   GET : `api/landing`
-   GET : `api/landing/telepon`
-   GET : `api/landing/profile`
-   GET : `api/landing/visi-misi`
-   GET : `api/landing/donate/{id}`
-   GET : `api/landing/contact`

**Endpoint Filter**

-   GET : `api/anak?nama_anak=aulia&nik=123456789012345`
-   GET : `api/landing/article?title=Article`
-   GET : `api/landing/gallery?title=my gallery`
-   GET : `api/contact?name=panji&email=panjiprasetyo025@gmail.com`
-   GET : `api/donate?status=approve`
-   GET : `api/rekening?nama_bank=bni`

**Endpoint Pengurus**

-   POST : `api/pengurus`
-   GET : `api/pengurus?jabatan=ketua&nama_pengurus=dadan`
-   GET : `api/pengurus`
-   GET : `api/pengurus/{id}`
-   PUT : `api/pengurus/{id}`
-   DELETE : `api/pengurus/{id}`
-   DELETE : `api/pengurus`
