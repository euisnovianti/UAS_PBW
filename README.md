# APLIKASI BERBASIS WEB- ANGGO (Angkot Garut Online)

**Identitas Mahasiswa:**
* **Nama:** Euis Novianti
* **NIM:** 2307021
* **Mata Kuliah:** Pemrograman Berbasis Web
* **Dosen:** Sigit Hudawiguna, S.Kom., M.Kom.

---

## 📌 Deskripsi Aplikasi
**ANGGO** adalah aplikasi berbasis website yang dirancang untuk memodernisasi sistem transportasi publik di Kabupaten Garut. Aplikasi ini membantu pengguna mencari rute angkot berdasarkan titik awal dan tujuan.

### ✨ Fitur Utama:
* **Pencarian Rute:** Mencari nomor angkot berdasarkan lokasi asal dan tujuan.
* **Visualisasi Peta:** Menampilkan jalur trayek dalam bentuk garis rute (polyline).
* **Estimasi Waktu & Harga:** Menghitung ongkos perjalanan secara otomatis.
* **Autentikasi Multi-User:** Fitur Login/Register untuk keamanan data pengguna.
* **Manajemen Profil:** Pengguna dapat memperbarui informasi pribadi mereka.

---

## 🛠️ Teknologi (Tech Stack)
* **Framework:** Laravel 11
* **Frontend:** Tailwind CSS & Leaflet.js (Map Library)
* **Database:** MySQL
* **API:** OSRM (Open Source Routing Machine) API untuk perhitungan rute.

---

## 🚀 Panduan Instalasi
1. **Clone Repositori:**
   ```bash
   git clone [https://github.com/euisnovianti/UAS_PBW.git]
   cd anggo
2. **Instal Dependency:**
   ```composer install
   npm install && npm run build
3. **Konfigurasi Environment**: Salin file .env anggo_db
4. **Generate Key & Migrate**
   ```php artisan key:generate
   php artisan migrate --seed
   
6. **Jalankan Aplikasi:**
   ```php artisan serve

## 📸 Screenshot Tampilan Web ANGGO

<img width="885" height="484" alt="{99329E1A-61E8-4B31-9F9A-74D5142FBD7E}" src="https://github.com/user-attachments/assets/b3fdf241-afb0-4f87-b04b-43a3fde859b9" />


   
   

   
