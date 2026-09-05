# 🚀 Panduan Deployment Laravel DPD PKS Ogan Ilir ke cPanel

Panduan lengkap langkah demi langkah untuk mengunggah dan mengaktifkan website Laravel 13 (PHP 8.4) DPD PKS Ogan Ilir ke hosting cPanel dengan database MySQL.

---

## 📋 1. Persyaratan Server / Hosting cPanel & Solusi PHP 8.1 Terkunci

Website DPD PKS Ogan Ilir dibangun menggunakan Laravel modern yang membutuhkan PHP 8.2+ (direkomendasikan **PHP 8.4**).

### ⚠️ Masalah Umum: "Select PHP Version" / "MultiPHP Manager" di cPanel Dikunci Hosting ke PHP 8.1
Jika menu **MultiPHP Manager** atau **Select PHP Version** di cPanel Anda terkunci di PHP 8.1 dan tidak bisa diubah dari tampilan cPanel, **JANGAN KHAWATIR**, kami sudah menyiapkan 2 solusi langsung:

#### A. Solusi Web (Otomatis via `.htaccess`)
Web server (Apache / LiteSpeed) di cPanel dapat dipaksa menggunakan PHP 8.4 secara lokal untuk folder website Anda melalui file `.htaccess`. Baris berikut **sudah otomatis terpasang** di file `.htaccess` dan `public/.htaccess`:
```apache
<IfModule mime_module>
  AddHandler application/x-httpd-ea-php84 .php .php8 .phtml
</IfModule>
```
*Catatan:*
- Jika hosting Anda memakai **EasyApache 4** (standar mayoritas hosting): handler di atas langsung mengaktifkan PHP 8.4.
- Jika hosting memakai **CloudLinux**: ubah `ea-php84` menjadi `alt-php84`.
- Jika server hosting hanya menyediakan maksimal PHP 8.3 atau 8.2, cukup ganti angkanya menjadi `ea-php83` atau `ea-php82`.

#### B. Solusi Terminal cPanel (CLI / Artisan)
Jika Anda membuka menu **Terminal** di cPanel dan mengetik `php -v`, sistem mungkin menampilkan PHP 8.1 bawaan server. Untuk menjalankan perintah Laravel dengan PHP 8.4 di cPanel Terminal:

1. **Cek lokasi PHP 8.4 / 8.3 / 8.2 di server hosting Anda**:
   ```bash
   ls -d /opt/cpanel/ea-php*
   # atau untuk CloudLinux:
   ls -d /opt/alt/php*
   ```
2. **Jalankan perintah dengan path PHP 8.4 langsung**:
   ```bash
   # Contoh menjalankan artisan:
   /usr/local/bin/ea-php84 artisan migrate
   /usr/local/bin/ea-php84 artisan config:cache
   
   # Atau path lengkap EasyApache:
   /opt/cpanel/ea-php84/root/usr/bin/php artisan migrate
   
   # Atau jika CloudLinux:
   /opt/alt/php84/usr/bin/php artisan migrate
   ```
3. **Pintasan Praktis (Alias Permanen agar cukup ketik `php`)**:
   Jalankan perintah ini sekali saja di cPanel Terminal:
   ```bash
   echo "alias php='/usr/local/bin/ea-php84'" >> ~/.bashrc
   source ~/.bashrc
   ```
   Setelah itu, setiap kali Anda mengetik `php artisan`, otomatis menggunakan PHP 8.4!

---

### Ekstensi PHP Wajib di cPanel:
- `pdo_mysql`
- `gd` (Pastikan dukungan WebP aktif untuk konversi gambar otomatis)
- `mbstring`, `fileinfo`, `intl`, `xml`, `curl`, `zip`

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

## 🚀 3. Deployment Menggunakan cPanel Git™ Version Control (Rekomendasi Utama)

Website ini telah dilengkapi file otomasi **`.cpanel.yml`** sehingga proses sinkronisasi dengan repositori GitHub Anda dapat dilakukan langsung melalui antarmuka cPanel dengan 1-klik!

### Langkah Clone Repositori di cPanel:
1. Buka cPanel Anda dan klik menu **Git™ Version Control** (di bawah kategori *Files*).
2. Klik tombol **Create** di sebelah kanan.
3. Masukkan informasi repositori:
   - **Clone URL**:
     ```
     https://github.com/septaryanhidayat/pksoi.git
     ```
   - **Repository Path**:
     ```
     /home/username/laravel_pksoi
     ```
     *(Ganti `username` dengan username cPanel Anda. Repositori disimpan di luar folder `public_html` demi keamanan)*.
   - **Repository Name**: `pksoi` (atau biarkan default).
