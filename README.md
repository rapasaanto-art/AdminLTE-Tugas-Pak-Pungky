# Tugas Proyek E-Commerce — Halaman Admin (CRUD Produk)

Aplikasi halaman admin e-commerce dengan fitur **CRUD (Create, Read, Update, Delete)** untuk tabel master **Produk**, dibangun menggunakan **Laravel 9** dan **MySQL**.

## Anggota

| No | Nama Lengkap | NIM |
|----|--------------|-----|
| 1  | [Rapasha Anto Ramadhani] | [2522105004] |


> Ganti placeholder di atas dengan nama dan NIM anggota kelompok Anda.

## Fitur

- **Create** — Tambah produk baru (nama, kategori, harga, stok, deskripsi, gambar) dengan validasi form.
- **Read** — Daftar produk dengan pencarian (nama/kategori), pagination, dan halaman detail produk.
- **Update** — Edit data produk, termasuk mengganti gambar.
- **Delete** — Hapus produk dengan konfirmasi, gambar terkait ikut dihapus dari storage.
- Upload gambar produk (JPG/PNG/WEBP, maks. 2 MB) disimpan di `storage/app/public/produk`.
- Data contoh disediakan melalui seeder (`ProdukSeeder`).

## Teknologi

- PHP 8.0+ (Laravel 9)
- MySQL (XAMPP)
- Bootstrap 5 & Bootstrap Icons (via CDN)

## Cara Menjalankan

1. **Clone repositori**

   ```bash
   git clone <url-repositori-ini>
   cd ecommerce-admin
   ```

2. **Install dependensi**

   ```bash
   composer install
   ```

3. **Konfigurasi environment**

   ```bash
   copy .env.example .env        # Windows
   # cp .env.example .env        # Linux/Mac
   php artisan key:generate
   ```

   Sesuaikan konfigurasi database pada `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecommerce_admin
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Buat database** (jalankan MySQL di XAMPP/phpMyAdmin)

   ```sql
   CREATE DATABASE ecommerce_admin;
   ```

5. **Migrasi & seed data**

   ```bash
   php artisan migrate --seed
   php artisan storage:link
   ```

6. **Jalankan aplikasi**

   ```bash
   php artisan serve
   ```

   Buka `http://localhost:8000` — otomatis diarahkan ke halaman admin produk (`/admin/produk`).

## Struktur Fitur CRUD

| Operasi | Method | Route | Controller Method |
|---------|--------|-------|-------------------|
| Create (form)  | GET    | `/admin/produk/create`      | `create()` |
| Create (simpan)| POST   | `/admin/produk`             | `store()` |
| Read (daftar)  | GET    | `/admin/produk`             | `index()` |
| Read (detail)  | GET    | `/admin/produk/{produk}`    | `show()` |
| Update (form)  | GET    | `/admin/produk/{produk}/edit` | `edit()` |
| Update (simpan)| PUT    | `/admin/produk/{produk}`    | `update()` |
| Delete         | DELETE | `/admin/produk/{produk}`    | `destroy()` |

## Lisensi

Proyek ini dibuat untuk keperluan tugas kuliah.
