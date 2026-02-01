<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <aside class="w-64 bg-anggo-blue text-white hidden md:block shadow-xl fixed h-full z-10">
            <div class="p-6">
                <h1 class="text-2xl font-bold tracking-wider text-anggo-gold flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved"></i> ADMIN
                </h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition">
                    <i class="fa-solid fa-gauge-high w-6"></i> Dashboard
                </a>
                <a href="{{ route('angkots.index') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition">
                    <i class="fa-solid fa-van-shuttle w-6"></i> Data Angkot
                </a>
                <a href="{{ route('users.index') }}" class="block py-3 px-6 bg-blue-800 border-r-4 border-anggo-gold text-white font-semibold">
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
                    <h2 class="text-3xl font-bold text-gray-800">Manajemen Pengguna</h2>
                    <p class="text-gray-500 mt-1">Daftar semua user yang terdaftar di aplikasi ANGGO.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-bold tracking-wider border-b border-gray-200">
                            <th class="p-4 text-center w-16">No</th>
                            <th class="p-4">Nama User</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Terdaftar Sejak</th>
                            <th class="p-4 text-center">Role</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach($users as $index => $u)
                        <tr class="hover:bg-blue-50/50 transition duration-150 even:bg-gray-50">
                            <td class="p-4 text-center text-gray-500 font-bold">{{ $index + 1 }}</td>
                            <td class="p-4 font-bold text-gray-800">{{ $u->name }}</td>
                            <td class="p-4 text-gray-600">{{ $u->email }}</td>
                            <td class="p-4 text-gray-500">{{ $u->created_at->format('d M Y') }}</td>
                            <td class="p-4 text-center">
                                @if($u->email == 'admin@gmail.com')
                                    <span class="bg-anggo-blue text-white py-1 px-3 rounded-full text-xs font-bold">Admin</span>
                                @else
                                    <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs font-bold">User</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                @if($u->email != 'admin@gmail.com')
                                <form action="{{ route('users.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Hapus user ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-500 hover:text-white transition shadow-sm" title="Hapus User">
                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                    </button>
                                </form>
                                @else
                                    <span class="text-xs text-gray-400 italic">--</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>