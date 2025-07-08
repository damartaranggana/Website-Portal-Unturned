# Unturned Portal - Shop System

Portal web untuk game Unturned dengan sistem shop yang terintegrasi dengan database MySQL.

## Fitur

- ✅ Tampilan modern dan responsif
- ✅ Sistem shop items dan vehicles
- ✅ Integrasi database MySQL
- ✅ Pencarian dan filter data
- ✅ Navigasi tab yang smooth
- ✅ Animasi dan efek visual
- ✅ Mobile-friendly design

## Struktur Database

### Tabel `uconomyitemshop`
- `id` - Primary key
- `itemname` - Nama item
- `cost` - Harga beli
- `buyback` - Harga jual kembali

### Tabel `uconomyvehicleshop`
- `id` - Primary key
- `vehiclename` - Nama kendaraan
- `cost` - Harga beli

## Setup Instruksi

### 1. Database Setup

1. Buka phpMyAdmin atau MySQL client
2. Import file `database.sql` untuk membuat database dan tabel
3. Atau jalankan perintah SQL berikut:

```sql
-- Buat database
CREATE DATABASE unturned_portal;
USE unturned_portal;

-- Import struktur dan data dari database.sql
```

### 2. Konfigurasi Database

Edit file `db_config.php` dan sesuaikan dengan konfigurasi database Anda:

```php
$host = 'localhost';        // Host database
$dbname = 'unturned_portal'; // Nama database
$username = 'root';         // Username database
$password = '';             // Password database
```

### 3. File Structure

```
portal/
├── index.html              # Halaman utama
├── news.html               # Halaman berita
├── shop.php                # Halaman shop (dengan database)
├── leaderboard.html        # Halaman leaderboard
├── style.css               # CSS utama
├── shop.css                # CSS khusus shop
├── leaderboard.css         # CSS khusus leaderboard
├── db_config.php           # Konfigurasi database
├── database.sql            # File SQL untuk setup database
└── README.md               # File ini
```

### 4. Web Server Setup

1. Pastikan XAMPP/WAMP/LAMP sudah terinstall
2. Letakkan semua file di folder `htdocs` (XAMPP) atau `www` (WAMP)
3. Start Apache dan MySQL service
4. Akses melalui browser: `http://localhost/portal/`

## Penggunaan

### Halaman Shop
- Akses `shop.php` untuk melihat halaman shop
- Data items dan vehicles diambil dari database MySQL
- Fitur pencarian dan filter tersedia
- Navigasi tab untuk beralih antara items dan vehicles

### Menambah Data
Untuk menambah data baru, Anda bisa:

1. **Melalui phpMyAdmin:**
   - Buka phpMyAdmin
   - Pilih database `unturned_portal`
   - Edit tabel `uconomyitemshop` atau `uconomyvehicleshop`

2. **Melalui SQL:**
```sql
-- Menambah item baru
INSERT INTO uconomyitemshop (itemname, cost, buyback) 
VALUES ('Item Baru', 1000, 500);

-- Menambah vehicle baru
INSERT INTO uconomyvehicleshop (vehiclename, cost) 
VALUES ('Vehicle Baru', 50000);
```

## Fitur JavaScript

- **Mobile Navigation:** Toggle menu untuk mobile
- **Tab Navigation:** Beralih antara items dan vehicles
- **Search & Filter:** Pencarian dan filter data real-time
- **Smooth Scrolling:** Animasi scroll yang halus
- **Intersection Observer:** Animasi saat elemen muncul
- **Hover Effects:** Efek hover pada tabel dan tombol

## Customization

### Menambah Kategori Baru
1. Edit file `shop.php`
2. Tambahkan option baru di select filter
3. Pastikan data di database sesuai dengan kategori baru

### Mengubah Styling
- Edit `style.css` untuk styling global
- Edit `shop.css` untuk styling khusus shop
- Gunakan CSS variables untuk konsistensi warna

### Menambah Fitur
- Gunakan fungsi helper di `db_config.php`
- Tambahkan JavaScript untuk interaksi baru
- Ikuti struktur HTML yang sudah ada

## Troubleshooting

### Database Connection Error
- Pastikan MySQL service berjalan
- Periksa konfigurasi di `db_config.php`
- Pastikan database `unturned_portal` sudah dibuat

### Data Tidak Muncul
- Periksa apakah tabel sudah terisi data
- Jalankan query `SELECT * FROM uconomyitemshop;` atau `SELECT * FROM uconomyvehicleshop;` di phpMyAdmin
- Periksa error log PHP

### Styling Tidak Sesuai
- Pastikan semua file CSS ter-load dengan benar
- Periksa console browser untuk error
- Pastikan path file CSS benar

## Support

Untuk bantuan lebih lanjut, silakan hubungi developer atau buat issue di repository ini.

---

**Versi:** 1.0.0  
**Update Terakhir:** 2024  
**Compatible dengan:** PHP 7.4+, MySQL 5.7+
