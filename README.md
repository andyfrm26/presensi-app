<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this Project
PresensiApp merupakan aplikasi yang dikembangkan dalam rangka memenuhi penugasan dari mata kuliah Implementasi dan Evaluasi Sistem Informasi.

## Tech stacks & Assets used
- Laravel 9 <a href="https://cdnlogo.com/logo/laravel_40129.html"><img src="https://cdn.cdnlogo.com/logos/l/57/laravel.svg" height="16"></a>
- Bootstrap 5.2 <a href="https://cdnlogo.com/logo/bootstrap-5_40714.html"><img src="https://cdn.cdnlogo.com/logos/b/74/bootstrap-5.svg" height="16"></a>
- jQuery <a href="https://cdnlogo.com/logo/jquery_39697.html"><img src="https://cdn.cdnlogo.com/logos/j/45/jquery.svg" height="16"></a>
- SBAdmin2 (Dashboard Admin template)

## What to do?
Untuk dapat melihat aplikasi ini, Anda perlu melakukan clone repository ini terlebih dahulu.

    git clone https://github.com/andyfrm26/presensi-app.git
    
Setelah itu, lakukan konfigurasi pada file `.env.example`, dengan me-<em>rename</em> file tersebut menjadi `.env`, dan sesuaikan konfigurasinya dengan <em>database server</em> Anda.

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

Kemudian, Anda perlu menjalankan perintah berikut pada folder _root_ aplikasi untuk melakukan _migration_ dan _seeding_ pada _database_.

    cd presensi-app
    
    php artisan migrate:fresh --seed

Setelah melakukan semua proses di atas, maka aplikasi PresensiApp siap digunakan.

## Dummy user
- Role `student`

    Email: student[at]gmail.com

    Password: password

- Role `admin`

    Email: admin[at]gmail.com

    Password: password

___

## Mata Kuliah
Implementasi dan Evaluasi Sistem Informasi

## Dosen Pengampu 
Djoko Pramono, S.T., M.Kom.

## Kelompok 4
- Andy Firmansyah (205150401111047)
- Fatih Daffa Nurma S. (205150400111035)
- M. Nauval Al-Aizar R. (205150400111022)
