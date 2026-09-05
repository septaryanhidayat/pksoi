# 🚀 Panduan Deployment Laravel DPD PKS Ogan Ilir ke cPanel

Panduan lengkap langkah demi langkah untuk mengunggah dan mengaktifkan website Laravel 13 (PHP 8.4) DPD PKS Ogan Ilir ke hosting cPanel dengan database MySQL.

---

## 📋 1. Persyaratan Server / Hosting cPanel

Pastikan pengaturan pada cPanel Anda memenuhi kriteria berikut:
- **PHP Version**: **PHP 8.4** (Buka cPanel > **Select PHP Version** atau **MultiPHP Manager**).
- **Ekstensi PHP Wajib**:
  - `pdo_mysql`
  - `gd` (Pastikan dukungan WebP aktif untuk konversi gambar otomatis)
  - `mbstring`
  - `fileinfo`
  - `intl`
  - `xml`
  - `curl`
  - `zip`

---

## 🗄️ 2. Persiapan & Import Database MySQL

1. Buka cPanel dan pilih menu **MySQL® Databases**.
2. Buat database baru, contoh: `username_pksoi`.
3. Buat pengguna MySQL baru, contoh: `username_pksuser` dengan kata sandi yang kuat.
4. Hubungkan pengguna tersebut ke database dengan memberikan **All Privileges** (Semua Hak Akses).
5. Buka menu **phpMyAdmin** dari cPanel:
   - Pilih database `username_pksoi` yang baru dibuat di panel sebelah kiri.
   - Klik tab **Import** di bagian atas.
   - Klik **Choose File** / Telusuri, lalu pilih file:
     ```
     database/pks_oganilir_clean_production.sql
     ```
   - Klik tombol **Import** / **Kirim** di bagian bawah.
   - *Selesai! Seluruh 100% data (73 berita, 26 halaman, 39 kategori, 50 tag, agenda, pengumuman, 4 dewan, 10 bidang, 11 DPC, audio mars/hymne, testimoni, video, pesan kritik/saran) sudah terisi lengkap dan bersih.*

---

## 📁 3. Upload File Aplikasi ke cPanel

### Rekomendasi Struktur Folder (Paling Aman & Standar Industri):

1. Di **File Manager** cPanel, pada direktori home (di luar `public_html`), buat folder bernama:
   ```
   laravel_pksoi
   ```
2. Compress (ZIP) seluruh folder project ini di komputer Anda **KECUALI** folder `BACKUP WEb LAMA`, `Desain Web Lama`, dan `database/berandad_wppksoi.sql` (karena file-file lama tersebut sudah diproses dan tidak dibutuhkan lagi di server produksi).
3. Upload file ZIP tersebut ke `/home/username/laravel_pksoi/` dan ekstrak (Extract).
4. Pindahkan seluruh isi dari dalam folder:
   `/home/username/laravel_pksoi/public/`
   ke direktori:
   `/home/username/public_html/`
   *(Termasuk folder `uploads`, `build`, file `index.php`, `.htaccess`, dan `robots.txt`)*.
5. Buka dan edit file `/home/username/public_html/index.php`:
   - Cari baris:
     ```php
     require __DIR__.'/../vendor/autoload.php';
     ```
     Ubah menjadi:
     ```php
     require __DIR__.'/../laravel_pksoi/vendor/autoload.php';
     ```
   - Cari baris:
     ```php
     $app = require_once __DIR__.'/../bootstrap/app.php';
     ```
     Ubah menjadi:
     ```php
     $app = require_once __DIR__.'/../laravel_pksoi/bootstrap/app.php';
     ```
   - Simpan perubahan.

---

## ⚙️ 4. Konfigurasi File Lingkungan (.env)

