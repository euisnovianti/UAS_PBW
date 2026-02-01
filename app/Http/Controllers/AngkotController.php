<?php

namespace App\Http\Controllers;

use App\Models\Angkot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AngkotController extends Controller
{
    public function index()
    {
        return view('angkot.index');
    }

    public function search(Request $request)
    {
        $originName = $request->input('origin'); 
        $destinationName = $request->input('destination');

       
        // Cari angkot yang rutenya mengandung nama lokasi yang diketik user
        $angkotTerbaik = Angkot::where('jalur_rute', 'LIKE', "%{$originName}%")
                               ->where('jalur_rute', 'LIKE', "%{$destinationName}%")
                               ->first();


        if (!$angkotTerbaik) {
            $angkotTerbaik = Angkot::where('jalur_rute', 'LIKE', "%{$destinationName}%")->first();
        }

        // menentukan Harga
        if ($angkotTerbaik) {
            //  harga asli dari Database
            $harga = $angkotTerbaik->harga;
        } else {
            // pakai estimasi jarak (Cadangan)
            $harga = 0; 
        }

        //  Geocoding & OSRM 
        $coordAsal = $this->getCoordinates($originName);
        $coordTujuan = $this->getCoordinates($destinationName);

        if (!$coordAsal) $coordAsal = ['lat' => -7.2136, 'lng' => 107.9069]; 
        if (!$coordTujuan) $coordTujuan = ['lat' => -7.2278, 'lng' => 107.9087];

        $url = "http://router.project-osrm.org/route/v1/driving/{$coordAsal['lng']},{$coordAsal['lat']};{$coordTujuan['lng']},{$coordTujuan['lat']}?overview=full";

        try {
            $response = Http::get($url);
            $data = $response->json();

            if (isset($data['routes'][0])) {
                $route = $data['routes'][0];
                $geometry = $route['geometry']; 
                $distanceMeter = $route['distance']; 
                $durationSeconds = $route['duration'];

                $jarakKm = round($distanceMeter / 1000, 1);
                $waktuMenit = round($durationSeconds / 60);

                // Update Harga di DB
                if ($harga == 0) {
                    $harga = 4000 + ($jarakKm * 2000);
                    $harga = ceil($harga / 500) * 500;
                }

                return view('angkot.index', [
                    'origin_coord' => [$coordAsal['lat'], $coordAsal['lng']],
                    'destination_coord' => [$coordTujuan['lat'], $coordTujuan['lng']],
                    'geometry' => $geometry,
                    'distance' => $jarakKm,
                    'duration' => $waktuMenit,
                    'price' => $harga, //  pake harga DB jika ada
                    'angkot_terbaik' => $angkotTerbaik,
                    'success' => true
                ]);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengambil rute.');
        }

        return back()->with('error', 'Rute tidak ditemukan.');
    }

    private function getCoordinates($locationName)
    {
        $locationName = strtolower(trim($locationName));
        
        // Kamus Lokasi
        $locations = [
            'terminal guntur' => ['lat' => -7.2105, 'lng' => 107.9008],
            'alun alun' => ['lat' => -7.2215, 'lng' => 107.9073],
            'cipanas' => ['lat' => -7.1650, 'lng' => 107.8930],
            'sukaregang' => ['lat' => -7.2180, 'lng' => 107.9150],
            'simpang lima' => ['lat' => -7.2230, 'lng' => 107.9050],
            'tarogong' => ['lat' => -7.1950, 'lng' => 107.8890],
            'leuwigoong' => ['lat' => -7.1234, 'lng' => 107.9456],
            'karangpawitan' => ['lat' => -7.2156, 'lng' => 107.9400],
            'rsu' => ['lat' => -7.2345, 'lng' => 107.8923], 
            'wanaraja' => ['lat' => -7.1789, 'lng' => 108.0012],
            'samarang' => ['lat' => -7.2000, 'lng' => 107.8500],
        ];

        foreach ($locations as $key => $coord) {
            if (str_contains($locationName, $key)) {
                return $coord;
            }
        }
        return null;
    }
}