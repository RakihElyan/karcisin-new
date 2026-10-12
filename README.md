[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com/)

**Karcis.in** adalah platform *e-ticketing* dan sistem manajemen acara berbasis web yang dirancang untuk mempermudah pemesanan tiket konser/acara secara digital, transparan, dan ekonomis. Sistem ini dilengkapi dengan kontrol akses multi-peran (*multi-role*), validasi alur acara oleh administrator, serta penerbitan e-tiket otomatis berupa kode QR dan dokumen PDF yang dikirimkan langsung melalui email.

---

## 🚀 Fitur Utama

Aplikasi ini menerapkan **Role-Based Access Control (RBAC)** dengan 3 jenis hak akses:

### 1. 👤 Pengguna (User)
* **Autentikasi & Akun:** Pendaftaran akun, login, pembaruan profil, dan logout.
* **Katalog Acara:** Menjelajahi daftar konser dan acara yang telah terverifikasi.
* **Pemesanan Tiket:** Memilih kategori tiket, kuantitas pemesanan, dan pengisian data pemesan.
* **Proses Pembayaran:** Alur konfirmasi dan penyelesaian pembayaran tiket.
* **E-Tiket Otomatis:** Tiket digital dilengkapi **QR Code unik** dan berkas **PDF e-ticket** dikirim otomatis ke email pengguna setelah verifikasi.

### 2. 🎪 Pembuat Acara (Event Creator)
* **Manajemen Acara:** Membuat dan mengajukan draf acara konser (nama acara, tanggal, alamat/lokasi, kuota tiket, dan rincian kontak penyelenggara).
* **Status Pengajuan:** Memantau status persetujuan acara (*pending*, *verified*, atau *rejected*).

### 3. 🛠️ Pengembang / Administrator (Developer)
* **Verifikasi Acara:** Meninjau dan menyetujui (*approval*) acara yang didaftarkan creator sebelum dipublikasikan ke katalog publik.
* **Verifikasi Transaksi & Tiket:** Melakukan validasi transaksi pembayaran dari pembeli tiket untuk mengaktifkan status tiket.
* **Manajemen Basis Data:** Pengelolaan menyeluruh terhadap data pengguna, acara, dan riwayat pesanan.

---

## 🛠️ Tech Stack & Dependencies

* **Framework:** Laravel (PHP MVC)
* **Database:** MySQL
* **Frontend:** Blade Templating, HTML5, CSS3, JavaScript / Tailwind CSS
* **Key Backend Libraries:**
  * PDF Generation (e.g., `barryvdh/laravel-dompdf`)
  * QR Code Generator (e.g., `simplesoftwareio/simple-qrcode`)
  * SMTP Mailer (Laravel Built-in Mail untuk notifikasi tiket ke email)

---

## 🔄 Alur Kerja Sistem (System Workflow)

```text
[Creator]                [Admin / Developer]                [User]
   |                              |                            |
   +---> Ajukan Acara Baru ------>|                            |
                                  +---> Verifikasi Acara       |
                                           |                   |
                                           v                   |
                                    [Tampil di Web] <----------+ (Beli Tiket)
                                                               |
   +<--- Notifikasi Tiket <-------+--- Verifikasi Pembayaran <-+
   |     (QR Code & PDF via Email)|

 ## ⚙️ Panduan Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal:

### 1. Clone Repositori
```bash
git clone https://github.com/RakihElyan/karcisin-new.git
cd karcisin-new
```

### 2. Instal Dependensi Composer
```bash
composer install
```

### 3. Konfigurasi Lingkungan (.env)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Buka file `.env` lalu sesuaikan konfigurasi basis data dan SMTP email Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=karcisin_db
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@karcis.in"
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi & Seeder Database
Pastikan database MySQL sudah dibuat di phpMyAdmin / MySQL CLI, kemudian jalankan:
```bash
php artisan migrate --seed
```

### 6. Tautkan Storage (Untuk Aset Media/Gambar)
```bash
php artisan storage:link
```

### 7. Jalankan Server Lokal
```bash
php artisan serve
```

Buka peramban (*browser*) dan akses alamat: `http://localhost:8000`
