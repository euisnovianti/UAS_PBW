<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANGGO - Angkot Garut Online</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'anggo-blue': '#1e3a8a',
                        'anggo-gold': '#eab308',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 antialiased overflow-hidden">

    <header class="w-full h-16 bg-blue-900 flex items-center justify-between px-4 md:px-6 shadow-md relative z-[1100]">
        
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-van-shuttle text-yellow-500 text-2xl"></i>
            <span class="text-white font-bold text-xl tracking-wider">ANGGO</span>
        </div>

        <div class="flex items-center gap-3">
            @if (Route::has('login'))
                @auth
                    @if(Auth::user()->email == 'admin@gmail.com') 
                        <a href="{{ url('/dashboard') }}" class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-sm transition border border-blue-700 flex items-center gap-2">
                            <i class="fa-solid fa-user-shield"></i> 
                            <span class="hidden md:inline">Dashboard</span>
                        </a>
                    @endif

                    <div class="hidden md:block text-gray-200 font-bold text-sm ml-2">
                        Halo, {{ Auth::user()->name }}
                    </div>

                    <a href="{{ route('profile.edit') }}" class="w-8 h-8 rounded-full bg-blue-800 text-blue-200 flex items-center justify-center hover:bg-yellow-500 hover:text-blue-900 transition shadow-sm" title="Pengaturan Akun">
                        <i class="fa-solid fa-user-gear text-sm"></i>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-8 h-8 rounded-full bg-red-500/20 text-red-400 flex items-center justify-center hover:bg-red-600 hover:text-white transition" title="Keluar">
                            <i class="fa-solid fa-power-off text-sm"></i>
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}" class="text-gray-200 hover:text-white font-bold text-sm px-3 py-2 transition">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold text-sm px-4 py-2 rounded-full shadow-sm transition">
                            Daftar
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <div class="relative w-full h-[calc(100vh-64px)] bg-gray-200">

        <div id="map" class="w-full h-full z-0"></div>

        <div class="absolute top-4 left-4 right-4 z-[1000] md:top-6 md:left-6 md:right-auto md:w-80 transition-all duration-300">
    
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl p-4 border border-white/50 hover:bg-white/95 transition duration-300">
                
                <h2 class="text-blue-900 font-bold text-base mb-3 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex items-center justify-center text-white shadow-sm">
                        <i class="fa-solid fa-route text-xs"></i>
                    </div>
                    <span>Cari Rute</span>
                </h2>

                <form action="{{ route('angkot.search') }}" method="GET" class="space-y-2">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-circle-dot text-blue-800 text-xs group-focus-within:text-blue-600 transition"></i>
                        </div>
                        <input type="text" name="origin" placeholder="Dari mana?" 
                            class="block w-full pl-9 pr-3 py-2.5 border-0 rounded-xl bg-white/50 focus:bg-white focus:ring-2 focus:ring-blue-500 text-sm shadow-sm placeholder-gray-500 transition font-medium text-gray-700" required>
                    </div>

                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-location-dot text-red-500 text-xs group-focus-within:text-red-600 transition"></i>
                        </div>
                        <input type="text" name="destination" placeholder="Mau ke mana?" 
                            class="block w-full pl-9 pr-3 py-2.5 border-0 rounded-xl bg-white/50 focus:bg-white focus:ring-2 focus:ring-blue-500 text-sm shadow-sm placeholder-gray-500 transition font-medium text-gray-700" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-2.5 rounded-xl shadow-md flex justify-center items-center gap-2 transition transform active:scale-95 mt-2">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        <span class="text-sm">Cari Angkot</span>
                    </button>
                </form>
            </div>
        </div>

        <div id="result-card" class="absolute bottom-0 left-0 right-0 z-[1000] bg-white rounded-t-3xl shadow-[0_-10px_30px_rgba(0,0,0,0.15)] transform transition-transform duration-500 {{ session('success') || request('origin') ? 'translate-y-0' : 'translate-y-full' }}">
            <div class="p-2 flex justify-center cursor-pointer" onclick="toggleResult()">
                <div class="w-12 h-1.5 bg-gray-300 rounded-full mt-2"></div>
            </div>
            <div class="p-6 pb-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Estimasi Waktu</h3>
                        <div class="text-4xl font-bold text-blue-900 mt-2" id="waktu-display">0 <span class="text-lg font-normal text-gray-600">menit</span></div>
                    </div>
                    <div class="text-right">
                        <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Ongkos</h3>
                        <div class="text-3xl font-bold text-yellow-600 mt-2" id="harga-display">Rp 0</div>
                    </div>
                </div>
                <div class="bg-blue-50 rounded-2xl p-5 border border-blue-100 flex items-center gap-4 shadow-sm">
                    <div class="bg-white p-3 rounded-xl shadow-md">
                        <i class="fa-solid fa-van-shuttle text-3xl text-blue-900"></i>
                    </div>
                    <div class="flex-1">
                        <div class="font-bold text-gray-800 text-lg" id="rute-display">Silakan Cari Rute</div>
                        <div class="text-sm text-gray-600 mt-1" id="jarak-display">- km</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // --- 1. INISIALISASI PETA (Default: Garut Kota) ---
            var map = L.map('map', { zoomControl: false }).setView([-7.2278, 107.9087], 13);
            
            // Pindahkan Zoom Control ke pojok kanan bawah biar rapi
            L.control.zoom({ position: 'bottomright' }).addTo(map);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // --- 2. DEFINISI IKON MARKER (Pakai FontAwesome biar keren) ---
            // Ikon Asal (Biru)
            var iconAsal = L.divIcon({
                className: 'custom-div-icon',
                html: "<div style='background-color:#1e3a8a; width:40px; height:40px; border-radius:50%; border:3px solid white; display:flex; justify-content:center; align-items:center; box-shadow:0 4px 6px rgba(0,0,0,0.3);'>" +
                    "<i class='fa-solid fa-circle-dot text-white text-lg'></i></div>",
                iconSize: [40, 40],
                iconAnchor: [20, 20]
            });

            // Ikon Tujuan (Merah)
            var iconTujuan = L.divIcon({
                className: 'custom-div-icon',
                html: "<div style='background-color:#ef4444; width:40px; height:40px; border-radius:50%; border:3px solid white; display:flex; justify-content:center; align-items:center; box-shadow:0 4px 6px rgba(0,0,0,0.3); animation: bounce 1s infinite;'>" +
                    "<i class='fa-solid fa-location-dot text-white text-lg'></i></div>",
                iconSize: [40, 40],
                iconAnchor: [20, 40]
            });
            

            
            //  data hasil pencarian dari Controller
            @if(isset($geometry) && isset($origin_coord) && isset($destination_coord))
                
                console.log("Data Rute Ditemukan!");

                // Data
                var geometry = @json($geometry); // String kode unik bentuk jalan (Polyline)
                var start = @json($origin_coord); // [lat, lng]
                var end = @json($destination_coord);   // [lat, lng]
                
                // Pasang Marker
                L.marker(start, {icon: iconAsal}).addTo(map).bindPopup("<b>Lokasi Anda</b>").openPopup();
                L.marker(end, {icon: iconTujuan}).addTo(map).bindPopup("<b>Tujuan</b>");

                // Gambar Garis Rute (Decode Polyline OSRM)
                var latlngs = decodePolyline(geometry);
                
                var polyline = L.polyline(latlngs, {
                    color: '#eab308', 
                    weight: 6,        // Tebal garis
                    opacity: 0.8,
                    lineJoin: 'round'
                }).addTo(map);

                //  Zoom rute
                map.fitBounds(polyline.getBounds(), { padding: [50, 50] });

                // Update Data 
                document.getElementById('waktu-display').innerHTML = "{{ $duration ?? 0 }} <span class='text-lg font-normal text-gray-600'>menit</span>";
                document.getElementById('harga-display').innerText = "Rp {{ number_format($price ?? 0, 0, ',', '.') }}";
                document.getElementById('jarak-display').innerText = "{{ $distance ?? 0 }} km";
                
                // Tampilkan nama rute (Misal: 03 - Guntur RSU)
                var namaAngkot = "{{ $angkot_terbaik->jurusan ?? 'Angkot tidak di Temukan' }}";
                var kodeAngkot = "{{ $angkot_terbaik->no_angkot ?? 'NA' }}";
                document.getElementById('rute-display').innerHTML = "<span class='bg-blue-100 text-blue-800 px-2 py-0.5 rounded text-xs mr-2'>" + kodeAngkot + "</span>" + namaAngkot;

                // Buka Bottom Sheet otomatis
                document.getElementById('result-card').classList.remove('translate-y-full');

            @endif

            // ---  POLYLINE untuk OSRM ---
            // menerjemahkan kode acak OSRM menjadi garis peta
            function decodePolyline(str, precision) {
                var index = 0,
                    lat = 0,
                    lng = 0,
                    coordinates = [],
                    shift = 0,
                    result = 0,
                    byte = null,
                    latitude_change,
                    longitude_change,
                    factor = Math.pow(10, precision || 5);

                while (index < str.length) {
                    byte = null;
                    shift = 0;
                    result = 0;
                    do {
                        byte = str.charCodeAt(index++) - 63;
                        result |= (byte & 0x1f) << shift;
                        shift += 5;
                    } while (byte >= 0x20);
                    latitude_change = ((result & 1) ? ~(result >> 1) : (result >> 1));
                    shift = result = 0;
                    do {
                        byte = str.charCodeAt(index++) - 63;
                        result |= (byte & 0x1f) << shift;
                        shift += 5;
                    } while (byte >= 0x20);
                    longitude_change = ((result & 1) ? ~(result >> 1) : (result >> 1));
                    lat += latitude_change;
                    lng += longitude_change;
                    coordinates.push([lat / factor, lng / factor]);
                }
                return coordinates;
            }

        });

        // Tombol Toggle
        function toggleResult() {
            const card = document.getElementById('result-card');
            card.classList.toggle('translate-y-full');
        }
    </script>
</body>
</html>