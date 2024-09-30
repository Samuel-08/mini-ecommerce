  
<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
 
---

# Laravel 9: Framework PHP Paling Populer

Laravel adalah framework PHP yang cepat dan powerful untuk bikin aplikasi web modern. Dengan sintaks yang elegan, Laravel bikin hidup pengembang web jadi lebih mudah dengan fitur-fitur keren yang bikin coding jadi pengalaman seru dan menyenangkan.

## Kenapa Harus Pakai Laravel?

Laravel cocok buat semua orang, dari pemula hingga developer pro. Berikut beberapa alasan kenapa Laravel itu keren:

- **Routing Simpel dan Cepat:** Mudah diatur dan dipahami.
- **Dependency Injection:** Memudahkan pengelolaan dependensi.
- **ORM Database Intuitif (Eloquent):** Bikin interaksi dengan database jadi lebih simpel.
- **Migrasi Database Mudah:** Manajemen skema database jadi praktis.
- **Proses Latar Belakang Kuat:** Cocok buat aplikasi skala besar.
- **Siaran Acara Real-Time:** Fitur real-time yang bikin aplikasi lebih interaktif.

Singkatnya, Laravel punya semua yang kamu butuhkan buat bikin aplikasi yang scalable dan robust.

## Mau Mulai? Gampang!

Kalau kamu mau mulai pakai Laravel, gampang banget! Cukup install dengan Composer:

```bash
composer create-project laravel/laravel nama_project
```

### Setting Awal

1. **Base URL**  
   Set `APP_URL` di file `.env` biar Laravel tahu URL aplikasi kamu:

   ```plaintext
   APP_URL=http://localhost
   ```

2. **Database**  
   Jangan lupa set database di file `.env`:

   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=nama_pengguna
   DB_PASSWORD=katasandi
   ```

3. **Konfigurasi Server**  
   Pastikan PHP di server kamu sudah versi 8.1 atau lebih tinggi, dan mendukung ekstensi seperti `intl`, `mbstring`, dan `json`.

4. **Setup Folder Permissions**  
   Pastikan folder seperti `storage` dan `bootstrap/cache` bisa ditulis oleh web server agar aplikasi kamu berjalan lancar.

### Opsi Server

#### Apache
Kalau kamu pakai Apache, aktifkan modul `mod_rewrite` buat mendukung URL bersih.

#### Nginx
Untuk pengguna Nginx, arahkan server ke folder `public`. Berikut contoh konfigurasinya:

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

### Pembaruan Laravel

Kalau ada update Laravel baru, gampang banget! Jalankan perintah ini di terminal:

```bash
composer update
```

## Perintah Artisan Umum

Berikut beberapa perintah Artisan yang sering dipakai:

- **Menjalankan server lokal:**
   ```bash
   php artisan serve
   ```

- **Menjalankan migrasi database:**
   ```bash
   php artisan migrate
   ```

- **Membuat model baru:**
   ```bash
   php artisan make:model NamaModel
   ```

- **Membuat controller baru:**
   ```bash
   php artisan make:controller NamaController
   ```

## Pemecahan Masalah

- **Masalah: `ERROR: Failed to connect to database`**  
   Pastikan informasi koneksi database di `.env` sudah benar.

## Dokumentasi & Tutorial

Laravel punya dokumentasi lengkap dan detail buat semua level developer, dari yang baru belajar sampai yang udah pro. Buat yang pengen belajar step by step, kamu bisa cek **[Laravel Bootcamp](https://bootcamp.laravel.com)**.

Kalau lebih suka belajar lewat video, kunjungi **[Laracasts](https://laracasts.com)**. Di sana ada ribuan video tutorial tentang Laravel, PHP, dan banyak topik lainnya. Belajar Laravel jadi lebih mudah dan menyenangkan!

## Sponsor Laravel

Laravel nggak akan sebaik ini tanpa dukungan dari sponsor-sponsor keren. Terima kasih kepada mereka yang udah membantu pengembangan Laravel, seperti Vehikl, Tighten Co., Kirschbaum Development Group, dan banyak lagi!

Kalau kamu juga tertarik jadi sponsor, cek halaman [Patreon Laravel](https://www.patreon.com/taylorotwell).

## Berkontribusi

Kami selalu terbuka untuk kontribusi dari komunitas. Kalau kamu mau ikut berkontribusi ke Laravel, baca dulu [panduan kontribusi](https://laravel.com/docs/9.x/contributions).

## Lisensi

Laravel adalah software open-source yang dilisensikan di bawah MIT License. Kamu bebas pakai, modifikasi, dan distribusikan!
 # mini-ecommerce
