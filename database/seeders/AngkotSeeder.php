<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Angkot;

class AngkotSeeder extends Seeder
{
    public function run(): void
    {
        Angkot::truncate();

        $data = [
            [
                'no_angkot' => '01',
                'warna_mobil' => 'Hijau',
                'jurusan' => 'Terminal Guntur - Sukaregang',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan guntur indah, jalan merdeka, bunderan jayaraga, jalan guntur (ibc), sukaregang, jalan a.yani, jalan bratayudha, sukadana, jalan pasundan, jalan papandayan, maktal, jalan cimanuk',
                'harga' => 5000,
                'latitude' => -7.22080, 'longitude' => 107.91020
            ],
            [
                'no_angkot' => '02',
                'warna_mobil' => 'Orange Tua',
                'jurusan' => 'Terminal Guntur - Sukadana',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan guntur indah, jalan merdeka, bunderan jayaraga, jalan cimanuk, jalan papandayan, jalan kiansantang, jalan siliwangi, yogya, jalan ranggalawe, jalan pasundan, jalan bratayudha, asia toserba, jalan a.yani, jalan guntur, jalan perintis kemerdekaan',
                'harga' => 5000,
                'latitude' => -7.21000, 'longitude' => 107.92000
            ],
            [
                'no_angkot' => '03',
                'warna_mobil' => 'Biru Muda',
                'jurusan' => 'Terminal Guntur - RSU',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan guntur indah, jalan merdeka, jalan terusan pembangunan, simpang lima, jalan pembangunan, rsu dr. slamet, jalan papandayan, jalan cikuray, jalan ranggalawe, alun alun garut, jalan a.yani, jalan cimanuk, jalan pembangunan, simpang lima',
                'harga' => 5000,
                'latitude' => -7.22050, 'longitude' => 107.89500
            ],
            [
                'no_angkot' => '04',
                'warna_mobil' => 'Coklat Muda',
                'jurusan' => 'Terminal Guntur - Cipanas',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan guntur sari, jalan merdeka, bunderan jayaraga, jalan cimanuk, simpang lima, jalan otista, jalan panday, jalan raya cipanas, tarogong, pemandian air panas',
                'harga' => 5000,
                'latitude' => -7.18950, 'longitude' => 107.87650
            ],
            [
                'no_angkot' => '05',
                'warna_mobil' => 'Merah Bata',
                'jurusan' => 'Terminal Guntur - Banyuresmi/Leuwigoong',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan hasan arief (stm), banyuresmi, leuwigoong',
                'harga' => 6000,
                'latitude' => -7.15000, 'longitude' => 107.93000
            ],
            [
                'no_angkot' => '06',
                'warna_mobil' => 'Putih-Biru',
                'jurusan' => 'Terminal Guntur - Bojongloa/Cilawu',
                'jalur_rute' => 'terminal guntur, jalan merdeka, jalan cimanuk, maktal, jalan raya cilawu, bojongloa, cilawu',
                'harga' => 7000,
                'latitude' => -7.25000, 'longitude' => 107.94000
            ],
            [
                'no_angkot' => '07',
                'warna_mobil' => 'Putih-Merah',
                'jurusan' => 'Terminal Guntur - Sukawening',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan guntur sari, jalan merdeka, jalan perintis kemerdekaan, jalan guntur, sukaregang, bunderan suci, karangpawitan, wanaraja, sukawening',
                'harga' => 10000,
                'latitude' => -7.17000, 'longitude' => 108.02000
            ],
            [
                'no_angkot' => '08',
                'warna_mobil' => 'Putih-Kuning',
                'jurusan' => 'Terminal Guntur - Pasar Andir',
                'jalur_rute' => 'terminal guntur, jalan merdeka, jalan cimanuk, maktal, simpang lima, jalan otista, bayongbong, pasar andir',
                'harga' => 8000,
                'latitude' => -7.26500, 'longitude' => 107.86500
            ],
            [
                'no_angkot' => '09',
                'warna_mobil' => 'Putih-Hijau',
                'jurusan' => 'Terminal Guntur - Cibodas',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan merdeka, jalan cimanuk, samarang, pasar samarang, simpang lima, jalan otista, cibodas, bunderan jayaraga',
                'harga' => 7000,
                'latitude' => -7.24000, 'longitude' => 107.85000
            ],
            [
                'no_angkot' => '10',
                'warna_mobil' => 'Hijau Telur Asin',
                'jurusan' => 'Terminal Guntur - Leles Kadungora',
                'jalur_rute' => 'terminal guntur, jalan merdeka, tarogong, leles, kadungora',
                'harga' => 8000,
                'latitude' => -7.12000, 'longitude' => 107.89000
            ],
            [
                'no_angkot' => '11',
                'warna_mobil' => 'Putih-Biru Tua',
                'jurusan' => 'Terminal Guntur - Perum Suci Permai',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan guntur sari, jalan merdeka, copong, perum suci permai',
                'harga' => 5000,
                'latitude' => -7.20000, 'longitude' => 107.92000
            ],
            [
                'no_angkot' => '12',
                'warna_mobil' => 'Putih-Oren Tua',
                'jurusan' => 'Terminal Guntur - Karangpawitan',
                'jalur_rute' => 'terminal guntur, jalan guntur melati, jalan merdeka, sukaregang, suci, karangpawitan, cimurah',
                'harga' => 6000,
                'latitude' => -7.21000, 'longitude' => 107.95000
            ],
            [
                'no_angkot' => '13',
                'warna_mobil' => 'kurang tau',
                'jurusan' => 'Terminal Guntur - Cisurupan',
                'jalur_rute' => 'terminal guntur, jalan merdeka, jalan cimanuk, maktal, simpang lima, jalan otista, bayongbong, cisurupan',
                'harga' => 10000,
                'latitude' => -7.31500, 'longitude' => 107.78500
            ],
            [
                'no_angkot' => '14',
                'warna_mobil' => 'Putih-Kuning-Oranye',
                'jurusan' => 'Terminal Guntur - Cikajang',
                'jalur_rute' => 'terminal guntur, jalan merdeka, jalan cimanuk, maktal, simpang lima, jalan otista, bayongbong, cisurupan, cikajang',
                'harga' => 15000,
                'latitude' => -7.38500, 'longitude' => 107.78500
            ],
            [
                'no_angkot' => '15',
                'warna_mobil' => 'kurang tau',
                'jurusan' => 'Terminal Guntur - Sanding/Goler',
                'jalur_rute' => 'terminal guntur, jalan merdeka, sanding, goler',
                'harga' => 5000,
                'latitude' => -7.23000, 'longitude' => 107.91000
            ],
            [
                'no_angkot' => '16',
                'warna_mobil' => 'Ungu',
                'jurusan' => 'Terminal Guntur - Perum Cempaka Indah',
                'jalur_rute' => 'terminal guntur, jalan merdeka, perum cempaka indah',
                'harga' => 5000,
                'latitude' => -7.23000, 'longitude' => 107.89000
            ],
        ];

        foreach ($data as $item) {
            Angkot::create($item);
        }
    }
}