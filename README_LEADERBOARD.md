# Unturned Portal Leaderboard System

## Setup Instructions

### 1. Database Setup
1. Pastikan XAMPP sudah terinstall dan MySQL server berjalan
2. Buka browser dan akses: `http://localhost/unturnedweb/portal/setup_database.php`
3. Script ini akan otomatis membuat:
   - Database `unturned`
   - Tabel `playerstats`
   - Sample data untuk testing
   - Index untuk performa

### 2. File Structure
```
portal/
├── db_config.php              # Konfigurasi database
├── setup_database.php         # Script setup database
├── leaderboard.php            # Halaman utama leaderboard (kategori)
├── leaderboard_kills.php      # Leaderboard kills individual
├── leaderboard_zombies.php    # Leaderboard zombies individual
├── leaderboard_harvest.php    # Leaderboard harvest individual
├── leaderboard_fish.php       # Leaderboard fish individual
├── leaderboard_playtime.php   # Leaderboard playtime individual
├── leaderboard.css            # CSS untuk leaderboard
├── leaderboard.js             # JavaScript untuk leaderboard
└── database.sql               # SQL untuk membuat database
```

### 3. Database Schema
Tabel `playerstats` memiliki kolom:
- `id` - Primary key
- `Name` - Nama player
- `Kills` - Jumlah kills
- `Zombies` - Jumlah zombies killed
- `Harvests` - Jumlah resources harvested
- `Fish` - Jumlah fish caught
- `Playtime` - Playtime dalam detik
- `created_at` - Timestamp pembuatan
- `updated_at` - Timestamp update

### 4. Halaman Leaderboard

#### A. Halaman Utama (`leaderboard.php`)
- Menampilkan kategori leaderboard
- Link ke halaman individual

#### B. Halaman Tab (`leaderboard.html`)
- Semua leaderboard dalam satu halaman
- Navigasi tab untuk beralih antar kategori
- Data diambil langsung dari database

#### C. Halaman Individual
- `leaderboard_kills.php` - Top 10 kills
- `leaderboard_zombies.php` - Top 10 zombies killed
- `leaderboard_harvest.php` - Top 10 harvests
- `leaderboard_fish.php` - Top 10 fish caught
- `leaderboard_playtime.php` - Top 10 playtime (dalam jam)

### 5. Cara Menggunakan

1. **Setup Database:**
   ```
   http://localhost/unturnedweb/portal/setup_database.php
   ```

2. **Akses Leaderboard:**
   ```
   http://localhost/unturnedweb/portal/leaderboard.php
   ```

3. **Akses Individual Leaderboard:**
   ```
   http://localhost/unturnedweb/portal/leaderboard_kills.php
   http://localhost/unturnedweb/portal/leaderboard_zombies.php
   http://localhost/unturnedweb/portal/leaderboard_harvest.php
   http://localhost/unturnedweb/portal/leaderboard_fish.php
   http://localhost/unturnedweb/portal/leaderboard_playtime.php
   ```

### 6. Fitur Table Sorting

#### Cara Menggunakan Sorting:
1. **Klik header kolom** untuk mengurutkan data
2. **Klik pertama** - Urutkan ascending (A-Z, 0-9)
3. **Klik kedua** - Urutkan descending (Z-A, 9-0)
4. **Klik ketiga** - Kembali ke urutan default

#### Kolom yang Bisa Di-sort:
- ✅ **Name** - Urutkan berdasarkan nama player (A-Z)
- ✅ **Kills** - Urutkan berdasarkan jumlah kills
- ✅ **Zombies** - Urutkan berdasarkan jumlah zombies killed
- ✅ **Harvests** - Urutkan berdasarkan jumlah harvests
- ✅ **Fish** - Urutkan berdasarkan jumlah fish caught
- ✅ **Playtime** - Urutkan berdasarkan waktu bermain

#### Fitur Sorting:
- 🔄 **Auto-detect** - Otomatis mendeteksi angka atau teks
- 📊 **Number formatting** - Tetap mempertahankan format angka (1,000)
- 🏆 **Rank update** - Nomor rank otomatis terupdate setelah sorting
- 🎨 **Visual feedback** - Ikon dan warna berubah saat sorting aktif
- 📱 **Responsive** - Berfungsi di desktop dan mobile

### 7. Menambah Data Player Baru

Untuk menambah player baru, gunakan query SQL:
```sql
INSERT INTO playerstats (Name, Kills, Zombies, Harvests, Fish, Playtime) 
VALUES ('PlayerName', 100, 500, 200, 50, 36000);
```

### 8. Update Data Player

Untuk update data player:
```sql
UPDATE playerstats 
SET Kills = 150, Zombies = 600, Harvests = 250, Fish = 60, Playtime = 40000 
WHERE Name = 'PlayerName';
```

### 9. Troubleshooting

#### Error: "Undefined variable $conn"
- Pastikan `db_config.php` sudah benar
- Pastikan MySQL server berjalan
- Pastikan database `unturned` sudah dibuat

#### Error: "Table doesn't exist"
- Jalankan `setup_database.php` untuk membuat tabel

#### Data tidak muncul
- Pastikan tabel `playerstats` memiliki data
- Cek query di file PHP
- Pastikan nama kolom sesuai dengan database

#### Sorting tidak berfungsi
- Pastikan `leaderboard.js` sudah dimuat
- Cek console browser untuk error JavaScript
- Pastikan tabel memiliki class `table`

### 10. Fitur Leaderboard

- ✅ Koneksi database MySQL
- ✅ Tampilan responsive
- ✅ Ranking otomatis
- ✅ Format angka dengan separator
- ✅ Security dengan htmlspecialchars
- ✅ Playtime dalam jam (konversi otomatis)
- ✅ Navigation antar halaman
- ✅ Tab navigation (di leaderboard.html)
- ✅ **Table sorting** - Sort berdasarkan kolom apapun
- ✅ **Visual feedback** - Ikon dan warna untuk sorting
- ✅ **Auto rank update** - Rank otomatis terupdate

### 11. Customization

Untuk mengubah tampilan:
- Edit `leaderboard.css` untuk styling
- Edit `leaderboard.js` untuk JavaScript
- Edit file PHP individual untuk logika

Untuk mengubah data:
- Edit `setup_database.php` untuk sample data
- Atau gunakan phpMyAdmin untuk mengelola database

### 12. Browser Support

Fitur sorting mendukung:
- ✅ Chrome/Chromium
- ✅ Firefox
- ✅ Safari
- ✅ Edge
- ✅ Mobile browsers 