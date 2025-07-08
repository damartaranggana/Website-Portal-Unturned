# Shop Table Sorting Feature

## Overview
Fitur sorting tabel telah ditambahkan ke semua halaman shop untuk meningkatkan user experience. Pengguna sekarang dapat mengurutkan data berdasarkan kolom yang berbeda dengan mengklik header tabel.

## Files yang Diupdate

### 1. `shop.php`
- Menambahkan JavaScript sorting untuk tabel items dan vehicles
- Menggunakan file `shop_sorting.js` terpisah untuk konsistensi

### 2. `shop_items.php`
- Sudah memiliki sorting PHP-based
- Ditambahkan JavaScript sorting untuk interaktivitas tambahan
- Menggunakan file `shop_sorting.js`

### 3. `shop_vehicles.php`
- Sudah memiliki sorting PHP-based
- Ditambahkan JavaScript sorting untuk interaktivitas tambahan
- Menggunakan file `shop_sorting.js`

### 4. `shop.css`
- Menambahkan styling untuk sortable headers
- Visual feedback untuk hover dan active states
- Responsive design untuk mobile devices

### 5. `shop_sorting.js` (New)
- File JavaScript terpisah untuk fungsi sorting
- Dapat digunakan di semua halaman shop
- Mendukung sorting numerik dan string

## Fitur Sorting

### Visual Indicators
- **↕** - Default state (belum diurutkan)
- **↑** - Ascending sort (A-Z, 0-9)
- **↓** - Descending sort (Z-A, 9-0)

### Sorting Behavior
1. **Numeric Sorting**: Untuk kolom ID, Cost, Buyback
   - Mengabaikan koma dan format angka
   - Mengurutkan berdasarkan nilai numerik

2. **String Sorting**: Untuk kolom Item, Vehicle
   - Menggunakan `localeCompare()` untuk sorting yang akurat
   - Case-insensitive sorting

### Interactive Features
- **Click to Sort**: Klik header untuk mengurutkan
- **Toggle Direction**: Klik berulang untuk mengubah arah sorting
- **Hover Effects**: Visual feedback saat hover
- **Active State**: Header yang aktif ditandai dengan warna berbeda

## CSS Classes

### Sortable Headers
```css
.sortable - Header yang dapat diurutkan
.sort-asc - Header dengan sorting ascending
.sort-desc - Header dengan sorting descending
```

### Visual Feedback
```css
.sort-icon - Icon sorting (↕, ↑, ↓)
.hover effect - Background color change on hover
```

## Usage

### Untuk Developer
1. Pastikan tabel memiliki class `.table`
2. Include file `shop_sorting.js`
3. Fungsi sorting akan otomatis diinisialisasi

### Untuk User
1. Klik header kolom untuk mengurutkan
2. Klik lagi untuk mengubah arah sorting
3. Sorting berlaku untuk semua data yang ditampilkan

## Browser Support
- Chrome/Edge (modern)
- Firefox (modern)
- Safari (modern)
- Mobile browsers

## Performance
- Client-side sorting untuk responsivitas
- Tidak memerlukan reload halaman
- Efisien untuk dataset kecil hingga menengah

## Integration dengan Existing Features
- **Search**: Sorting bekerja dengan fitur pencarian
- **PHP Sorting**: Tetap berfungsi untuk server-side sorting
- **Responsive**: Bekerja di semua ukuran layar

## Troubleshooting

### Sorting Tidak Berfungsi
1. Pastikan file `shop_sorting.js` ter-include
2. Periksa console browser untuk error
3. Pastikan tabel memiliki class `.table`

### Icon Tidak Muncul
1. Periksa CSS untuk `.sort-icon`
2. Pastikan font mendukung karakter Unicode
3. Periksa styling di `shop.css`

### Mobile Issues
1. Pastikan responsive CSS ter-load
2. Periksa touch events di mobile
3. Test di berbagai ukuran layar

## Future Enhancements
- Multi-column sorting
- Custom sort functions
- Sort persistence (localStorage)
- Export sorted data
- Advanced filtering options 