![Laravel Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)


<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
 
---
# Laravel 9: Framework PHP Paling Populer

Laravel adalah framework PHP yang cepat dan powerful untuk bikin aplikasi web modern. Dengan sintaks yang elegan dan fitur canggih, Laravel bikin hidup pengembang web jadi lebih mudah dan menyenangkan.

## Kenapa Harus Pakai Laravel?

Laravel cocok untuk semua orang, dari pemula hingga developer pro. Berikut beberapa alasan kenapa Laravel itu keren:

- **Routing Simpel:** Mudah diatur dan dipahami.
- **Dependency Injection:** Memudahkan pengelolaan dependensi.
- **ORM Database Intuitif (Eloquent):** Interaksi dengan database jadi lebih simpel.
- **Migrasi Database Mudah:** Manajemen skema database jadi praktis.
- **Proses Latar Belakang Kuat:** Cocok untuk aplikasi skala besar.
- **Siaran Acara Real-Time:** Fitur real-time bikin aplikasi lebih interaktif.

Singkatnya, Laravel punya semua yang kamu butuhkan untuk bikin aplikasi yang scalable dan robust. Jadi, apa tunggu lagi? Yuk, kita mulai!

## Mau Mulai? Gampang!

Berikut adalah langkah-langkah untuk mulai menggunakan Laravel:

### Langkah 1: Install Laravel

Install Laravel dengan Composer. Buka terminal dan jalankan perintah berikut:

```bash
composer create-project laravel/laravel nama_project
```

### Langkah 2: Konfigurasi Database

Setelah install, konfigurasikan database di file `.env`. Ganti detail sesuai dengan pengaturan database kamu:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=nama_pengguna
DB_PASSWORD=katasandi
```

### Langkah 3: Menyiapkan Server

Pastikan server kamu menggunakan PHP versi 8.1 atau lebih tinggi, dan sudah mendukung ekstensi seperti `intl`, `mbstring`, dan `json`.

#### Opsi Server:

- **Apache:** Aktifkan modul `mod_rewrite` untuk mendukung URL bersih.
- **Nginx:** Arahkan server ke folder `public`. Berikut contoh konfigurasinya:

```nginx
server {
    listen 80;
    server_name example.com;
    root /path/to/your/project/public;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        include fastcgi_params;
    }
}
```

### Langkah 4: Menjalankan Aplikasi

Setelah semua siap, jalankan aplikasi dengan perintah:

```bash
php artisan serve
```

Buka browser dan akses `http://localhost:8000` untuk melihat aplikasi kamu.

### Langkah 5: Membuat Model dan Controller

Setelah aplikasi berjalan, kamu bisa mulai bikin model dan controller. Gunakan perintah berikut:

```bash
php artisan make:model NamaModel
php artisan make:controller NamaController
```

### Langkah 6: Membuat Route

Setelah controller siap, buat route di file `web.php`:

```php
Route::get('/nama_route', [NamaController::class, 'namaMethod']);
```

### Langkah 7: Membuat View

Setelah route dibuat, bikin view untuk tampilan aplikasi kamu. Dalam method controller, kamu bisa mengembalikan view:

```php
return view('nama_view');
```

## Pemecahan Masalah

- **Masalah:** ERROR: Failed to connect to database  
  **Solusi:** Pastikan informasi koneksi database di `.env` sudah benar.

- **Masalah:** Kesalahan `Class not found`  
  **Solusi:** Jalankan `composer dump-autoload` untuk memperbarui autoloader.

## Dokumentasi & Tutorial

Laravel punya dokumentasi lengkap untuk semua level developer. Kalau mau belajar step by step, cek [Laravel Bootcamp](https://laravel.com/docs) untuk panduan pemula. Untuk yang lebih suka video, kunjungi [Laracasts](https://laracasts.com) yang penuh dengan tutorial Laravel, PHP, dan banyak topik lainnya.
 

Kami selalu terbuka untuk kontribusi dari komunitas. Jika kamu mau ikut berkontribusi ke Laravel, baca [panduan kontribusi](https://github.com/laravel/laravel/blob/master/CONTRIBUTING.md) kami.

## Lisensi

Laravel adalah software open-source yang dilisensikan di bawah MIT License. Kamu bebas pakai, modifikasi, dan distribusikan! 
