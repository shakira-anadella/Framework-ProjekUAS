<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# EventBloom

## Deskripsi Proyek
EventBloom adalah aplikasi berbasis web untuk mengelola dan menemukan acara menarik. Aplikasi ini dirancang dengan menggunakan **Laravel**, salah satu framework PHP paling populer, untuk membangun aplikasi berbasis web yang scalable, modern, dan mudah dikembangkan.

## Fitur Utama
- **Autentikasi Pengguna**: Login, registrasi, dan manajemen pengguna.
- **Manajemen Acara**: CRUD (Create, Read, Update, Delete) untuk berbagai acara.
- **Visualisasi Data**: Chart untuk menampilkan kategori acara dan rating ulasan.
- **Antarmuka Responsif**: Dibangun dengan Bootstrap 5 untuk desain yang modern dan responsif.
- **Pengelolaan API**: Mendukung integrasi API untuk berbagai layanan eksternal.

## Persyaratan Sistem
- **PHP**: Versi 8.1 atau lebih baru.
- **Composer**: Untuk mengelola dependensi PHP.
- **Node.js**: Untuk pengelolaan dependensi front-end.
- **Database**: MySQL, PostgreSQL, atau database lain yang didukung Laravel.

## Cara Instalasi
1. Clone repository ini:
   ```bash
   git clone <repository-url>
   cd Framework-ProjekUAS-main
   ```

2. Instal dependensi PHP menggunakan Composer:
   ```bash
   composer install
   ```

3. Instal dependensi front-end menggunakan Node.js:
   ```bash
   npm install
   ```

4. Salin file `.env` contoh:
   ```bash
   cp .env.example .env
   ```

5. Atur konfigurasi di file `.env`, termasuk koneksi database.

6. Generate key aplikasi:
   ```bash
   php artisan key:generate
   ```

7. Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```

8. Jalankan server lokal:
   ```bash
   php artisan serve
   ```

   Aplikasi akan tersedia di [http://localhost:8000](http://localhost:8000).

## Struktur Proyek
- `app/` - Logika aplikasi dan model.
- `routes/` - Definisi rute aplikasi.
- `resources/` - View dan asset front-end.
- `public/` - File yang dapat diakses publik (misalnya, gambar, CSS, JS).
- `config/` - File konfigurasi aplikasi.
- `database/` - Migrasi dan seeder database.

## Cara Penggunaan
1. Buka aplikasi di browser setelah menjalankan server lokal.
2. Registrasi akun jika diperlukan.
3. Gunakan fitur-fitur yang tersedia sesuai kebutuhan.
4. Lihat visualisasi data berupa chart kategori acara dan rating ulasan untuk memahami statistik acara.

## Teknologi yang Digunakan
- **Laravel**: Framework backend.
- **Bootstrap 5**: Untuk styling front-end.
- **MySQL/PostgreSQL**: Database management.
- **Vite**: Pengelolaan asset front-end.
- **Chart.js**: Untuk membuat visualisasi data berupa kategori acara dan rating ulasan.

## Kontributor
- Najwa Aulia Safinatun Najah (2230511094) [ohyuna56na](https://github.com/ohyuna56na)
- Salma Nurfauziah (2230511100) [slmaaanf](https://github.com/slmaaanf)
- Shakira Anadella (2230511105) [shakira-anadella](https://github.com/shakira-anadella)
- Hawarizmi Ummul Adzkia (2230511109) [hawadz](https://github.com/hawadz)