4. Klik tombol **Create**. Tunggu beberapa saat hingga cPanel selesai mengunduh seluruh file proyek dari GitHub.

### Langkah Deploy & Menjalankan .cpanel.yml:
1. Setelah repositori selesai di-clone, klik tombol **Manage** di sebelah kanan repositori `pksoi`.
2. Klik tab **Pull or Deploy**.
3. Di bagian **Deploy HEAD Commit**, klik tombol **Deploy HEAD Commit**.
   - *Sistem cPanel akan otomatis mengeksekusi instruksi di dalam `.cpanel.yml`: menyalin seluruh aset `public/` ke `public_html/`, memasang `.htaccess`, dan mengatur hak akses folder `storage`.*

### Langkah Otomatisasi Webhook GitHub (Setiap kali push otomatis sync ke cPanel):
1. Pada tab **Basic Information** di menu Git cPanel, salin URL pada kolom **Webhook URL**.
2. Buka repositori Anda di GitHub: `https://github.com/septaryanhidayat/pksoi`.
3. Klik **Settings** > **Webhooks** > **Add webhook**.
4. Tempelkan URL cPanel tersebut ke dalam kolom **Payload URL**.
5. Pilih **Content type**: `application/json` dan pilih event **Just the push event**.
6. Klik **Add webhook**.
7. *Mulai saat ini, setiap kali Anda melakukan commit & push ke GitHub, website Anda di hosting cPanel akan otomatis terupdate sendiri!*

---

### Alternatif: Upload Manual Menggunakan File ZIP (Jika Tanpa Git):
1. Jika suatu saat Anda ingin upload manual via File Manager, compress (ZIP) seluruh folder project KECUALI folder `BACKUP WEb LAMA` dan `Desain Web Lama`.
2. Ekstrak file ZIP ke `/home/username/laravel_pksoi/`.
3. Pindahkan isi folder `/home/username/laravel_pksoi/public/` ke `/home/username/public_html/`.

---

## ⚙️ 4. Konfigurasi File Lingkungan (.env)

1. Di dalam folder `/home/username/laravel_pksoi/`, salin file `.env.production` menjadi `.env` (atau edit file `.env` yang ada).
2. Sesuaikan nilai-nilai berikut:
   ```env
   APP_NAME="DPD PKS Ogan Ilir"
   APP_ENV=production
   APP_KEY=base64:tfdlAwa5qi0eMQooptnBfMClNPkQ20oCj3U2UWKUSPc=
   APP_DEBUG=false
   APP_URL=https://oganilir.pks.id

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=username_pksoi
   DB_USERNAME=username_pksuser
   DB_PASSWORD=password_database_anda

   SESSION_SECURE_COOKIE=true
   ```
3. Simpan perubahan file `.env`.

---

## 🌐 5. Konfigurasi Dual Domain (Akses Bersamaan: pksoganilir.com & oganilir.pks.id)

Website ini telah dikonfigurasi untuk **dapat diakses secara bersamaan menggunakan 2 link domain**:
1. **`pksoganilir.com`** (Domain Utama / Publik Lama)
2. **`oganilir.pks.id`** (Domain Resmi Partai PKS Pusat) — *juga mendukung alias `ogan.ilir.pks.id` jika diarahkan dari DNS*.

Kedua domain ini **aktif berdampingan secara mandiri tanpa saling melempar/me-redirect (No Cross-Redirect)**, sehingga pengunjung yang membuka `pksoganilir.com` tetap berada di `pksoganilir.com`, dan pengunjung yang membuka `oganilir.pks.id` tetap berada di `oganilir.pks.id`.

### Langkah Konfigurasi di cPanel:
1. **Pilih Domain Utama Akun cPanel**:
   - Anda bisa menggunakan **`pksoganilir.com`** atau **`oganilir.pks.id`** sebagai Domain Utama cPanel dengan Document Root mengarah ke **`public_html`**.
2. **Tambahkan Domain Kedua sebagai Alias (Parked Domain)**:
   - Buka cPanel > menu **Domains** (atau **Aliases / Parked Domains**).
   - Klik **Create A New Domain**.
   - Masukkan domain pasangannya (misal jika domain utama `pksoganilir.com`, masukkan `oganilir.pks.id` atau sebaliknya).
   - **PENTING**: Centang opsi **Share document root** (arahkan Document Root ke `/home/username/public_html` yang sama).
   - Pastikan opsi *Redirection* diisi: **Not Redirected** (jangan di-redirect agar kedua domain tetap tampil di address bar browser).
