# kasir-sekolah-v2

Aplikasi Kasir Sekolah berbasis Laravel dan AdminLTE untuk pengelolaan data master jurusan, administrasi siswa, serta transaksi pembayaran sekolah secara efisien dan terstruktur.

## Fitur Utama
- **Autentikasi Pengguna**: Sistem login dan registrasi terintegrasi dengan template AdminLTE.
- **Dashboard Interaktif**: Statistik ringkasan data jurusan, status aktif, dan pengguna terdaftar.
- **Manajemen Data Jurusan (CRUD)**:
  - Kode Jurusan, Nama Jurusan, Keterangan, dan Status Aktif/Tidak Aktif.
  - Pencarian fleksibel berdasarkan nama atau kode jurusan.
  - Paginasi data responsif.
  - Modal konfirmasi penghapusan data.
  - Validasi formulir lengkap dengan notifikasi pesan sukses/gagal.

## Persyaratan Sistem
- PHP >= 8.2 (Direkomendasikan PHP 8.3/8.4)
- Composer
- Node.js & NPM
- Database MySQL / MariaDB

## Panduan Instalasi
1. Clone repositori:
   ```bash
   git clone https://github.com/KurniawanPra/kasir-sekolah-v2.git
   cd kasir-sekolah-v2
   ```

2. Instal dependensi:
   ```bash
   composer install
   npm install && npm run build
   ```

3. Salin file `.env` dan buat APP_KEY:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Konfigurasi database pada file `.env`, lalu jalankan migrasi:
   ```bash
   php artisan migrate
   ```

5. Jalankan server pengembangan:
   ```bash
   php artisan serve
   ```
