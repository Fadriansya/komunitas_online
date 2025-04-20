# CodeIgniter 4 Application Starter

# 🌐 KomunitasKu — Aplikasi Komunitas Online (CodeIgniter 4)

Aplikasi **KomunitasKu** adalah platform komunitas online berbasis web yang dibangun menggunakan framework **CodeIgniter 4**. Aplikasi ini memungkinkan pengguna untuk berdiskusi, bergabung sebagai anggota, dan saling berinteraksi dengan tampilan UI/UX modern serta mendukung **tema gelap dan terang**.

---

## 🚀 Fitur Utama

- ✅ Registrasi akun (dengan validasi email hanya `@gmail.com`)
- ✅ Login dan Logout dengan sistem sesi
- ✅ Daftar anggota komunitas
- ✅ Forum diskusi dengan list & detail diskusi
- ✅ Tambah diskusi hanya untuk user yang login
- ✅ Akses terbatas untuk fitur tertentu
- ✅ UI responsif dan estetik (gelap & terang)
- ✅ Animasi ringan dengan ScrollReveal.js
- ✅ Flash message (sukses, error, validasi)

---

## 🧹 Teknologi yang Digunakan

- CodeIgniter 4 (PHP)
- Bootstrap 5
- JavaScript (Dark/Light Mode Toggle, Animasi)
- MySQL (untuk database)
- Fontawesome & Bootstrap Icons
- ScrollReveal.js (animasi scroll)
- GitHub Actions (otomatisasi CI/CD)

---

## 📁 Struktur Folder Penting

```
app/
│
├── Controllers/
│   ├── ForumController.php
│   ├── LoginController.php
│   ├── RegisterController.php
│   └── AnggotaController.php
│
├── Models/
│   ├── ForumModel.php
│   └── UserModel.php
│
├── Views/
│   ├── forum/
│   │   ├── index.php
│   │   └── create.php
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── anggota/index.php
│   ├── layout/main.php
│   └── layout/login_overlay.php
```

---

## 🛠️ Cara Menjalankan Proyek

### 1. Clone Repo

```bash
git clone https://github.com/username/komunitasku.git
cd komunitasku
```

### 2. Install Dependensi

```bash
composer install
```

### 3. Setup .env & Database

- Salin `.env.example` menjadi `.env`
- Atur database

### 4. Migrasi & Seed Database (jika disediakan)

```bash
php spark migrate
php spark db:seed UserSeeder  # (opsional)
```

### 5. Jalankan Server Lokal

```bash
php spark serve
```

---

## 📊 Struktur Database

### Tabel `users`

| Field      | Tipe       | Keterangan            |
| ---------- | ---------- | --------------------- |
| id         | INT (auto) | Primary key           |
| username   | VARCHAR    | Huruf & angka saja    |
| email      | VARCHAR    | Validasi `@gmail.com` |
| password   | VARCHAR    | Hashed password       |
| role       | ENUM       | `user` atau `admin`   |
| created_at | TIMESTAMP  | Auto timestamp        |

### Tabel `forums`

| Field      | Tipe       | Keterangan              |
| ---------- | ---------- | ----------------------- |
| id         | INT (auto) | Primary key             |
| judul      | VARCHAR    | Judul diskusi           |
| isi        | TEXT       | Isi diskusi             |
| kategori   | VARCHAR    | Kategori pilihan        |
| user_id    | INT        | Relasi ke tabel `users` |
| created_at | TIMESTAMP  | Auto timestamp          |
| updated_at | TIMESTAMP  | Auto update on edit     |

---

## 👥 Hak Akses

| Role    | Akses Fitur                              |
| ------- | ---------------------------------------- |
| Guest   | Melihat diskusi, halaman tentang         |
| User    | Membuat diskusi, melihat anggota, logout |
| Admin\* | (Opsional, bisa ditambahkan ke depannya) |

---

## 🌈 Tema Gelap & Terang

- Tema otomatis menyesuaikan dari tombol toggle
- Diatur dengan JavaScript + CSS class
- Tersimpan di `localStorage`

---

## 💡 Rencana Pengembangan Selanjutnya

- 💬 Komentar pada diskusi
- ❤️ Like/Vote diskusi
- 📁 Kategori dinamis
- 🔒 Middleware untuk proteksi per role
- 📱 PWA versi mobile

---

## 👨‍💻 Kontribusi

Ingin ikut mengembangkan? Fork repo, buat branch, dan ajukan pull request!

---

## 📝 Lisensi

Aplikasi ini bebas digunakan untuk keperluan pembelajaran dan pengembangan.

## Database Setup

File backup struktur database tersedia di `database/struktur.sql`.  
Untuk menggunakannya:

1. Buka phpMyAdmin
2. Buat database baru (contoh: komunitas_online)
3. Import file `struktur.sql`

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the _public_ folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's _public_ folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter _public/..._, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
>
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
