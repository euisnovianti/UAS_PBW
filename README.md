# APLIKASI BERBASIS WEB- ANGGO (Angkot Garut Online)

**Identitas Mahasiswa:**
* **Nama:** Euis Novianti
* **NIM:** 2307021
* **Mata Kuliah:** Pemrograman Berbasis Web

---

## 📌 Deskripsi Aplikasi
**ANGGO atau ANGKOT GARUT ONLINE** adalah aplikasi berbasis website yang dirancang untuk memodernisasi sistem transportasi publik di Kabupaten Garut. Aplikasi ini membantu pengguna mencari rute angkot berdasarkan titik awal dan tujuan.

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

## Link Database dan Laporan
https://drive.google.com/drive/folders/1dmgKtJhMmvyzGbIIZQ_2pnFKrhpCqe8p

---

## 🚀 Panduan Instalasi
1. **Clone Repositori:**
   ```bash
   git clone [https://github.com/euisnovianti/UAS_PBW.git]
   cd anggo
2. **Instal Dependency:**
   ```bash
   composer install
   npm install && npm run build
3. **Konfigurasi Environment**: Salin file .env anggo_db
4. **Generate Key & Migrate**
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   
6. **Jalankan Aplikasi:**
   ```bash
   php artisan serve

## 📸 Screenshot Tampilan Web ANGGO
- Tampilan awal

<img width="885" height="484" alt="{99329E1A-61E8-4B31-9F9A-74D5142FBD7E}" src="https://github.com/user-attachments/assets/b3fdf241-afb0-4f87-b04b-43a3fde859b9" />

- Tampilan Register

<img width="788" height="429" alt="image" src="https://github.com/user-attachments/assets/c5292cab-ea29-4e0c-817c-95942625498e" />

- Tampilan Log In
<img width="748" height="404" alt="image" src="https://github.com/user-attachments/assets/37094a70-0eed-438d-9bde-5bfc86e21aa8" />

- Tampilan User
<img width="757" height="417" alt="image" src="https://github.com/user-attachments/assets/e256be98-9936-42d1-b686-80ff9b34ad44" />

- Fitur Pencarian Angkot
<img width="772" height="422" alt="image" src="https://github.com/user-attachments/assets/1207512d-68f1-4cdd-ae45-194b8e06f93b" />

- Detail User
<img width="762" height="421" alt="image" src="https://github.com/user-attachments/assets/aa2bd507-31b0-403d-94ab-9746789420bd" />

- Dashboard Admin
<img width="776" height="438" alt="image" src="https://github.com/user-attachments/assets/d50f4cf6-4983-467a-afab-0b4899d0b131" />

- Kelola Data Angkot
<img width="776" height="426" alt="image" src="https://github.com/user-attachments/assets/3e4ee16e-d016-4a82-8a3e-1e3c998c969d" />

- Detail Tambah Angkot
<img width="759" height="416" alt="image" src="https://github.com/user-attachments/assets/24909204-f87f-41ed-8b3d-63214757e0eb" />

- Kelola Data Pengguna
<img width="776" height="429" alt="image" src="https://github.com/user-attachments/assets/d11303d4-24c1-40ce-9928-2983cb273406" />

- Fitur Uji Coba Data Angkot di Admin
<img width="760" height="420" alt="image" src="https://github.com/user-attachments/assets/b3d3e1fb-6616-489b-aceb-ad1699557fcf" />










   
   

   
