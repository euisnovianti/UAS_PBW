<x-app-layout>
    
    @if(Auth::user()->email == 'admin@gmail.com') 
    
    <div class="flex min-h-screen bg-gray-100">

        <aside class="w-64 bg-anggo-blue text-white hidden md:block shadow-xl fixed h-full z-10 pt-20">
            <div class="px-6 pb-6">
                <h1 class="text-2xl font-bold tracking-wider text-anggo-gold flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved"></i> ADMIN
                </h1>
            </div>
            <nav class="mt-2">
                <a href="{{ route('dashboard') }}" class="block py-3 px-6 bg-blue-800 border-r-4 border-anggo-gold text-white font-semibold">
                    <i class="fa-solid fa-gauge-high w-6"></i> Dashboard
                </a>
                
                <a href="{{ route('angkots.index') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition">
                    <i class="fa-solid fa-van-shuttle w-6"></i> Data Angkot
                </a>
                
                <a href="{{ route('users.index') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition">
                    <i class="fa-solid fa-users w-6"></i> Pengguna
                </a>

                <a href="{{ route('home') }}" class="block py-3 px-6 text-gray-300 hover:bg-blue-800 hover:text-white transition mt-8 border-t border-blue-700 pt-4">
                    <i class="fa-solid fa-map w-6"></i> Lihat Peta Utama
                </a>
            </nav>
        </aside>

        <div class="flex-1 md:ml-64 p-8">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Dashboard Admin</h2>
                <p class="text-gray-500 mt-1">Halo Admin! Kelola semua data ANGGO dari sini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Total Armada</p>
                        <h3 class="text-3xl font-bold text-blue-900 mt-1">{{ \App\Models\Angkot::count() }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                        <i class="fa-solid fa-bus text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Rata-rata Tarif</p>
                        <h3 class="text-3xl font-bold text-yellow-600 mt-1">Rp {{ number_format(\App\Models\Angkot::avg('harga'), 0, ',', '.') }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600">
                        <i class="fa-solid fa-money-bill-wave text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-xs font-bold uppercase">Total Pengguna</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\User::count() }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600">
                        <i class="fa-solid fa-users text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-chart-area text-blue-600"></i> Statistik Pengunjung
                    </h3>
                    <div class="h-64 flex items-end justify-between px-2 gap-2">
                        @foreach(['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $day)
                        <div class="w-full bg-blue-50 rounded-t-lg relative group hover:bg-blue-100 transition h-full flex flex-col justify-end">
                            <div class="bg-blue-600 rounded-t-lg w-full" style="height: {{ rand(30, 90) }}%;"></div>
                            <div class="text-center text-xs text-gray-500 mt-2 font-medium">{{ $day }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Aktivitas Terbaru</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3 pb-3 border-b border-gray-50">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xs">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">Login Admin</p>
                                <p class="text-xs text-gray-400">Baru saja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else

    <div class="min-h-screen bg-gray-50">
        <nav class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-van-shuttle text-anggo-gold text-2xl"></i>
                <span class="font-bold text-xl text-blue-900">ANGGO</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-500 hover:text-red-600 font-medium text-sm transition">
                    Keluar <i class="fa-solid fa-right-from-bracket ml-1"></i>
                </button>
            </form>
        </nav>

        <div class="max-w-4xl mx-auto py-12 px-6">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-blue-900 p-8 text-white relative overflow-hidden">
                    <h2 class="text-3xl font-bold mb-2">Halo, {{ Auth::user()->name }}! 👋</h2>
                    <p class="text-blue-200">Mau pergi ke mana hari ini?</p>
                </div>
                
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('home') }}" class="group block p-6 bg-yellow-50 rounded-2xl border border-yellow-100 hover:bg-yellow-100 hover:scale-105 transition transform duration-300">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center text-white mb-4 shadow-lg group-hover:rotate-12 transition">
                                <i class="fa-solid fa-magnifying-glass text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Cari Angkot</h3>
                            <p class="text-sm text-gray-600">Lihat rute di peta.</p>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="group block p-6 bg-blue-50 rounded-2xl border border-blue-100 hover:bg-blue-100 hover:scale-105 transition transform duration-300">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white mb-4 shadow-lg group-hover:rotate-12 transition">
                                <i class="fa-solid fa-user-gear text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Pengaturan Akun</h3>
                            <p class="text-sm text-gray-600">Update profil kamu.</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8 text-gray-400 text-sm">
                &copy; {{ date('Y') }} Angkot Garut Online.
            </div>
        </div>
    </div>

    @endif
</x-app-layout>