3. **Sertifikat SSL Gratis (HTTPS) untuk Kedua Domain**:
   - Buka cPanel > menu **SSL/TLS Status**.
   - Centang kedua domain (`pksoganilir.com` dan `oganilir.pks.id` beserta variasi `www`-nya).
   - Klik tombol **Run AutoSSL** dan tunggu proses selesai hingga seluruh domain memiliki ikon gembok hijau aktif.
4. **Fitur Otomatis yang Sudah Diterapkan di `.htaccess` & Laravel**:
   - **Normalisasi www**: `www.pksoganilir.com` otomatis dirapikan ke `pksoganilir.com`, dan `www.oganilir.pks.id` otomatis dirapikan ke `oganilir.pks.id`.
   - **HTTPS Enforced**: Pengunjung HTTP otomatis dinaikkan ke HTTPS tanpa merubah domain asal yang sedang diakses.
   - **CORS Font & Asset Sharing**: Server telah dilengkapi header `Access-Control-Allow-Origin: *` untuk file font (`woff2`, `woff`, `ttf`), gambar, dan stylesheet agar tidak terjadi pemblokiran asset lintas domain oleh browser.
   - **Dynamic URL Generation**: Laravel otomatis mendeteksi host yang sedang aktif dan menghasilkan link internal serta link asset sesuai domain yang dibuka oleh pengunjung.

---

## 🛡️ 6. Checklist Keamanan Produksi (Anti-Hack & Hardening)

Untuk memastikan website Anda aman dari serangan yang pernah menimpa web WordPress lama:

1. ❌ **JANGAN UPLOAD folder `BACKUP WEb LAMA`**:
   - Folder tersebut hanya arsip di komputer lokal Anda. Di WordPress lama pernah terjadi serangan bot injeksi komentar spam.
   - Database produksi yang Anda import (`pks_oganilir_clean_production.sql`) sudah 100% bersih, dipurifikasi, dan bebas dari malware/script berbahaya.
2. 🔒 **Proteksi Eksekusi Script di Folder Upload**:
   - Folder `public_html/uploads/` sudah dilengkapi file `.htaccess` khusus yang mematikan mesin PHP (`php_flag engine off`). Meskipun ada pihak yang mencoba mengunggah script ke folder gambar, server cPanel akan otomatis memblokirnya (`403 Forbidden`).
3. 🛡️ **Proteksi File Sensitif (.env, database, vendor)**:
   - File konfigurasi `.env`, folder `vendor`, `storage`, dan database tersimpan di luar folder `public_html` (di dalam `laravel_pksoi`), sehingga mustahil diakses dari web browser publik.
4. 🚦 **Anti-Brute Force & Anti-Spam**:
   - Halaman login panel admin telah dibekali **Rate Limiter** otomatis (maksimal 5 kali percobaan gagal per IP, jika gagal berulang akan terkunci selama 60 detik).
   - Formulir kirim aspirasi masyarakat telah dipasangi **Honeypot Bot Trap** dan pembatasan pengiriman pesan.

---

## 🛠️ 7. Finalisasi & Optimasi Menggunakan cPanel Helper

Jika hosting Anda **tidak memiliki akses terminal SSH**, Anda dapat menggunakan helper berbasis web yang sudah kami sediakan:

1. Buka browser dan akses URL berikut:
   ```
   https://oganilir.pks.id/cpanel_setup.php?token=PksOi2026Setup&action=status
   ```
2. Klik tombol **Cek Status Sistem** untuk memastikan koneksi database berstatus `SUKSES` dan dukungan `GD WebP` aktif.
3. Klik tombol **Buat Storage Link** untuk menghubungkan folder penyimpanan.
4. Klik tombol **Optimasi Cache (Produksi)** untuk meningkatkan kecepatan loading website (cache konfigurasi, route, dan view).
5. ⚠️ **PENTING UNTUK KEAMANAN**: Setelah semua berjalan lancar, hapus file `public_html/cpanel_setup.php` melalui File Manager cPanel.

---

## 🔐 8. Akses Panel Admin Website

Panel admin telah dilengkapi dengan sistem manajemen artikel, pesan masuk masyarakat, pengaturan web, serta **Auto-WebP Image Engine** (semua foto/banner yang Anda upload otomatis dikonversi ke format `.webp` super ringan dan berkualitas tinggi):

- **URL Login**: `https://oganilir.pks.id/login`
- **Email Administrator**: `berfikirmerdeka@gmail.com`
- **Password**: `AdminPksOi2026!`
- *(Akun alternatif kedua: `desain.praktisi@gmail.com` / `AdminPksOi2026!`)*

---

## 🌐 9. Daftar Fitur & Halaman yang Siap Digunakan

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
