<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <aside class="w-64 bg-anggo-blue text-white hidden md:block shadow-xl fixed h-full z-10 pt-20">
            <div class="px-6 pb-6">
                <h1 class="text-2xl font-bold tracking-wider text-anggo-gold flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved"></i> ADMIN
                </h1>
            </div>
            <nav class="mt-2">
                <a href="{{ route('dashboard') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition">
                    <i class="fa-solid fa-gauge-high w-6"></i> Dashboard
                </a>
                
                <a href="{{ route('angkots.index') }}" class="block py-3 px-6 bg-blue-800 border-r-4 border-anggo-gold text-white font-semibold">
                    <i class="fa-solid fa-van-shuttle w-6"></i> Data Angkot
                </a>
                
                <a href="{{ route('users.index') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition">
                    <i class="fa-solid fa-users w-6"></i> Pengguna
                </a>

                <a href="{{ url('/') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition mt-8 border-t border-blue-700 pt-4">
                    <i class="fa-solid fa-map w-6"></i> Lihat Peta Utama
                </a>
            </nav>
        </aside>

        <div class="flex-1 md:ml-64 p-8">
            
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Manajemen Trayek</h2>
                    <p class="text-gray-500 mt-1">Kelola data rute, tarif, dan armada angkot.</p>
                </div>
                <a href="{{ route('angkots.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Tambah Angkot
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-bold tracking-wider border-b border-gray-200">
                                <th class="p-4 text-center w-16">No</th>
                                <th class="p-4 w-24">Kode</th>
                                <th class="p-4">Jurusan / Rute</th>
                                <th class="p-4">Warna</th>
                                <th class="p-4 text-right">Tarif</th>
                                <th class="p-4 text-center w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @foreach($angkots as $index => $a)
                            <tr class="hover:bg-blue-50/50 transition duration-150 even:bg-gray-50">
                                <td class="p-4 text-center text-gray-500 font-bold">{{ $index + 1 }}</td>
                                <td class="p-4">
                                    <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-lg font-bold text-xs border border-blue-200">
                                        {{ $a->no_angkot }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-gray-800">{{ $a->jurusan }}</div>
                                    <div class="text-xs text-gray-500 mt-1 truncate max-w-xs">{{ Str::limit($a->jalur_rute, 50) }}</div>
                                </td>
                                <td class="p-4 text-gray-600">{{ $a->warna_mobil }}</td>
                                <td class="p-4 text-right font-mono font-medium text-gray-700">Rp {{ number_format($a->harga, 0, ',', '.') }}</td>
                                <td class="p-4 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('angkots.edit', $a->id) }}" class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-500 hover:text-white transition shadow-sm" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        <form action="{{ route('angkots.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-500 hover:text-white transition shadow-sm" title="Hapus">
                                                <i class="fa-solid fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>