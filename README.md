# Nama Proyek Laravel

Aplikasi ini adalah sebuah aplikasi manajemen data untuk memproses calon lead yang ingin mendapatkan layanan internet. Sales akan memasukkan data calon lead tersebut ke dalam proyek baru. Di halaman manager, manajer dapat melakukan approve ataupun reject terhadap lead yang telah dimasukkan.

## Daftar Isi
- [Fitur](#fitur)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Penggunaan](#penggunaan)
- [Struktur Proyek](#struktur-proyek)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Fitur
- Login
- Halaman list calon customer (lead)
- Halaman master produk (layanan)
- Halaman project untuk memproses calon customer (lead) disertai approval manager
- Halaman customer yang sudah berlangganan disertai list layanannya

## Instalasi

1. **Clone repository ini:**
    ```bash
    https://github.com/Alvinusyodi/Alvinus_crm.git
    cd nama-proyek
    ```

2. **Instal dependensi menggunakan Composer:**
    ```bash
    composer install
    ```

3. **Salin file `.env.example` ke `.env`:**
    ```bash
    cp .env.example .env
    ```

4. **Buat kunci aplikasi:**
    ```bash
    php artisan key:generate
    ```

5. **Konfigurasi database di file `.env`:**
    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crm_database
    DB_USERNAME=root
    DB_PASSWORD=
    ```
5. **Jalankan XAMPP:**
   Pastikan Anda telah menginstal XAMPP dan menjalankannya. Ikuti langkah-langkah berikut untuk membuat database:
   
   - Buka XAMPP dan pastikan Apache serta MySQL sedang berjalan.
   - Buka browser dan akses `http://localhost/phpmyadmin`.
   - Klik pada tab "Databases".
   - Masukkan nama database yang diinginkan pada kolom "Create database" (buat database susuai dengan pada .env, `crm_database`).
   - Klik tombol "Create".
   
   Database baru Anda sekarang siap digunakan.

6. **Jalankan migrasi untuk membuat tabel database:**
    ```bash
    php artisan migrate
    ```

7. **Isi database dengan data pada table users untuk proses login menggunakan (seeder):**
    ```bash
    php artisan db:seed --class=DatabaseSeeder
    ```

8. **Jalankan server lokal:**
    ```bash
    php artisan serve
    ```

Aplikasi Anda sekarang dapat diakses di `http://localhost:8000`.

## Konfigurasi

Pastikan untuk menjalankan xampp terlebih dahulu agar database dapat digunakan

## Penggunaan

Aplikasi ini memiliki dua role, yaitu sales dan manager. Berikut adalah langkah-langkah penggunaannya:

### Role: Sales

1. **Login sebagai sales:**
   - Gunakan kredensial berikut untuk login:
     - **Username:** `sales`
     - **Password:** `sales123`
   - Setelah login, Anda akan diarahkan ke halaman sales.

2. **Manajemen Data oleh Sales:**
   - **Memantau Data:**
     - Di halaman sales, Anda dapat memantau jumlah lead, project, customer, dan produk.
   - **Memasukkan Data Lead:**
     - Sales dapat memasukkan nama calon lead. Data lead ini akan tampil sebagai bagian dari calon customer.
   - **Manajemen Data Produk:**
     - Sales dapat mengelola data produk yang ditawarkan kepada calon lead.
   - **Manajemen Data Customer:**
     - Sales dapat mengelola data customer yang telah ada.
   - **Memasukkan Data Project:**
     - Sales dapat membuat project baru dengan memilih data dari lead dan produk yang akan digunakan. 
     - Untuk membuat project, sales harus mengisi nama (lead) dan produk yang dipilih. 
     - Setelah data project disimpan, data ini akan masuk ke tabel project dengan status `pending`.
   
3. **Proses Persetujuan Manager:**
   - Calon lead pada tabel project ini nantinya akan masuk ke dalam tabel customer yang berlangganan, dengan ketentuan bahwa calon lead pada tabel project sudah di-approve oleh manager.

### Role: Manager

1. **Login sebagai manager:**
   - Manajer dapat login menggunakan kredensial yang telah disediakan (misalnya, username `admin` dan password `admin123`).
   - Setelah login, manajer akan diarahkan ke halaman manager disini manager juga Anda dapat memantau jumlah lead, project, customer, dan produk.

2. **Persetujuan atau Penolakan Lead:**
   - Manajer dapat melihat daftar lead yang telah dimasukkan oleh sales.
   - Manajer dapat melakukan approve atau reject terhadap lead tersebut.
   - Jika lead di-approve, data lead tersebut akan dipindahkan ke tabel customer yang berlangganan.
   - Jika lead di-reject, data lead tersebut tidak akan diproses lebih lanjut.

3. **Notifikasi:**
   - Sales akan menerima notifikasi setelah lead mereka di-approve atau di-reject oleh manager.


## Struktur Proyek

Berikut adalah struktur direktori utama dari proyek Laravel:

```plaintext
nama-proyek/
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── js/
│   ├── lang/
│   ├── sass/
│   └── views/
├── routes/
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── storage/
├── tests/
├── vendor/
├── .env.example
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
└── webpack.mix.js
