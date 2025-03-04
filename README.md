# Rental Mobil Management System

## 📌 Deskripsi
Aplikasi berbasis web untuk mengelola rental mobil. Aplikasi ini memungkinkan admin dan pemilik mobil untuk mengelola data mobil serta transaksi penyewaan. Dibangun menggunakan **Laravel 11** dan **SQLite**.

## 🚀 Fitur Utama
- **Autentikasi Pengguna** (Admin & Pemilik Mobil)
- **Manajemen Mobil** (Tambah, Edit, Hapus, dan Lihat Data Mobil)
- **Manajemen Transaksi** (Lihat Riwayat Penyewaan)
- **Manajemen Pengguna** (Hanya Admin)
- **Soft Delete** untuk penghapusan data sementara
- **Relasi Database** dengan Eloquent ORM

## 🛠️ Teknologi yang Digunakan
| **Kategori**         | **Teknologi**          |
|---------------------|----------------------|
| **Backend**        | Laravel 11, PHP 8.4  |
| **Frontend**       | TailwindCSS, Bootstrap, Blade Template |
| **Asset Bundling** | Vite, Laravel Vite Plugin |
| **Database**       | SQLite |
| **API & AJAX**     | Axios |
| **Development**    | Laravel Herd, TablePlus |

## ⚙️ Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/rental-mobil.git
   cd rental-mobil
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   - Salin file `.env.example` menjadi `.env`
   ```bash
   cp .env.example .env
   ```
   - Edit file `.env` untuk memastikan database menggunakan **SQLite**
     ```ini
     DB_CONNECTION=sqlite
     DB_DATABASE=/full/path/to/database.sqlite
     ```
   - Buat file database jika belum ada:
     ```bash
     touch database/database.sqlite
     ```

4. **Generate Key & Migrate Database**
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```

5. **Menjalankan Server**
   - Jika menggunakan Laravel Herd:
     ```bash
     herd start
     ```
   - Jika tidak menggunakan Herd:
     ```bash
     php artisan serve
     ```
   
6. **Menjalankan Vite (Frontend Dev Server)**
   ```bash
   npm run dev
   ```

## 📜 Lisensi
Proyek ini menggunakan lisensi **MIT**.

---

