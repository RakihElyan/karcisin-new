# 🎟️ Karcis.in - Platform E-Ticketing & Manajemen Event Digital

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Tailwind/Bootstrap](https://img.shields.io/badge/Frontend-Blade%20%26%20JS-blue?style=for-the-badge)

**Karcis.in** adalah platform *e-ticketing* dan manajemen acara digital terpadu yang dirancang untuk memudahkan penyelenggara acara (*creator*) mempublikasikan tiket, serta memfasilitasi pembeli (*user*) dalam pemesanan tiket dengan sistem validasi anti-duplikasi berbasis QR Code dan pemindaian kamera real-time.

---

## 📌 Fitur Utama Berdasarkan Peran (Role)

Sistem ini mendukung 3 peran pengguna (*Multi-auth/Multi-role*):

### 1. 👤 Pengguna / Pembeli (User)
* **Autentikasi:** Registrasi akun, Login, Edit profil, dan Logout.
* **Katalog Event:** Menjelajahi daftar event/konser yang telah terverifikasi.
* **Pemesanan & Pembayaran:** Memilih acara, menentukan kuantitas tiket, memasukkan rincian data pembeli, dan mengunggah/konfirmasi pembayaran.
* **E-Ticket Otomatis:** Menerima tiket digital berformat PDF langsung ke email dan melihat riwayat tiket di dashboard (`my_tickets.blade.php`).

### 2. 🎪 Penyelenggara Acara (Event Creator)
* **Manajemen Event:** Membuat event baru lengkap dengan detail deskripsi, harga, kuota tiket, dan lokasi acara.
* **Persetujuan Event:** Pengajuan event akan ditinjau terlebih dahulu oleh developer/admin sebelum dipublikasikan ke publik.

### 3. 🛠️ Administrator / Developer
* **Verifikasi Acara:** Menyetujui (*Approve*) atau menolak acara yang diajukan oleh Creator.
* **Verifikasi Pembayaran & Tiket:** Memeriksa bukti transaksi user. Saat status diubah menjadi *Approve/Paid*, sistem akan memicu pembuatan tiket dan pengiriman email otomatis.
* **Gate Check-in / Scanner:** Melakukan pemindaian tiket di lokasi acara.

---

## ⚙️ Detail Arsitektur & Logika Backend

Proyek ini dibangun dengan fokus pada efisiensi resource server dan pencegahan kecurangan:

### 📧 1. Dynamic PDF & SMTP Mailer (In-Memory Processing)
* Saat Admin melakukan *approve* transaksi, status berubah menjadi `paid` dan sistem mengenerate kode unik tiket.
* File PDF tiket dibuat secara dinamis menggunakan **DomPDF** langsung di memori (*in-memory*) tanpa disimpan secara permanen di storage server untuk menghemat kapasitas disk.
* PDF langsung dilampirkan (*attach*) ke email pengguna melalui **Laravel Mailable** via protokol **SMTP**.

### 📱 2. Cloud QR Code Generation
* Pembangkitan kode QR tidak membebani komputasi server lokal (*rendering cloud*).
* Memanfaatkan API publik gratis dari `goQR.me` (`https://api.qrserver.com/v1/create-qr-code/`).
* Dipanggil langsung melalui tag `<img>` pada template Blade dan PDF dengan parameter kode tiket unik:
  `<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $ticket->unique_code }}" alt="QR Code">`

### 🔒 3. Anti-Fraud: Mekanisme Database Flagging (Single-Entry)
* Mencegah penggunaan tiket ganda/duplikasi (misal: satu tiket di-screenshot dan dibagikan ke orang lain).
* Memanfaatkan kolom `is_checked_in` (tipe data boolean/tinyint) pada tabel `tickets`:
  * `0` = Belum Digunakan.
  * `1` = Sudah Digunakan.
* Validasi terjadi secara *atomic* dan *real-time*. Begitu tiket berstatus `0` dipindai, status langsung diubah menjadi `1`. Pemindaian kedua pada tiket yang sama akan langsung ditolak oleh backend.

### 📷 4. Camera Scanner & Validasi Asinkron (AJAX)
* Mengintegrasikan library scanner sisi klien (`html5-qrcode`) untuk mengakses kamera perangkat panitia/petugas gerbang.
* Kode unik hasil pindaian langsung dikirimkan ke endpoint backend menggunakan **AJAX/Fetch API**.
* Respons instan tanpa *reload* halaman:
  * 🟢 **Hijau (Valid):** Tiket terdaftar, sesuai event, dan belum pernah *check-in*.
  * 🔴 **Merah (Invalid):** Tiket tidak terdaftar, salah event, atau sudah pernah digunakan sebelumnya.

---

## 🛠️ Tech Stack

* **Framework:** Laravel (PHP)
* **Database:** MySQL
* **PDF Engine:** barryvdh/laravel-dompdf
* **Scanner Library:** html5-qrcode
* **Third-Party API:** goQR.me API (QR Generator)
* **Mailing:** SMTP (Gmail / Mailtrap)

---

## 🚀 Panduan Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal:

### 1. Clone Repository
```bash
git clone https://github.com/RakihElyan/karcisin-new.git
cd karcisin-new
```

### 2. Install Dependensi PHP
```bash
composer install
```

### 3. Konfigurasi Lingkungan (.env)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Buka file `.env` dan sesuaikan koneksi database serta konfigurasi SMTP email:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=karcisin_db
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email-anda@gmail.com
MAIL_PASSWORD=app-password-anda
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@karcis.in"
MAIL_FROM_NAME="Karcis.in"
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Migrasi & Seeder Database
```bash
php artisan migrate --seed
```

### 6. Jalankan Server Lokal
```bash
php artisan serve
```
Akses aplikasi melalui browser di: `http://127.0.0.1:8000`

---

## 👥 Pengembang (Kelompok 3)

Proyek ini dikembangkan sebagai pemenuhan proyek sistem berbasis web oleh:
* **Faqih Muhammad Faiz** - *Back End & Database Architecture*
* Serta seluruh anggota **Kelompok 3**.