1. Di dalam folder `/home/username/laravel_pksoi/`, salin file `.env.production` menjadi `.env` (atau edit file `.env` yang ada).
2. Sesuaikan nilai-nilai berikut:
   ```env
   APP_NAME="DPD PKS Ogan Ilir"
   APP_ENV=production
   APP_KEY=base64:tfdlAwa5qi0eMQooptnBfMClNPkQ20oCj3U2UWKUSPc=
   APP_DEBUG=false
   APP_URL=https://nama-domain-anda.com

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=username_pksoi
   DB_USERNAME=username_pksuser
   DB_PASSWORD=password_database_anda
   ```
3. Simpan perubahan file `.env`.

---

## 🛠️ 5. Finalisasi & Optimasi Menggunakan cPanel Helper

Jika hosting Anda **tidak memiliki akses terminal SSH**, Anda dapat menggunakan helper berbasis web yang sudah kami sediakan:

1. Buka browser dan akses URL berikut:
   ```
   https://nama-domain-anda.com/cpanel_setup.php?token=PksOi2026Setup&action=status
   ```
2. Klik tombol **Cek Status Sistem** untuk memastikan koneksi database berstatus `SUKSES` dan dukungan `GD WebP` aktif.
3. Klik tombol **Buat Storage Link** untuk menghubungkan folder penyimpanan.
4. Klik tombol **Optimasi Cache (Produksi)** untuk meningkatkan kecepatan loading website (cache konfigurasi, route, dan view).
5. ⚠️ **PENTING UNTUK KEAMANAN**: Setelah semua berjalan lancar, hapus file `public_html/cpanel_setup.php` melalui File Manager cPanel.

---

## 🔐 6. Akses Panel Admin Website

Panel admin telah dilengkapi dengan sistem manajemen artikel, pesan masuk masyarakat, pengaturan web, serta **Auto-WebP Image Engine** (semua foto/banner yang Anda upload otomatis dikonversi ke format `.webp` super ringan dan berkualitas tinggi):

- **URL Login**: `https://nama-domain-anda.com/login`
- **Email Administrator**: `berfikirmerdeka@gmail.com`
- **Password**: `AdminPksOi2026!`
- *(Akun alternatif kedua: `desain.praktisi@gmail.com` / `AdminPksOi2026!`)*

---

## 🌐 7. Daftar Fitur & Halaman yang Siap Digunakan

| Modul | URL Halaman | Keterangan |
|---|---|---|
| **Beranda** | `/` | Hero Banner slider, Quick Nav, Sambutan Ketua DPD, Berita Terkini, Agenda & Pengumuman, Video YouTube, Testimoni, CTA Donasi |
| **Berita & Artikel** | `/artikel` | Seluruh 73 artikel WordPress, navigasi kategori & tag, search, dan pagination |
| **Profil DPD** | `/profil/tentang-kami`, `/profil/visi-misi`, `/profil/sejarah`, `/profil/struktur`, `/profil/sambutan-ketua-dpd` | Halaman statis resmi profil DPD PKS Ogan Ilir |
| **Fraksi PKS** | `/anggota-dewan` | Profil 4 Anggota DPRD Fraksi PKS Kabupaten Ogan Ilir |
| **Bidang DPD** | `/bidang` | 10 Bidang Kepengurusan DPD PKS Ogan Ilir |
| **DPC Kecamatan** | `/dpc` | 11 Dewan Pengurus Cabang PKS se-Ogan Ilir |
| **Informasi Publik** | `/agenda`, `/pengumuman`, `/galeri`, `/video` | Agenda kegiatan, rilis pengumuman, arsip galeri foto WebP, dan galeri video YouTube |
| **Pusat Unduhan** | `/download`, `/download/logo`, `/download/hymne-mars` | Download logo resmi PKS & file MP3 Mars PKS dan Hymne PKS |
| **Aspirasi & Donasi** | `/hubungi-kami`, `/donasi` | Form kritik/saran masyarakat (tersimpan ke database) & info rekening donasi resmi |
| **Panel Admin** | `/admin` | Ringkasan statistik, CRUD artikel dengan auto WebP converter, manajemen kritik & saran, serta konfigurasi web |
